@extends('layout.master')

@push('plugin-styles')
    {!! Html::style('plugins/table/datatable/datatables.css') !!}
    {!! Html::style('plugins/table/datatable/dt-global_style.css') !!}
    {!! Html::style('plugins/notification/snackbar/snackbar.min.css') !!}
    {!! Html::style('assets/css/ui-elements/buttons.css') !!}
    {!! Html::style('plugins/sweetalerts/sweetalert2.min.css') !!}
{!! Html::style('plugins/sweetalerts/sweetalert.css') !!}
{!! Html::style('assets/css/basic-ui/custom_sweetalert.css') !!}
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
                                        <div class="widget-content widget-content-area                                                                                                                                                                                                                                                                                              ">
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
                                                    <th>{{ __('backend.deserved amount') }}</th>
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
                                                    @php
                                                    $p=$item->price * 5 /100;
                                                @endphp
                                                    <td>{{  $p + (($p) * 15 / 100) }}</td>
                                                    <td>{{ get_user_by_id($item->to_id)->name  }}</td>
                                                    @if ($item->status == 'waiting')
                                                    <td style=" color: var(--orange);">{{  __('backend.'.$item->status ) }}</td>
                                                    @elseif ($item->status == 'done')
                                                    <td style="color: green">{{  __('backend.'.$item->status ) }}</td>
                                                        
                                                    @elseif ($item->status == 'rejected')
                                                    <td style="color: red">{{  __('backend.'.$item->status ) }}</td>
                                                    @else
                                                    <td >{{  __('backend.'.$item->status ) }}</td>

                                                    
                                                    @endif
                                                  
                                                    <td>
                                                        <a class="dropdown-item get_invoice"
                                                        data-id="{{  $item->id }}"
                                                        data-toggle="modal"
                                                        style="color:#007697"
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
                                    <a class="nav-link " id="animated-underline-home-tab" data-toggle="tab" href="#animated-underline-home" role="tab" aria-controls="animated-underline-home" aria-selected="true"> {{__('backend.Invoices')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="animated-underline-about-tab" data-toggle="tab" href="#animated-underline-about" role="tab" aria-controls="animated-underline-about" aria-selected="false"> {{__('backend.receipt photo')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="negotiate-tab" data-toggle="tab" href="#negotiate" role="tab" aria-controls="negotiate" aria-selected="false"> {{__('backend.negotiate')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="animateLineContent-4">
                                <div class="tab-pane fade show " id="animated-underline-home" role="tabpanel" aria-labelledby="animated-underline-home-tab">
                        
                                </div>
                                <div class="tab-pane fade" id="animated-underline-about" role="tabpanel" aria-labelledby="animated-underline-about-tab">
                                   
                                  
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


  <!-- Modal -->
  <div class="modal fade" id="uplodeRecipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('createInvoice') }}" method="POST" enctype="multipart/form-data"
        class="form form-action">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('uploadRecipt') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input name="file" id="file" type="file"
                        data-behaviour="custom-upload-input" value="multiple" onchange="readURL(this);" />
                    <img id="blah" >
                    <input type="hidden" name="deals" id="deals">
        </div>
        <div class="modal-footer">
      
          <input type="submit" class="btn btn-primary" value="Save changes">
        </div>
    </form>
      </div>
    </div>
  </div>

    <!-- Modal -->
    <div class="modal fade" id="newPrice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('updateNegotiate') }}" method="POST" enctype="multipart/form-data"
            class="form form-action">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{__('backend.send new price')}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">{{ __('new price') }}</label>
                <input name="price"  type="text" class="form-control"/>
                        
                <input type="hidden" name="deals" id="dealsprice">
            </div>
            <div class="modal-footer">
          
              <input type="submit" class="btn btn-primary" value="Save changes">
            </div>
        </form>
          </div>
        </div>
      </div>

@endsection

@push('plugin-scripts')
{!! Html::script('plugins/sweetalerts/sweetalert2.min.js') !!}
{!! Html::script('assets/js/basicui/sweet_alerts.js') !!}
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
            $('#animated-underline-home-tab').css('display','block');
            $('#negotiate-tab').css('display','block');
            $('#animated-underline-about-tab').css('display','block');
            $(document).find('#animated-underline-home').empty();
            $(document).find('#animated-underline-about').empty();
            $(document).find('#negotiate').empty();

            var id = $(this).data('id');
         

            $.ajax({
            url: '/DealsAuctions/get_invoice/'+ id,
            type: "get",
            contentType: 'application/json',
            success: function (data) {

                if (data.status == 'done') {
                    $('#animated-underline-home-tab').addClass('active');
                $('#animated-underline-home').addClass('show active');
              

                   $('#negotiate-tab').css('display','none');
                 
                        var d=`  <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <label class="labelNAV">{{ __('backend.invoice number') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.id}</span>
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <label class="labelNAV">{{ __('backend.customer name') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.customer_name}</span>
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <label class="labelNAV">{{ __('backend.Tax Number') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.TaxNumber}</span>
                                    </div>

                                </div>
                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <label class="labelNAV">{{ __('backend.status') }}</label>
                                    </div>
                                    <div class="col-md-8"> `
                                        
                                        if(data.inv.status =='un paid') {
                                         d +=`<span style=" color: var(--orange);">${data.inv.status}</span>`
                                        } else {
                                            d +=` <span>${data.inv.status}</span>`
                                        }
                                        d +=`    
                                      
                                    </div>

                                </div>

                                <div class="item row align-items-center">
                                    <div class="col-md-4">
                                        <label class="labelNAV">{{ __('backend.Invoice date') }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <span>${data.inv.invoice_date}</span>
                                    </div>

                                </div>
                                
                                
                                <a class="btn btn-success btn-rounded"
                                target="_blank"
                                                                    href="/DealsAuctions/show/${data.invoice_num} "
                                                                    role="button" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    {{ __('backend.Invoice details') }}
                                                                </a>`;
                                                                
                                                                
                $(document).find('#animated-underline-home').append(d);
                $(document).find('#animated-underline-about').append(` <img src="{{ asset('image/${data.receipt_img} ') }}" alt="" width="100%" height="100%" srcset="">`);
                
            } else {
                console.log(window.location.href.indexOf("issued") != -1);
                   
                $('#negotiate-tab').addClass('active');
                $('#negotiate').addClass('show active');
                $('#animated-underline-home-tab').css('display','none');
                   $('#animated-underline-about-tab').css('display','none');

                
           var x=     '<div class="text-center"<p>مقدم الطلب : ' + data.customer.name + ' </p>';                                                                                                                                                                                    
               x += '<a href="/profile/' + data.customer.id + '/details"><button class="btn btn-outline-dark btn-rounded mt-2" style="padding:7px;">مشاهدة الملف الشخصي</button></a></div>';
               x += '<div class="text-left mt-3 mr-2">';
               x += '<p class="text-left mt-3">المناقصة : ' + data.ads.title + ' </p>';
               x += '<p class="text-left mt-3"> السعر الاساسي : (' + data.ads.price + ') </p>';
               x += '<p class="text-left mt-3"> السعر المقدم: ' + data.price + ' </p></div>';
               x += ' <div class="col-md-12"> <div class="form-group text-center"><label for="aboutBio">ملاحظات</label> <textarea id="aboutBio" class="form-control" name="description" rows="5" disabled>' + data.negotiate_note + '</textarea> </div></div>';
                if (window.location.href.indexOf("issued") != -1){

                 

                            if (data.status == 'done'  ) {
                                x  +='<div class="row text-center"> <div class="col-md-12"><button type="button" data-action="waiting"  class="btn  btn-success btn-rounded " style="background-color: #aeaeae;border-color: #b1b1b1;">' + window.translation.AwaitingPayment + '</button></div></div> ';

                            } else if(data.status == 'waiting' ) {
                                x  +='<div class="row text-center"> </div> ';

                            }else if(data.status ==  'Awaiting payment' ) {
                                x  +='<div class="row text-center"> <div class="col-md-12"><button type="button" id="Recipt" data-bs-toggle="modal" data-bs-target="#uplodeRecipt" data-deals="' + data.id + '"   class="btn  btn-success btn-rounded ">' + window.translation.uploadRecipt + '</button></div></div> ';


                            }
                            else{
                                x  +='<div class="row text-center"> <div class="col-md-12"><button id="sendNewPrice" type="button" data-bs-toggle="modal" data-bs-target="#newPrice" class="btn btn-primary btn-rounded" data-deals=" ' + data.id + '">' + window.translation.sendPrice + '</button></div></div> ';

                            }

                        }else{
                            if (data.status == 'done'  ) {
                                x  +='<div class="row text-center"> <div class="col-md-12"><button type="button" data-action="waiting"  class="btn  btn-success btn-rounded " style="background-color: #aeaeae;border-color: #b1b1b1;">' + window.translation.AwaitingPayment + '</button></div></div> ';

                            } else if(data.status == 'rejected' ) {
                                x  +='<div class="row text-center"> </div> ';

                            }else if(data.status ==  'Awaiting payment' ) {
                                x  +='<div class="row text-center"> <div class="col-md-12"><button type="button" data-action="waiting"  class="btn  btn-warning btn-rounded">' + window.translation.AwaitingPayment + '</button></div></div>';


                            }
                            else{
                                x  +='<div class="row text-center"> <div class="col-md-6"><button type="button" data-action="waiting"  class="btn  btn-success btn-rounded change_status" data-id=" ' + data.id + '" data-status="Awaiting payment">' + window.translation.Accepttheoffer + '</button></div><div class="col-md-6"><button type="button" data-id=" ' + data.id + '" data-status="rejected" class="btn btn-danger btn-rounded change_status">' + window.translation.offerrejected + '</button></div></div> ';

                            }
                                     };
                
                        $(document).find('#negotiate').append( x);
                            }

            },
            error: function (xhr) {}
            });
            })

            $(document).on('click','.change_status', function(e) {
  

            var id = $(this).data('id');
            var status = $(this).data('status');
         

            $.ajax({
            url: '/DealsAuctions/change_status/'+id+'/'+status,
            type: "get",
            contentType: 'application/json',
            success: function (data) {
                var jsonobj = $.parseJSON(data)
                document.getElementById("alert").innerHTML = respon.message.substring(0, respon.message
                                .length);

                            $('.toast').toast('show');

                            if (respon.redirect) {
                                setTimeout(function () {
                                    window.location.href = respon.redirect;
                                }, 1500);
                            }

                            if (respon.reload) {
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            }

            }
        });
        });

        $(document).on('click','#Recipt', function(e) {
            $(document).find('#deals').val($(this).data('deals'));
            $('#modal-show-booking-invoice').modal('hide');

            $('#uplodeRecipt').modal('show');
        });

        $(document).on('click','#sendNewPrice', function(e) {
            $(document).find('#dealsprice').val($(this).data('deals'));
            $('#modal-show-booking-invoice').modal('hide');

            $('#newPrice').modal('show');
        });

        function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

    </script>
@endpush
