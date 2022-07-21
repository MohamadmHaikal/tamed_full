@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('assets/css/apps/invoice.css') !!}
@endpush

@section('content')
    <?php
    $author = get_user_by_id($invoice->user_id);
    
    ?>
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="javascript:void(0);">{{ __('backend.Invoice details') }}</a>
                                </li>

                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>

        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing date-table-container">
                            <!-- Datatable go to last page -->

                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">


                                <div class="widget-content widget-content-area br-6">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="table-header">{{ __('backend.Invoice details') }}</h4>

                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-primary " onClick="printdiv('invoice-body');"
                                                style="margin-right: 80%;">{{ __('backend.print') }}</button>
                                        </div>
                                    </div>

                                    <div class="invoice-container" id="invoice-body">
                                        <div class="invoice-inbox" style="height:auto;">


                                            <div id="ct" class="" style="display: flex; ">

                                                <div class="invoice">
                                                    <div class="content-section  animated animatedFadeInUp fadeInUp"
                                                        style="height:auto;">
                                                        <div class="row inv--head-section" style="    margin-bottom: 15px;">

                                                            <div class="col-sm-4 col-12">
                                                                <h6 class="in-heading mb-3">{{ $author->name }}</h6>
                                                                <h6 class="in-heading mb-3">{{ __('backend.address') }} :
                                                                    {{ get_location_by_id($author) }}</h6>
                                                                <h6 class="in-heading">{{ __('backend.Tax Number') }}
                                                                    :
                                                                    {{ $author->TaxNumber }}
                                                                </h6>
                                                                <h6 class="in-heading">
                                                                    {{ __('backend.special number') }} :
                                                                    {{ $author->specialNumber }}</h6>
                                                                <h6 class="in-heading mb-3">
                                                                    {{ __('backend.Commercial Registration No') }} :
                                                                    {{ $author->CRecord }}
                                                                </h6>
                                                                <h6 class="in-heading">{{ __('backend.email') }} :
                                                                    {{ $author->email }}</h6>
                                                                <h6 class="in-heading">{{ __('backend.phone') }} :
                                                                    {{ $author->phone }}
                                                                </h6>
                                                            </div>
                                                            <?php
                                                            function einv_generate_tlv_qr_code($array_tag = [])
                                                            {
                                                                $index = 1;
                                                                $tlv_string = null;
                                                                foreach ($array_tag as $tag_val) {
                                                                    $tlv_string .= pack('H*', sprintf('%02X', (string) "$index")) . pack('H*', sprintf('%02X', strlen((string) "$tag_val"))) . (string) "$tag_val";
                                                                    $index++;
                                                                }
                                                                return base64_encode($tlv_string);
                                                            }
                                                            $qrContent = einv_generate_tlv_qr_code([$author->name, $author->TaxNumber, $invoice->created_at, $Ttotal['total'], $Ttotal['tax_amount']]);
                                                            
                                                            ?>
                                                            <div
                                                                class="col-sm-4 col-12 align-self-center text-sm-center mb-2">
                                                                {!! QrCode::size(150)->generate($qrContent) !!}
                                                                <h6 class="mt-2">
                                                                    {{ __('backend.' . $invoice->type) }}</h6>
                                                            </div>
                                                            <div class="col-sm-4 col-12 align-self-center text-sm-right">
                                                                @if (isset($author->invoiceLogo))
                                                                <div class="">
                                                                    <img src="{{ url("/image/$author->invoiceLogo") }}"
                                                                        style="width: 45%; margin-left: 16%;" />
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7; margin-left: 3px;">
                                                                {{ __('backend.Bill No') }} : {{ pad($invoice->id, 6) }}</div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7 ; margin-left: 5px;">
                                                                {{ __('backend.Date') }} :
                                                                {{ date('Y-m-d', strtotime($invoice->created_at)) }}
                                                            </div>
                                                            <div class="col-sm-5 mr-1"
                                                                style="border: 2px solid #dae1e7;    margin-left: 3px;">
                                                                {{ __('backend.date of supply') }} :
                                                                {{ $invoice->supply_date }}</div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            @if ($invoice->invice_type != 'simplified tax invoice')
                                                                <div class="col-sm-2 pt-1 pb-1"
                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                    {{ __('backend.customer name') }} </div>
                                                                <div class="col-sm-4"
                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                    {{ $invoice->customer_name }}
                                                                </div>
                                                                <div class="col-sm-2 pt-1 pb-1"
                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                    {{ __('backend.Invoice type') }}</div>
                                                                <div class="col-sm-3"
                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                    {{ __('backend.' .$invoice->invice_type) }} {{ $invoice->isBrief=='1'?__('backend.brief'):__('backend.detailed')}}
                                                                </div>
                                                            @else
                                                                <div class="col-sm-3 pt-1 pb-1"
                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 5px;">
                                                                    {{ __('backend.Invoice type') }}</div>
                                                                <div class="col-sm-8"
                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                    {{ __('backend.' . $invoice->invice_type) }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @if ($invoice->invice_type != 'simplified tax invoice')
                                                        <div class="row mt-2">
                                                            @if ($invoice->isBrief!='1')
                                                            
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.address') }} </div>
                                                            <div class="col-sm-4"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->address }}
                                                            </div>
                                                                
                                                            @endif
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.Tax Number') }}</div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->TaxNumber }}
                                                            </div>
                                                        </div>
                                                        @if ($invoice->isBrief!='1')
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 8px;">
                                                                {{ __('backend.responsible') }} </div>
                                                            <div class="col-sm-9"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->responsible }}
                                                            </div>

                                                        </div>
                                                        @endif
                                                        @if ($invoice->isBrief!='1')
                                                        <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.phone') }} </div>
                                                            <div class="col-sm-4"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->phone }}
                                                            </div>
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.Email') }} </div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->email }}
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        <div class="row inv--product-table-section"
                                                            style="margin-top: 10px; margin-bottom: 0px;">
                                                            <div class="col-12" style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('#') }}</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.product or service') }}
                                                                                </th>
                                                                                @if ($invoice->isBrief!='1')
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.Quantity') }}</th>
                                                                                     @endif
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.value') }}</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.Discount') }}</th>
                                                                                @if ($invoice->invice_type != 'simplified tax invoice')
                                                                                    <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                        {{ __('backend.Amount subject to value added tax') }}
                                                                                    </th>
                                                                                    <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                        {{ __('backend.VAT rate') }}</th>
                                                                                    <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                        {{ __('backend.VAT amount') }}
                                                                                    </th>
                                                                                @endif
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.The total includes value added tax') }}
                                                                                </th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $i = 1;
                                                                            ?>
                                                                            <tr>
                                                                                @foreach ($products as $product)
                                                                                    <td>{{ $i++ }}</td>
                                                                                    <td>{{ $product->name }}</td>
                                                                                    @if ($invoice->isBrief!='1')
                                                                                    <td class="text-left">
                                                                                        {{ $product->quantity }}</td>
                                                                                    @endif
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->value, 2, '.', ',') }}
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->discount, 2, '.', ',') }}{{ $product->discount_type == 1 ? __('backend.Rial') : '%' }}
                                                                                    </td>
                                                                                    @if ($invoice->invice_type != 'simplified tax invoice')
                                                                                        <td class="text-left">
                                                                                            {{ number_format($product->Taxable_amount, 2, '.', ',') }}
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            %{{ number_format($product->tax_rate, 2, '.', ',') }}
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            {{ number_format($product->tax_amount, 2, '.', ',') }}
                                                                                        </td>
                                                                                    @endif
                                                                                    <td class="text-left">
                                                                                        {{ number_format($product->total, 2, '.', ',') }}
                                                                                    </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row inv--product-table-section"
                                                            style="margin-top: 10px;
                                                                                                                                        margin-bottom: 0px;">
                                                            <div class="col-12" style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">

                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding-left: 128px;">
                                                                                    {{ __('backend.Total') }}
                                                                                </td>
                                                                                <td>{{ __('backend.total discount') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ __('backend.Total subject to value added tax') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ __('backend.total value added tax') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ __('backend.The total inclusive value-added tax') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-center"
                                                                                    style="padding-left: 55px;">
                                                                                    {{-- <img
                                                                                        src="{{ url("/image/$author->Signature") }}"
                                                                                        style="width: 17%;
                                                                                                    background-position: center;
                                                                                                    position: absolute;
                                                                                                    top: 55px;
                                                                                                    right: 15px;
                                                                                                    background-size: cover;
                                                                                                    z-index: 1;"> --}}
                                                                                </td>
                                                                                <td> {{ number_format($Ttotal['discount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['Taxable_amount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['tax_amount'], 2, '.', ',') }}
                                                                                </td>
                                                                                <td class="text-left">
                                                                                    {{ number_format($Ttotal['total'], 2, '.', ',') }}
                                                                                </td>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="inv--payment-info" style="margin-bottom:-40px; ">
                                                            <div class="">
                                                                <div class="col-sm-12 col-12">
                                                                    <h6 class=" inv-title">
                                                                        {{ __('backend.Bank account details') }}</h6>
                                                                </div>
                                                                <div class="row">
                                                                    @foreach ($banks as $bank)
                                                                        <div class="col-sm-6 mt-2">
                                                                            <div class="row mt-1">
                                                                                <div class="col-sm-3 pt-1 pb-1"
                                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                                    {{ __('backend.Bank name') }} </div>
                                                                                <div class="col-sm-8"
                                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                                    {{ $bank->bank_name }}
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mt-1">
                                                                                <div class="col-sm-3 pt-1 pb-1"
                                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                                    {{ __('backend.account name') }}
                                                                                </div>
                                                                                <div class="col-sm-8"
                                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                                    {{ $bank->account_name }}
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mt-1">
                                                                                <div class="col-sm-3 pt-1 pb-1"
                                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                                    {{ __('backend.account number') }}
                                                                                </div>
                                                                                <div class="col-sm-8"
                                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                                    {{ $bank->account_number }}
                                                                                </div>

                                                                            </div>
                                                                            <div class="row mt-1">
                                                                                <div class="col-sm-3 pt-1 pb-1"
                                                                                    style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                                    {{ __('backend.IBAN') }} </div>
                                                                                <div class="col-sm-8"
                                                                                    style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                                    {{ $bank->iban_number }}
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="row inv--product-table-section">
                                                            <div class="col-12 " style="padding-right: 0px;">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="table">

                                                                        </thead>
                                                                        <tbody>

                                                                            <tr>
                                                                    @if (isset($author->Signature))
                                                                    <img src="{{ url("/image/$author->Signature") }}"
                                                                    style="width: 17%;
                                                                                                background-position: center;
                                                                                                position: absolute;
                                                                                                top: -94px;
                                                                                                right: 746px;
                                                                                                background-size: cover;
                                                                                                z-index: 1;">
                                                                    @endif
                                                                              
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="footer-contact">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12">
                                                                    <p class="">
                                                                        {{-- {{ "Email: $author->email | Contact: $author->phone " }} --}}
                                                                        {{__('backend.The invoice is issued by the billing system baptism platform')}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
@endpush


@push('custom-scripts')
@endpush

@push('custom-scripts')
    <script language="javascript">
        function printdiv(printpage) {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr + newstr + footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
@endpush
