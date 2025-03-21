@extends('layouts.admin.master')
@section('title')
{{__($institution_type)}}
@endsection
@push('style')

@if (app()->getLocale()=="ar")
<link href="{{ asset('assets/css/pages/wizard/wizard-1-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/custom/leaflet/leaflet-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/custom/datatables/datatables-rtl.bundle.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    @endif


@endpush
@section('breadcrumb')
@parent
<li class="breadcrumb-item text-muted">
    <a href="{{ route('institution.index',["type"=>$institution_type]) }}" class="text-muted mr-2">{{__($institution_type)}}</a>
</li>
@endsection
@section('content')
<div class="col-12">
    {{-- begin::Card --}}
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{__('all institutions')}}</h3>
            </div>
            <div class="card-toolbar">
                <!-- Modal-->
           


          
              
                @if ($institution_type=="institutions" || $institution_type==null )
               
                @can(["create institutions"])
               
                <div class=" w-100 mx-5 px-5 row justify-content-end">

                    <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#Institutions">
                        {{__('add an institution')}}
                    </button>
            </div>
                <div id="institutionsModal">
                    @include('admin.institutions.modal',["action"=>route('institution.store')])
            
                 </div> 
              
              
                 @endcan
            
                
                @endif
              


                
                <div id="alert" class="alert alert-success " style="display: none"></div>


            </div>
        </div>
        <div class="card-body">
            <div class="justify-between p-5 sm:flex">
                <div class="grid  sm:grid-cols-3 align-items-baseline sm:gap-6 gap-2 md:mt-4 w-full"
                    style="align-items: center !important;">


                </div>
            </div>

            <!--begin Modal-->

            <!--end Modal -->
            <!--begin: Datatable-->
            @include('admin.institutions.table')
            <!--end: Datatable-->
        </div>
    </div>
    {{-- end::Card --}}
</div>
@endsection
@push('scripts')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ajax-bootstrap-select/1.3.8/js/ajax-bootstrap-select.min.js">
</script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/toastr.js?v=7.2.9') }}"></script>







<!--end::Page Scripts-->
<script>
    const routes = {
            list: "{{ route('admin.institutions.list') }}",
            institution_store_url:"{{route('institution.store')}}"

        };
</script>

<script>
    $(document).ready(function() {
            KTDatatablesDataSourceAjaxServer.init();



      })
      var lang_table={ }
      if(language=="ar"){
         lang_table={
                  url: '{{asset("assets/json/datatable/ar.json")}}'
            }
      }

      var KTDatatablesDataSourceAjaxServer = function() {
          
          var initTable1 = function() {
                var table = $('#kt_datatable');

            var  cols= [{
                            data: "DT_RowIndex",
                            name: "DT_RowIndex"
                        },

                        {
                            data: 'name'
                        },

                        {
                            data: 'email'
                        },

                        {
                            data: 'type'
                        },
                       



    

                    ]

                   if('{{$institution_type}}'=='enrollments'){
                    cols.push( {
                            data: 'status'
                        })
                   } 

                   cols.push( {
                            data: 'actions'
                        })
                // begin first table
                table.DataTable({
                    responsive: true,
                    searchDelay: 500,
                    processing: true,
                    serverSide: true,
                    order: [
                        [0, "desc"]
                    ],
                    ajax: {
                        url: routes.list,
                        type: 'get',
                        data: function(d) {
                            d.type = '{{$institution_type}}';
                            return d;
                        },

                    },
                    columns: cols,
                    columnDefs: [{
                        targets: [-1],
                        className: "d-flex justify-content-center"
                    }, ],
                    language:  lang_table

                });
            };

            return {

                //main function to initiate the module
                init: function() {
                    initTable1();
                },

            };

        }();
</script>
{{-- 
<script>
    $(document).ready(function () {
$("#modal_submit").on("click", function (event) {
    event.preventDefault();

    if ($("#modalInput").val() != "") {

        $.post(routes.admin_extensions_store,
            {
                _token:"{{ csrf_token() }}",

                title: $("#modalInput").val(),

            },
            function (data, status) {




                $("#modal_close").click();
                $("#modalInput").val("")
                $("#modalInput").removeClass("is-invalid")
                $("#modal_feedback").text("")
                $("#alert").text(data[0])
                $("#alert").fadeIn("fast")

               $('#kt_extensions_datatable').DataTable().draw();
                setTimeout(function () {
                    $("#alert").fadeOut("slow")
                },1000)
            });


    } else {
        $("#modalInput").addClass("is-invalid")
        $("#modal_feedback").text("The name field is required")
    }

});
});






</script> --}}
<script>
    var type = "Create";
</script>
<script src="{{asset('assets/js/crisis_management/institutions/wizard-1.js')}}"></script>


<script src="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
<!--end::Page Vendors-->

<script>
    window.page="Create";

</script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/crisis_management/services/leaflet-maps.js')}}"></script>
    <!--end::Page Scripts-->

@endpush