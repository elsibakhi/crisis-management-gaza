@extends('layouts.admin.master')
@section('title')
  {{ __('service contribution') }}
@endsection
@push('style')
@if (app()->getLocale()=="ar")
<link href="{{ asset('assets/plugins/custom/datatables/datatables-rtl.bundle.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    @endif
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('admin.contribution.service.index') }}" class="text-muted mr-2">{{ __('service contribution') }}</a>
    </li>
@endsection
@section('content')
    <div class="col-12">
        {{-- begin::Card --}}
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ __('all services') }}</h3>
                </div>
                <div class="card-toolbar">
                    <!-- Modal-->



   


       
                    

                    <div id="alert" class="alert alert-success " style="display: none"></div>


                </div>
            </div>
            <div class="card-body">
         

                <!--begin Modal-->

                <!--end Modal -->
                <!--begin: Datatable-->
                @include('admin.contributions.services.table')
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
            list: "{{ route('admin.contribution.service.list') }}",
           

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

                            return d;
                        },

                    },
                    columns: [{
                            data: "DT_RowIndex",
                            name: "DT_RowIndex"
                        },

                        {
                            data: 'title'
                        },

                        {
                            data: 'type'
                        },
                        {
                            data: 'status'
                        },

                        {
                            data: 'justification'
                        },
                        {
                            data: 'actions'
                        },





                    ],
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

    <script>

    </script>
    <script>
        var type = "Create";
    </script>
   







@endpush
