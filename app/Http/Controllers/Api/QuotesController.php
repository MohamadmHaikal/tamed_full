<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DealsAuctions;
use App\Models\EmploymentApplications;
use App\Models\File;
use App\Models\invoice;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    public function Send(Request $request)
    {

        if ($request->category == 'project') {
            if (!$request->hasFile('file')) {
                return json_encode(['message' => 'ملف عرض السعر مطلوب !', 'code' => '102'], true);
            }
            $quotes = new Quote;
            $quotes->status = 'new';
            $quotes->form_id = $request->from_id;
            $quotes->to_id = $request->to_id;
            $quotes->ads_id = $request->ads_id;
            $quotes->note = $request->note;
            $quotes->price = $request->price;
            $quotes->name = $request->title;
            $quotes->save();
            if ($request->hasFile('file')) {
                $this->fileUpload(request()->file, 'quotes', $quotes->id);
            }
        } else if ($request->category == 'deals') {
            if ($request->price == null && $request->type == null) {
                return json_encode(['message' => 'السعر المخصص مطلوب !', 'code' => '102'], true);
            }
            $deals = new DealsAuctions;
            $deals->status = 'waiting';
            $deals->refernce_num = rand(10 * 45, 100 * 98);
            $deals->from_id = $request->from_id;
            $deals->to_id = $request->to_id;
            $deals->deals_date = date('Y-m-d');
            $deals->ads_id = $request->ads_id;
            $deals->negotiate_note = $request->note;
            $deals->price = $request->price;
            $deals->save();
        } else if ($request->category == 'full-payment' || $request->category == 'deposit') {
            if (!$request->hasFile('file')) {
                return json_encode(['message' => ' إيصال الدفع مطلوب !', 'code' => '102'], true);
            }
            $deals = new DealsAuctions;
            $deals->status = 'done';
            $deals->refernce_num = rand(10 * 45, 100 * 98);
            $deals->from_id = $request->from_id;
            $deals->to_id = $request->to_id;
            $deals->deals_date = date('Y-m-d');
            $deals->ads_id = $request->ads_id;
            $deals->negotiate_note = $request->note;
            $deals->price = $request->price;
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $deals->receipt_img = $filename;
            $deals->save();
            $DealsAuctions = DealsAuctions::where('id', $deals->id)->first();
            $invoice = invoice::create([
                'invoice_date' => date('Y-m-d H:i:s'),
                'supply_date' => $DealsAuctions->deals_date,
                'customer_name' => $DealsAuctions->customer->name,
                'address' =>  $DealsAuctions->customer->address,
                // 'invice_type' => $request->invice_type,
                // 'type' => $request->type,
                'TaxNumber' => $DealsAuctions->customer->TaxNumber,
                // 'responsible' => $request->responsible,
                'phone' => $DealsAuctions->customer->phone,
                'email' => $DealsAuctions->customer->email,
                // 'Banks' => serialize($request->bank),
                'user_id' => 20,
                'isDeals' => '1',
                // 'contracts_id' => $request->route('id') != null ? $request->route('id') : null,
            ]);


            $DealsAuctions->invoice_num = $invoice->id;
            $DealsAuctions->save();
        } else if ($request->category == 'deposit') {
            if (!$request->hasFile('file')) {
                return json_encode(['message' => ' إيصال الدفع مطلوب  !', 'code' => '102'], true);
            }
            $deals = new DealsAuctions;
            $deals->status = 'done';
            $deals->refernce_num = rand(10 * 45, 100 * 98);
            $deals->from_id = $request->from_id;
            $deals->to_id = $request->to_id;
            $deals->deals_date = date('Y-m-d');
            $deals->ads_id = $request->ads_id;
            $deals->negotiate_note = $request->note;
            $deals->price = $request->price;
            $filename = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('image'), $filename);
            $deals->receipt_img = $filename;
            $deals->save();
        }
        if ($request->category == 'full-payment' || $request->category == 'deposit') {
            return json_encode(['message' => 'تم ارسال الطلب بنجاح', 'code' => '200', 'invoice_id' => $invoice->id], true);
        } else {
            return json_encode(['message' => 'تم ارسال الطلب بنجاح', 'code' => '200'], true);
        }
    }
    public function SendEmployment(Request $request)
    {
        if ($request->type != null) {
            $ads = get_ads_by_id($request->ads_id);
            $request->to_id = $ads->user_id;
        }

        if ($request->type == 'with-cv') {
            if (!$request->hasFile('file')) {
                return json_encode(['message' => 'السيرة الذاتية مطلوبة !', 'code' => '102'], true);
            }
        } else {
            if (getfileByName('cv') == null) {
                return json_encode(['message' => 'لا يوجد سيرة ذاتية مرفقة في ملفك الشخصي !', 'code' => '102'], true);
            }
        }
        if (is_admin() || is_Facility()) {
            return json_encode(['message' => ' لايمكن التقدم للوظائف من عضوية المنشآت  !', 'code' => '102'], true);
        }
        $employment = new EmploymentApplications();
        $employment->status = 'new';
        $employment->from_id = $request->from_id;
        $employment->to_id = $request->to_id;
        $employment->ads_id = $request->ads_id;
        $employment->note = $request->note;
        $employment->save();
        if ($request->hasFile('file')) {

            $this->fileUpload(request()->file, 'EmploymentApplications', $employment->id);
        }
        return json_encode(['message' => 'تم ارسال الطلب بنجاح', 'code' => '200'], true);
    }
}
