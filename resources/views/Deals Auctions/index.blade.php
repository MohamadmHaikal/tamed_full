@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
@endpush

@section('content')
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
                                        href="javascript:void(0);">{{ __('backend.DealsAndAuctions') }}</a>
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
                                            <h4 class="table-header">
                                                {{ __('backend.DealsAndAuctions') }}&nbsp;{{ __('backend.' . $source) }}</h4>

                                        </div>
                                    </div>
                                    <div class="table-responsive mb-4">
                                        <div class="widget-content widget-content-area text-center">
                                            <div class="button-list">
                                                <a href="{{ route('DealsAuctions', ['filter' => 'new', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-rounded">{{ __('backend.new') }}</button>

                                                </a>
                                                <a
                                                    href="{{ route('DealsAuctions', ['filter' => 'accepted', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded">{{ __('backend.Accepted companies') }}</button>

                                                </a>
                                                <a
                                                    href="{{ route('DealsAuctions', ['filter' => 'waiting', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-warning btn-rounded">{{ __('backend.waiting for signature') }}</button>

                                                </a>
                                                <a
                                                    href="{{ route('DealsAuctions', ['filter' => 'rejected', 'source' => $source]) }}">
                                                    <button type="button"
                                                        class="btn btn-danger btn-rounded">{{ __('backend.rejected') }}</button>

                                                </a>

                                            </div>
                                        </div>
                                        <table id="export-dt" class="table table-hover" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('backend.Order number') }}</th>
                                                    <th>{{ __('backend.reference number') }}</th>

                                                    <th>{{ __('backend.type') }}</th>
                                                    <th>{{ __('backend.Date') }}</th>
                                                    <th>{{ __('backend.Price') }}</th>
                                                    {{-- <th>{{ __('backend.Owners') }}</th> --}}
                                                    <th>{{ __('backend.offered') }}</th>
                                                    <th>{{ __('backend.status') }}</th>
                                                   
                                                    <th class="no-content">{{ __('backend.QuotesDetails') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($DealsAuctions as $item)
                                                <tr>
                                                    <td>{{  $item->refernce_num }}</td>
                                                    <td>{{  $item->ads_id }}</td>
                                                    <td>{{  $item->ads->title }}</td>
                                                    <td>{{  $item->deals_date }}</td>
                                                    <td>{{  $item->price }}</td>
                                                    {{-- <td>{{ get_user_by_id($item->from_id)->name }}</td> --}}
                                                    <td>{{ get_user_by_id($item->to_id)->name  }}</td>
                                                    <td>{{  __('backend.'.$item->status ) }}</td>
                                                    <td>
                                                        <a class="dropdown-item get_invoice"
                                                        data-id="{{  $item->id }}"
                                                        data-toggle="modal"
                                                        data-target="#modal-show-booking-invoice">
                                                            <i class="las  la-file-invoice font-30"></i></a>
                                                      
                                                    </td>
                                                 
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
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

    
    
    
   
    <div class="modal fade hh-get-modal-content" id="modal-show-booking-invoice" tabindex="-1" role="dialog"
    aria-hidden="true"
     {{-- data-url="{{ dashboard_url('get-booking-invoice') }}" --}}
     >
   <div class="modal-dialog">
       <div class="modal-content">
        
           <div class="modal-header">
               <h4 class="modal-title">{{__('Booking Detail')}}</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
               </button>
           </div>
           <div class="modal-body">
     
       
                    <div class="statbox  box box-shadow">
                     
                        <div class="widget-content  tab-horizontal-line">
                            <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"> {{__('backend.Invoices')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="animated-underline-about-tab" data-toggle="tab" href="#animated-underline-about" role="tab" aria-controls="animated-underline-about" aria-selected="false"> {{__('backend.receipt photo')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="negotiate-tab" data-toggle="tab" href="#negotiate" role="tab" aria-controls="negotiate" aria-selected="false"> {{__('backend.negotiate')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="animateLineContent-4">
                                <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                        
                                </div>
                                <div class="tab-pane fade" id="animated-underline-about" role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                    <img src="{{ asset('images/recet.jpeg') }}" alt="" width="100%" height="100%" srcset="">
                                  
                                </div>
                                <div class="tab-pane fade" id="negotiate" role="tabpanel" aria-labelledby="negotiate-tab">
                                    <h3>تفاصيل الطلب</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
        
           <div class="modal-footer">
               {{-- <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">{{__('Close')}}</button> --}}
           </div>
       </div>
   </div>
</div>
</div>
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/table/datatable/datatables.js') !!}
    <!--  The following JS library files are loaded to use Copy CSV Excel Print Options-->
    {!! Html::script('plugins/table/datatable/button-ext/dataTables.buttons.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/jszip.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.html5.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/buttons.print.min.js') !!}
    <!-- The following JS library files are loaded to use PDF Options-->
    {!! Html::script('plugins/table/datatable/button-ext/pdfmake.min.js') !!}
    {!! Html::script('plugins/table/datatable/button-ext/vfs_fonts.js') !!}
@endpush


@push('custom-scripts')
    {!! Html::script('plugins/notification/snackbar/snackbar.min.js') !!}
    {!! Html::script('assets/js/basicui/notifications.js') !!}
    {!! Html::script('assets/js/myJS.js') !!}
@endpush

@push('custom-scripts')
    <script>
        $('#Show').on('show.bs.modal', function(event) {

            var button = $(event.relatedTarget);
            var ModalType = button.data('type')
            var name = button.data('name')
            var userType = button.data('usertype')
            console.log(userType);
            $("#name").prop('disabled', ModalType == null ? false : true);
            $("#type_id").prop('disabled', ModalType == null ? false : true);
            var modal = $(this)
            modal.find('.modal-body #name').val(name)
            modal.find('.modal-body #type_id').val(userType)
        });
        $(document).ready(function() {
            $('#basic-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#dropdown-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#last-page-dt').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "paginate": {
                        "first": "<i class='las la-angle-double-left'></i>",
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>",
                        "last": "<i class='las la-angle-double-right'></i>"
                    }
                },
                "lengthMenu": [3, 6, 9, 12],
                "pageLength": 9
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = parseInt($('#min').val(), 10);
                    var max = parseInt($('#max').val(), 10);
                    var age = parseFloat(data[3]) || 0; // use data for the age column
                    if ((isNaN(min) && isNaN(max)) ||
                        (isNaN(min) && age <= max) ||
                        (min <= age && isNaN(max)) ||
                        (min <= age && age <= max)) {
                        return true;
                    }
                    return false;
                }
            );
            var table = $('#range-dt').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('#min, #max').keyup(function() {
                table.draw();
            });
            $('#export-dt').DataTable({
                dom: '<"row"<"col-md-6"B><"col-md-6"f> ><""rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-primary'
                        }
                    ]
                },
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
            // Add text input to the footer
            $('#single-column-search tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title +
                    '" />');
            });
            // Generate Datatable
            var table = $('#single-column-search').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            // Search
            table.columns().every(function() {
                var that = this;
                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
            var table = $('#toggle-column').DataTable({
                "language": {
                    "paginate": {
                        "previous": "<i class='las la-angle-left'></i>",
                        "next": "<i class='las la-angle-right'></i>"
                    }
                },
                "lengthMenu": [5, 10, 15, 20],
                "pageLength": 5
            });
            $('a.toggle-btn').on('click', function(e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
                $(this).toggleClass("toggle-clicked");
            });
        });

        
        $('.get_invoice').on('click', function(e) {
            $(document).find('#animated-underline-home').empty();
            $(document).find('#negotiate').empty();

            var id = $(this).data('id');
         

            $.ajax({
            url: '/DealsAuctions/get_invoice/'+ id,
            type: "get",
            contentType: 'application/json',
            success: function (data) {

                $(document).find('#animated-underline-home').append(`  
                    <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.invoice number') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.id}</span>
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.customer name') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.customer_name}</span>
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.Tax Number') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.TaxNumber}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.status') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.status}</span>
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.Invoice date') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.invoice_date}</span>
                                    </div>

                                </div>
                                
                                
                                <a class="btn btn-success btn-rounded"
                                target="_blank"
                                                                    href="/eBills/show/${data.invoice_num} "
                                                                    role="button" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('backend.Invoice details') }}
                                                                </a>`);

                                $(document).find('#negotiate').append(` 
                    <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.Order number') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.refernce_num}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.reference number') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.ads_id}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.price required') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.ads.price}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('backend.Price') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.price}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <h5 class="title">{{ __('frontend.notes') }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.negotiate_note}</span>
                                    </div>

                                </div>
                                
                                `);


            },
            error: function (xhr) {}
            });
            })
    </script>
@endpush
