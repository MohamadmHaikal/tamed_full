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
                                                            $qrContent = einv_generate_tlv_qr_code([$author->name, $author->TaxNumber, $invoice->created_at, (($DealsAuctions->price * 5 /100)+ ((($DealsAuctions->price * 5 /100)) * 15 / 100)), ($DealsAuctions->price * 5 /100)]);
                                                            
                                                            ?>
                                                            <div
                                                                class="col-sm-4 col-12 align-self-center text-sm-center mb-2">
                                                                {!! QrCode::size(150)->generate($qrContent) !!}
                                                                <h6 class="mt-2">
                                                                    {{ __('backend.deals') }}</h6>
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
                                                            {{-- <div class="col-sm-5 mr-1"
                                                                style="border: 2px solid #dae1e7;    margin-left: 3px;">
                                                                {{ __('backend.date of supply') }} :
                                                                {{ $invoice->supply_date }}</div> --}}
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
                                                                    {{ __('backend.deals') }}
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
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.address') }} </div>
                                                            <div class="col-sm-4"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ getUserAddressByNeighborhoo(get_user_by_id($DealsAuctions->from_id)) }}
                                                            </div>
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 3px;">
                                                                {{ __('backend.Tax Number') }}</div>
                                                            <div class="col-sm-3"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->TaxNumber }}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row mt-2">
                                                            <div class="col-sm-2 pt-1 pb-1"
                                                                style="border: 2px solid #dae1e7; background-color: #cfe9f2;    margin-left: 8px;">
                                                                {{ __('backend.responsible') }} </div>
                                                            <div class="col-sm-9"
                                                                style="border: 2px solid #dae1e7  ;   margin-left: 3px;">
                                                                {{ $invoice->responsible }}
                                                            </div>

                                                        </div> --}}
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
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.Quantity') }}</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                    {{ __('backend.price main') }}</th>
                                                                                <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                   {{ __('backend.price after discount') }}</th>
                                                                                   <th class="text-center" scope="col"
                                                                                    style="    padding: 0.5rem;">
                                                                                   {{ __('backend.Downpayment') }}</th>
                                                                                @if ($invoice->invice_type != 'simplified tax invoice')
                                                                                    <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                     {{ __('backend.VAT rate') }}
                                                                                      
                                                                                    </th>
                                                                                    {{-- <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                        {{ __('backend.VAT rate') }}</th>
                                                                                    <th class="text-center" scope="col"
                                                                                        style="    padding: 0.5rem;">
                                                                                        {{ __('backend.VAT amount') }}
                                                                                    </th> --}}
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
                                                                                @php
                                                                                $count=unserialize($DealsAuctions->ads->infoArray)['Count'];
                                                                                @endphp
                                                                             
                                                                                    <td>{{ $i++ }}</td>
                                                                                    <td>{{ $DealsAuctions->ads->title }}</td>
                                                                                    <td class="text-left">
                                                                                        {{ $count }}</td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($DealsAuctions->ads->price, 2, '.', ',') }} {{ __('backend.r.s') }}   
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        {{ number_format($DealsAuctions->price, 2, '.', ',') }} {{ __('backend.r.s') }}   
                                                                                        {{-- {{ $product->discount_type == 1 ? __('backend.Rial') : '%' }} --}}
                                                                                    </td>
                                                                                    @php
                                                                                        $p=$DealsAuctions->price * 5 /100;
                                                                                    @endphp
                                                                                    <td class="text-left">
                                                                                        {{  $p }} {{ __('backend.r.s') }}   
                                                                                        {{-- {{ $product->discount_type == 1 ? __('backend.Rial') : '%' }} --}}
                                                                                    </td>
                                                                                    @if ($invoice->invice_type != 'simplified tax invoice')
                                                                                        <td class="text-left">
                                                                                            {{ (( $p) * 15 / 100) }}
                                                                                            {{ __('backend.r.s') }}   
                                                                                            {{-- {{ number_format($DealsAuctions->Taxable_amount, 2, '.', ',') }} --}}
                                                                                        </td>
                                                                                        {{-- <td class="text-left">
                                                                                            %{{ number_format($DealsAuctions->tax_rate, 2, '.', ',') }}
                                                                                        </td>
                                                                                        <td class="text-left">
                                                                                            {{ number_format($DealsAuctions->tax_amount, 2, '.', ',') }}
                                                                                        </td> --}}
                                                                                    @endif
                                                                                    <td class="text-left">
                                                                                        {{ $p + (($p) * 15 / 100)}}
                                                                                        {{ __('backend.r.s') }}   
                                                                                        {{-- {{ number_format($DealsAuctions->total, 2, '.', ',') }} --}}
                                                                                    </td>
                                                                            </tr>
                                                                       
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row inv--product-table-section"
                                                            style="margin-top: 10px;                       margin-bottom: 0px;">
                                                            <div class="col-12" style="padding-right: 0px;">
                                                              
                                                                 
                                                                            <div class="row" style="border: 1px solid #dee6ed  ;  padding: 13px 0px;">
                                                                                <div class="col-3">
                                                                                    <h6 style="">   {{ __('backend.Total') }}</h6>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <span style="    color: black;font-size: 18px;">
                                                                                        {{  $p + (($p) * 15 / 100) }} 
                                                                                    {{ __('backend.r.s') }}                                                                                    </span>
                                                                                </div>
                                                                               
                                                                              
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

                                                        <div class="inv--payment-info" style="margin-bottom:-40px; ">
                                                            <div class="">
                                                                <div class="accept-content mt-5  text-center" >
                                                                    <span> يجب عليك دفع تأمين لحجز الصفقة إن لم ترغب بدفع المبلغ كامل </span>
                                                                    <br>
                                                                    <span>قبل التأكد من مواصفات الصفقة</span>
                                
                                                                    <h6 style="padding-top:15px ;color:#049ba6 ;">نسبة التأمين 5 % من قيمة الصفقة</h6>
                                                                    <div class="text-center">
                                                                        <div class="mt-2"
                                                                            style="     margin-right: 9%;background-color:#b6e2e5;  border-radius: 20px;  width: 76%;     padding: 22px;   text-align: right; ">
                                                                            <h6 style="color:#4e8a8b ; font-weight: 800;">ملاحظة</h6>
                                                                            <p style="     font-weight: 300;color: #000;font-size: 12px;"> بعد دفع
                                                                                التأمين سيتم اصدار فاتورة بالمبلغ المدفوع وحجز الصفقة لك حسب المدة
                                                                                المتفق عليها ريثما يتم التشيك والتأكد من حقيقية مواصفات الصفقة بشكل كامل
                                                                                وبعدها يمكنكم استكمال المبلغ المتبقي وسيتم اصدار فاتورة نهائية لك وتكون
                                                                                الصفقة من نصيبك</p>
                                
                                                                        </div>
                                                                        <div class="mt-2"
                                                                            style="margin-right: 9%;background-color:#f6dec2;  border-radius: 20px;  width: 76%;     padding: 22px;   text-align: right; ">
                                
                                                                            <p style="font-weight: 300;font-size: 12px; color: #000;"> وان لم تكن بفس
                                                                                المواصفات المعروضة سيتم استردادالمبلغ المدفوع بعد خصم رسوم تعميد وسيتم
                                                                                استرداد المبلغ خلال 5 ايام عمل</p>
                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="footer-contact">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-12 mt-5">
                                                                    <p class="">
                                                                        {{ "Email: $author->email | Contact: $author->phone " }}
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
