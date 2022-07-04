<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\RefundRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class WalletController extends Controller
{

    public function _getChargeAccount()
    {
        return view('Wallet.recharge');
    }
    public function _getAccountStatement()
    {
        $paymentInfo = null;
        return view('Wallet.account-statement', compact('paymentInfo'));
    }
    public function _getRefund()
    {
        return view('Wallet.Refund');
    }
    public function _getAllRefund()
    {
        $request = null;
        if (is_admin()) {
            $request = RefundRequests::all();
        } else {
            $request = RefundRequests::where('Membership_id', '=', get_current_user_id())->get();
        }
        return view('Wallet.all-refund', compact('request'));
    }
    public function _deleteRequest($id)
    {
        RefundRequests::find($id)->delete();
        return $this->sendJson([
            'status' => 1,
            'reload' => true,
        ]);
    }
    public function _changeStatus($id, Request $request)
    {
        $req = RefundRequests::find($id);
        $req->status = $request->status;
        $req->save();
        addNotification('1', $req->Membership_id, __('backend.Refund request'), 'status of request ' . $request->status, ' request notification');
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Request status updated successfully'), 'type' => 'success'])->render(),
            'reload' => true
        ]);
    }
    public function _showRequest($id)
    {

        return RefundRequests::find($id);
    }
    public function _getStatement(Request $request)
    {
        $paymentInfo = Payment::where('user_id', '=', get_current_user_id())->whereBetween('created_at', [$request->from_date, $request->to_date])->get();
        return  view('Wallet.account-statement', compact('paymentInfo'));
    }
    public function _sendRefund(Request $request)
    {
        $user = get_current_user_data();
        $validator = Validator::make(
            $request->all(),
            [
                'beneficiary' => 'required',
                'IBAN' => 'required|numeric',
                'amount' => 'required|numeric|min:70'
            ],
            [
                'beneficiary.required' => __('backend.Beneficiary name is required'),
                'IBAN.required' => __('backend.The IBAN is required'),
                'IBAN.numeric' => __('backend.The account number (IBAN) must be a number'),
                'amount.required' => __('backend.The amount is required'),
                'amount.numeric' => __('backend.The amount must be a number'),
                'amount.min' => __('backend.The refund amount must be SAR 70 or more'),

            ]
        );
        if ($validator->fails()) {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['type' => 'danger', 'message' => $validator->errors()->first()])->render()
            ]);
        }
        if ($request->amount > $user->wallet_balance) {
            return $this->sendJson([
                'status' => 0,
                'message' => view('common.alert', ['message' => __('backend.Your wallet balance is not enough'), 'type' => 'danger'])->render(),
            ]);
        }
        $req = new RefundRequests;
        $req->Membership_id = $user->id;
        $req->beneficiary = $request->beneficiary;
        $req->amount = $request->amount;
        $req->status = 'waiting';
        $req->IBAN = $request->IBAN;
        $req->save();
        $user = User::find($user->id);
        $user->wallet_balance = $user->wallet_balance - $request->amount;
        $user->save();
        return $this->sendJson([
            'status' => 1,
            'message' => view('common.alert', ['message' => __('backend.Your request has been successfully sent'), 'type' => 'success'])->render(),
            'redirect' => '/wallet/all-Refund'
        ]);
    }
}
