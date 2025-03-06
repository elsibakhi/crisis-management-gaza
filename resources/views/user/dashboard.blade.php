@extends('layouts.admin.master')
@section('title')
  {{__("dashboard")}}
@endsection
@push('style')
<link href="//www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
  <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
											<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">
        	
            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{__("dashboard")}}                            </h5>
            <!--end::Page Title-->

            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

   
        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            
            <!--begin::Actions-->
            <a href="{{route('dashboard',["filter"=>"today"])}}" class="btn btn-clean @if ($filter=="today")active @endif  btn-sm font-weight-bold font-size-base mr-1">
                {{__("today")}}
            </a>
            <a href="{{route('dashboard',["filter"=>"month"])}}" class="btn btn-clean @if ($filter=="month")active @endif btn-sm font-weight-bold font-size-base  mr-1">
                {{__("month")}}
            </a>
            <a href="{{route('dashboard',["filter"=>"year"])}}" class="btn btn-clean @if ($filter=="year")active @endif btn-sm font-weight-bold font-size-base mr-1">
                {{__("year")}}
            </a>
            <a href="{{route('dashboard')}}" class="btn btn-clean btn-sm font-weight-bold font-size-base text-hover-dark mr-1">
                {{__("reset")}}
            </a>
            <!--end::Actions-->


            

        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->
					
					<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container w-100 ">
			<!--begin::Dashboard-->
<!--begin::Row-->
@can([
    'view most accessible services chart'
])
    

<div class="row ">




	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("most accessible services")}} 
                    </h3>
                </div>
            </div>
            <div class="card-body">
               
                    <div id="kt_charts_access_services" style="height: 500px;"></div>
            </div>
        </div>
	</div>
	




</div>
<!--end::Row-->
<script>

    window.access_services_chart_data = JSON.parse('{!! $access_services_chart_data !!}');
</script>
@endcan
<!--begin::Row-->

@can([
   'view services with the most complaints chart'
])
<div class="row ">






	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("services with the most complaints")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
              
                <div id="kt_charts_complaints_services" style="height: 500px;"></div>
            </div>
        </div>
	</div>
	



</div>
<!--end::Row-->
<script>

    window.complaints_services_chart_data = JSON.parse('{!! $complaints_services_chart_data !!}');
</script> 
@endcan
@can([
  'view services with the most notes chart'
])
<!--begin::Row-->
<div class="row ">





	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("services with the most notes")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_notes_services" style="height: 500px;"></div>
            </div>
        </div>
	</div>






</div>
<!--end::Row-->

<script>
    window.notes_services_chart_data = JSON.parse('{!! $notes_services_chart_data !!}');
</script>
@endcan

@can([
'view opinions rating chart'
])
<!--begin::Row-->
<div class="row ">




	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("opinions rating")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_opinions" style="height: 500px;"></div>
            </div>
        </div>
	</div>
	




</div>
<!--end::Row-->

<script>
    

    window.opinions_chart_data = JSON.parse('{!! $opinions_chart_data !!}');
</script> 
@endcan
@can([
'view contributions status chart'
])
<!--begin::Row-->
<div class="row ">





	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("contributions status")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_contributions" style="height: 500px;"></div>
            </div>
        </div>
	</div>




</div>
<!--end::Row-->

<script>
    window.contributions_chart_data = JSON.parse('{!! $contributions_chart_data !!}');
</script> 
@endcan
@can([
"view number of news chart"
])
<!--begin::Row-->
<div class="row ">





	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("# of news")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_news" style="height: 500px;"></div>
            </div>
        </div>
	</div>




</div>
<!--end::Row-->

<script>
    window.news_chart_data = JSON.parse('{!! $news_chart_data !!}');
</script> 
@endcan

@can([
'view most copied links chart'
])
<!--begin::Row-->
<div class="row ">





	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("most copied links")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_links" style="height: 500px;"></div>
            </div>
        </div>
	</div>




</div>
<!--end::Row-->

<script>
    window.links_chart_data = JSON.parse('{!! $links_chart_data !!}');

</script> 

@endcan
@can([
'view institutions with most complaints chart'
])
<!--begin::Row-->
<div class="row ">





	<div class="col-lg-12">
        <div class="card card-custom gutter-b col-10">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label font-weight-bolder">
                        {{__("institutions with most complaints")}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
             
                <div id="kt_charts_institutions_complaints" style="height: 500px;"></div>
            </div>
        </div>
	</div>




</div>
<!--end::Row-->

<script>
    window.institutions_complaints_chart_data = JSON.parse('{!! $institutions_complaints_chart_data !!}');

</script> 




<!--end::Row-->

@endcan
<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
<!--end::Entry-->
				</div>
@endsection


@push('scripts')

 

 






        <!--begin::Page Vendors(used by this page)-->
       
        <!--end::Page Vendors-->

  
        <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="//www.amcharts.com/lib/3/serial.js"></script>
        <script src="//www.amcharts.com/lib/3/radar.js"></script>
        <script src="//www.amcharts.com/lib/3/pie.js"></script>
        <script src="//www.amcharts.com/lib/3/plugins/tools/polarScatter/polarScatter.min.js"></script>
        <script src="//www.amcharts.com/lib/3/plugins/animate/animate.min.js"></script>
        <script src="//www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <script src="//www.amcharts.com/lib/3/themes/light.js"></script>
      
    <!--begin::Page Scripts(used by this page)-->
            <script src="{{asset('assets/js/crisis_management/dashboard/admin/amcharts.js')}}"></script>
        <!--end::Page Scripts-->


@endpush