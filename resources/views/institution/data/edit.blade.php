@extends('layouts.admin.master')
@section('title')
 {{__('edit info')}}
@endsection
@push('style')
    
   
    @if (app()->getLocale()=="ar")

<link href="{{asset('assets/plugins/custom/leaflet/leaflet-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
@else

<link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>

    @endif
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('institution.data.edit') }}" class="text-muted mr-2">{{__('info')}}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted mr-2">{{__('edit')}} {{ $user->name }} {{__('info')}}</a>
    </li>
@endsection
@section('content')
<div class="d-flex flex-row">

	<!--end::Aside-->
	<!--begin::Content-->
	<div class="flex-row-fluid ml-lg-8">
        	<!--begin::Form-->
		<form id="data_form" class="form" method="post" action="{{route('institution.data.update')}}" >
            @csrf
            @method("PUT")
		<!--begin::Card-->
		<div class="card card-custom card-stretch">
			<!--begin::Header-->
			<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">{{__('informations')}}</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">{{__('update your informaitons')}}</span>
                </div>
				<div class="card-toolbar">
					<button id="btn_submit" type="submit" class="btn btn-success mr-2">{{__('save changes')}}</button>
				
				</div>
			</div>
			<!--end::Header-->

		
				<!--begin::Body-->
				<div class="card-body">



                    <div class="">

                        <div class="form-group fv-plugins-icon-container">
                            <label>{{__('description')}}</label>
    
                            <textarea class="form-control form-control-solid form-control-lg" name="description" id="" cols="30"
                                rows="10">{{ $data->description }}</textarea>
                            <div class="fv-plugins-message-container"></div>
                        </div>
                    </div>
                        <div class="row justify-content-between">

                            <h4 class="mb-10 font-weight-bold text-dark">{{__('setup your time')}}</h4>
                            


                            <a tabindex="0" class=" fas fa-info-circle text-warning" role="button" data-placement="left" data-toggle="popover" data-trigger="click" title="Warning" data-content="{{__('any change to your times will affect your service times and you may lose one of your services')}}">
   
                                                                                    </a>
                        </div>
                    <div class="">
       
                        <div class="form-group fv-plugins-icon-container  ">
                            <label class="col-3 col-form-label">{{__('working days')}}</label>
                            <div class="col-9 col-form-label">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","saturday")->first()) value="saturday"/>
                                        <span></span>
                                        {{__('saturday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","sunday")->first())  value="sunday"/>
                                        <span></span>
                                        {{__('sunday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","monday")->first())  value="monday"/>
                                        <span></span>
                                        {{__('monday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","tuesday")->first())  value="tuesday"/>
                                        <span></span>
                                        {{__('tuesday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","wednesday")->first())  value="wednesday"/>
                                        <span></span>
                                        {{__('wednesday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","thursday")->first())  value="thursday"/>
                                        <span></span>
                                        {{__('thursday')}}
                                    </label>
                                    <label class="checkbox checkbox-outline checkbox-dark">
                                        <input type="checkbox" name="workingDays[]" @checked($user->workingDays()->where("day","friday")->first())  value="friday"/>
                                        <span></span>
                                        {{__('friday')}}
                                    </label>
                                    
                                </div>
                            
                            </div>
                        </div>
                      
                        <div class=" form-group fv-plugins-icon-container">
                            <label>{{__('start time')}}</label>
                            <input type="time" value="{{ $data->start_time }}"
                                class="form-control form-control-solid form-control-lg" name="start_time"
                              >
    
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <div class="form-group fv-plugins-icon-container">
                            <label>{{__('end time')}}</label>
                            <input type="time" value="{{ $data->end_time }}"
                                class="form-control form-control-solid form-control-lg" name="end_time"
                                >
    
                            <div class="fv-plugins-message-container"></div>
                        </div>

                    </div>

            
            

                    <div class="d-flex justify-content-between">
                        <h4 class="mb-10 font-weight-bold text-dark">{{__('setup current location')}}</h4>
                        <i class="fa fa-map-marker-alt fa-2x  text-hover-dark " style="cursor: pointer" onclick="locationIcon()"></i>
                    </div>
              
                    <div class="row">
                        <div class=" col-xl-8">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__('location')}}</label>
                                <div id="kt_leaflet_5" style="height:300px"></div>
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-8">
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__('region')}}</label>
                                <select name="region" class="form-control form-control-lg form-control-solid " id="exampleSelectl" data-gtm-form-interact-field-id="1">
                                    <option selected value="" >{{__('select the region')}}</option>
                                    <option @selected($data->location->region=="أم النصر") value="أم النصر">أم النصر</option>
                                    <option @selected($data->location->region=="بيت لاهيا") vlaue="بيت لاهيا" >بيت لاهيا</option>
                                    <option @selected($data->location->region=="بيت حانون") vlaue="بيت حانون" >بيت حانون</option>
                                    <option @selected($data->location->region=="مخيم جباليا") vlaue="مخيم جباليا" >مخيم جباليا</option>
                                    <option @selected($data->location->region=="جباليا") vlaue="جباليا" >جباليا</option>
                                    <option @selected($data->location->region=="غزة") vlaue="غزة" >غزة</option>
                                    <option @selected($data->location->region=="مخيم الشاطئ") vlaue="مخيم الشاطئ" >مخيم الشاطئ</option>
                                    <option @selected($data->location->region=="الزهراء") vlaue="الزهراء" >الزهراء</option>
                                    <option @selected($data->location->region=="المغراقة") vlaue="المغراقة" >المغراقة</option>
                                    <option @selected($data->location->region=="جحر الديك") vlaue="جحر الديك" >جحر الديك</option>
                                    <option @selected($data->location->region=="دير البلح") vlaue="دير البلح" >دير البلح</option>
                                    <option @selected($data->location->region=="مخيم دير البلح") vlaue="مخيم دير البلح" >مخيم دير البلح</option>
                                    <option @selected($data->location->region=="مخيم النصيرات") vlaue="مخيم النصيرات" >مخيم النصيرات</option>
                                    <option @selected($data->location->region=="النصيرات") vlaue="النصيرات" >النصيرات</option>
                                    <option @selected($data->location->region=="مخيم البريج") vlaue="مخيم البريج" >مخيم البريج</option>
                                    <option @selected($data->location->region=="البريج") vlaue="البريج" >البريج</option>
                                    <option @selected($data->location->region=="مخيم المغازي") vlaue="مخيم المغازي" >مخيم المغازي</option>
                                    <option @selected($data->location->region=="المغازي") vlaue="المغازي" >المغازي</option>
                                    <option @selected($data->location->region=="الزوايدة") vlaue="الزوايدة" >الزوايدة</option>
                                    <option @selected($data->location->region=="المصدر") vlaue="المصدر" >المصدر</option>
                                    <option @selected($data->location->region=="وادي السلقا") vlaue="وادي السلقا" >وادي السلقا</option>
                                    <option @selected($data->location->region=="خان يونس") vlaue="خان يونس" >خان يونس</option>
                                    <option @selected($data->location->region=="مخيم خان يونس") vlaue="مخيم خان يونس" >مخيم خان يونس</option>
                                    <option @selected($data->location->region=="بني سهيلا") vlaue="بني سهيلا" >بني سهيلا</option>
                                    <option @selected($data->location->region=="القرارة") vlaue="القرارة" >القرارة</option>
                                    <option @selected($data->location->region=="حمد") vlaue="حمد" >حمد</option>
                                    <option @selected($data->location->region=="عبسان الجديدة") vlaue="عبسان الجديدة" >عبسان الجديدة</option>
                                    <option @selected($data->location->region=="عبسان الكبيرة") vlaue="عبسان الكبيرة" >عبسان الكبيرة</option>
                                    <option @selected($data->location->region=="خزاعة") vlaue="خزاعة" >خزاعة</option>
                                    <option @selected($data->location->region=="الفخاري") vlaue="الفخاري" >الفخاري</option>
                                    <option @selected($data->location->region=="رفح") vlaue="رفح" >رفح</option>
                                    <option @selected($data->location->region=="مخيم رفح") vlaue="مخيم رفح" >مخيم رفح</option>
                                    <option @selected($data->location->region=="النصر(البيوك)") vlaue="النصر(البيوك)" >النصر(البيوك)</option>
                                    <option @selected($data->location->region=="شوكة الصوفي") vlaue="شوكة الصوفي" >شوكة الصوفي</option>
                                  
                                  
                                </select>
                                
                            <div class="fv-plugins-message-container"></div></div>
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__('address')}}</label>
                                <input type="text" class="form-control form-control-solid form-control-lg" name="address" value="{{$data->location->address }}" >
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                            
                                <input type="hidden"  name="lat" value="{{ $data->location->lat }}"  >
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <input type="hidden"  name="lng" value="{{$data->location->lng }}" >
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>
                       
                       
                    </div>

			

                
			

                    
       
            

				</div>
				<!--end::Body-->
                
		</div>
    </form>
    <!--end::Form-->
	</div>
	<!--end::Content-->
</div>







@endsection

@push('scripts')
<script>
    home_route="/";
</script>
<script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
<script src="{{ asset('assets/js/crisis_management/institutions/data/form.js') }}"></script>

<script>
    window.page="Edit";
    window.address = "{{$data->location->address}}";
    window.lastLat = "{{$data->location->lat}}";
    window.lastLng = "{{$data->location->lng}}";
</script>

<script src="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/js/crisis_management/services/leaflet-maps.js')}}"></script>
<!--end::Page Scripts-->
@endpush
