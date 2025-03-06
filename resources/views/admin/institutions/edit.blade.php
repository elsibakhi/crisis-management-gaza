@extends('layouts.admin.master')
@section('title')
{{ __('edit institution info') }}
@endsection
@push('style')


    @if (app()->getLocale()=="ar")
    <link href="{{ asset('assets/css/pages/wizard/wizard-1-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/leaflet/leaflet-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
    @else
    <link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>
    
        @endif
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('institution.index') }}" class="text-muted mr-2">{{ __('institutions') }}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted mr-2">{{ __('edit') }} {{ $institution->name }}</a>
    </li>
@endsection
@section('content')
    <div class=" col-12 ">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav  border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-list"></i>
                                    <h3 class="wizard-title">{{ __('enter details') }}</h3>
                                </div>
       
                            </div>
                            <!--end::Wizard Step 1 Nav-->

                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-bus-stop"></i>
                                    <h3 class="wizard-title">{{ __('setup location') }}</h3>
                                </div>

                            </div>



                            <!--end::Wizard Step 2 Nav-->

                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-responsive"></i>
                                    <h3 class="wizard-title">{{ __('extra info') }}</h3>
                                </div>

                            </div>
                            <!--end::Wizard Step 3 Nav-->

                            <!--begin::Wizard Step 4 Nav-->

                            <!--end::Wizard Step 4 Nav-->

                            <!--begin::Wizard Step 5 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-globe"></i>
                                    <h3 class="wizard-title">{{ __('all done') }}</h3>
                                </div>
            
                            </div>
                            <!--end::Wizard Step 5 Nav-->
                        </div>
                    </div>
                    <!--end::Wizard Nav-->

                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin::Wizard Form-->
                            <form action="{{route('institution.update',$institution->id)}}" class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form_institution">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="institution_id" value="{{$institution->id}}">
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('enter the details of institution account') }}
                                    </h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('name') }}</label>
                                        <input type="text" value="{{ $institution->name }}"
                                            class="form-control form-control-solid form-control-lg" name="name"
                                            placeholder="{{ __('baraa elsibakhi') }}">

                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <!--end::Input-->

                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('email') }}</label>
                                        <input type="email" value="{{ $institution->email }}"
                                            class="form-control form-control-solid form-control-lg" name="email"
                                            placeholder="{{ __('email@example.com') }}">

                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <!--end::Input-->

                                    <div class="row">
                                        <div class="col-xl-6">

                                            <!--begin::Input-->

                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{ __('password') }}</label>
                                                <input type="password"
                                                    class="form-control form-control-solid form-control-lg"
                                                    name="password" value="" >

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{ __('confirmed password') }}</label>
                                                <input type="password"
                                                  value=""  class="form-control form-control-solid form-control-lg"
                                                    name="password_confirmation" >

                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                    </div>
                                </div>
                                <!--end::Wizard Step 1-->

    <!--begin: Wizard Step 2-->
    <div class="pb-5" data-wizard-type="step-content">
        <div class="d-flex justify-content-between">
            <h4 class="mb-10 font-weight-bold text-dark">{{ __('setup current location') }}</h4>
            <i class="fa fa-map-marker-alt fa-2x  text-hover-dark " style="cursor: pointer" onclick="locationIcon()"></i>
        </div>

        <div class="row">
            <div class=" col-xl-8">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('location') }}</label>
                    <div id="kt_leaflet_5" style="height:300px"></div>
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>

            <div class="col-xl-6">
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('region') }}</label>
                    <select name="region" class="form-control form-control-lg form-control-solid " id="exampleSelectl" data-gtm-form-interact-field-id="1">
                        <option selected value="" >{{ __('select the region') }}</option>
                        <option @selected($institution->institutionData->location->region=="أم النصر") value="أم النصر">أم النصر</option>
                        <option @selected($institution->institutionData->location->region=="بيت لاهيا") vlaue="بيت لاهيا" >بيت لاهيا</option>
                        <option @selected($institution->institutionData->location->region=="بيت حانون") vlaue="بيت حانون" >بيت حانون</option>
                        <option @selected($institution->institutionData->location->region=="مخيم جباليا") vlaue="مخيم جباليا" >مخيم جباليا</option>
                        <option @selected($institution->institutionData->location->region=="جباليا") vlaue="جباليا" >جباليا</option>
                        <option @selected($institution->institutionData->location->region=="غزة") vlaue="غزة" >غزة</option>
                        <option @selected($institution->institutionData->location->region=="مخيم الشاطئ") vlaue="مخيم الشاطئ" >مخيم الشاطئ</option>
                        <option @selected($institution->institutionData->location->region=="الزهراء") vlaue="الزهراء" >الزهراء</option>
                        <option @selected($institution->institutionData->location->region=="المغراقة") vlaue="المغراقة" >المغراقة</option>
                        <option @selected($institution->institutionData->location->region=="جحر الديك") vlaue="جحر الديك" >جحر الديك</option>
                        <option @selected($institution->institutionData->location->region=="دير البلح") vlaue="دير البلح" >دير البلح</option>
                        <option @selected($institution->institutionData->location->region=="مخيم دير البلح") vlaue="مخيم دير البلح" >مخيم دير البلح</option>
                        <option @selected($institution->institutionData->location->region=="مخيم النصيرات") vlaue="مخيم النصيرات" >مخيم النصيرات</option>
                        <option @selected($institution->institutionData->location->region=="النصيرات") vlaue="النصيرات" >النصيرات</option>
                        <option @selected($institution->institutionData->location->region=="مخيم البريج") vlaue="مخيم البريج" >مخيم البريج</option>
                        <option @selected($institution->institutionData->location->region=="البريج") vlaue="البريج" >البريج</option>
                        <option @selected($institution->institutionData->location->region=="مخيم المغازي") vlaue="مخيم المغازي" >مخيم المغازي</option>
                        <option @selected($institution->institutionData->location->region=="المغازي") vlaue="المغازي" >المغازي</option>
                        <option @selected($institution->institutionData->location->region=="الزوايدة") vlaue="الزوايدة" >الزوايدة</option>
                        <option @selected($institution->institutionData->location->region=="المصدر") vlaue="المصدر" >المصدر</option>
                        <option @selected($institution->institutionData->location->region=="وادي السلقا") vlaue="وادي السلقا" >وادي السلقا</option>
                        <option @selected($institution->institutionData->location->region=="خان يونس") vlaue="خان يونس" >خان يونس</option>
                        <option @selected($institution->institutionData->location->region=="مخيم خان يونس") vlaue="مخيم خان يونس" >مخيم خان يونس</option>
                        <option @selected($institution->institutionData->location->region=="بني سهيلا") vlaue="بني سهيلا" >بني سهيلا</option>
                        <option @selected($institution->institutionData->location->region=="القرارة") vlaue="القرارة" >القرارة</option>
                        <option @selected($institution->institutionData->location->region=="حمد") vlaue="حمد" >حمد</option>
                        <option @selected($institution->institutionData->location->region=="عبسان الجديدة") vlaue="عبسان الجديدة" >عبسان الجديدة</option>
                        <option @selected($institution->institutionData->location->region=="عبسان الكبيرة") vlaue="عبسان الكبيرة" >عبسان الكبيرة</option>
                        <option @selected($institution->institutionData->location->region=="خزاعة") vlaue="خزاعة" >خزاعة</option>
                        <option @selected($institution->institutionData->location->region=="الفخاري") vlaue="الفخاري" >الفخاري</option>
                        <option @selected($institution->institutionData->location->region=="رفح") vlaue="رفح" >رفح</option>
                        <option @selected($institution->institutionData->location->region=="مخيم رفح") vlaue="مخيم رفح" >مخيم رفح</option>
                        <option @selected($institution->institutionData->location->region=="النصر(البيوك)") vlaue="النصر(البيوك)" >النصر(البيوك)</option>
                        <option @selected($institution->institutionData->location->region=="شوكة الصوفي") vlaue="شوكة الصوفي" >شوكة الصوفي</option>
                      
                      
                    </select>
                    
                <div class="fv-plugins-message-container"></div></div>
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('address') }}</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" name="address" value="{{ $institution->institutionData->location->address }}" >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                
                    <input type="hidden"  name="lat" value="{{ $institution->institutionData->location->lat }}"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <input type="hidden"  name="lng" value="{{ $institution->institutionData->location->lng }}" >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
           
           
        </div>

    </div>
    <!--end: Wizard Step 2-->


                                <!--end::Wizard Step 2-->

                                <!--begin::Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('extra info') }}</h4>
                                    <!--begin::Select-->
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('type') }}</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <select class="form-control" name="type">
                                                <option value="">{{ __('select') }}</option>
                                                <option value="food" @selected($institution->institutionData->type == 'food')>{{ __('food') }}</option>
                                                <option @selected($institution->institutionData->type == 'education') value="education">{{ __('education') }}</option>
                                                <option @selected($institution->institutionData->type == 'health') value="health">{{ __('health') }}</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('phone number') }}</label>
                                        <input type="text" value="{{ $institution->profile->phone }}"
                                            class="form-control form-control-solid form-control-lg" name="phone"
                                            placeholder="0591234567">

                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('languge') }}</label>
                                        <select class="form-control" name="locale">
                                            <option value="">{{ __('select') }}</option>
                                            <option @selected($institution->profile?->locale=="ar") value="ar">العربية</option>
                                            <option @selected($institution->profile?->locale=="en") value="en">English</option>
                                         
                                            
                                        </select>

                                        <div class="fv-plugins-message-container"></div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">{{ __('working days') }}</label>
                                        <div class="col-9 col-form-label">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","saturday")->first()) value="saturday"/>
                                                    <span></span>
                                                    {{ __('saturday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","sunday")->first())  value="sunday"/>
                                                    <span></span>
                                                    {{ __('sunday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","monday")->first())  value="monday"/>
                                                    <span></span>
                                                    {{ __('monday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","tuesday")->first())  value="tuesday"/>
                                                    <span></span>
                                                    {{ __('tuesday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","wednesday")->first())  value="wednesday"/>
                                                    <span></span>
                                                    {{ __('wednesday') }} 
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","thursday")->first())  value="thursday"/>
                                                    <span></span>
                                                    {{ __('thursday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" @checked($institution->workingDays()->where("day","friday")->first())  value="friday"/>
                                                    <span></span>
                                                    {{ __('friday') }}
                                                </label>
                                                
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('start time') }}</label>
                                        <input type="time" value="{{ $institution->institutionData->start_time }}"
                                            class="form-control form-control-solid form-control-lg" name="start_time"
                                           >

                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('end time') }}</label>
                                        <input type="time" value="{{ $institution->institutionData->end_time }}"
                                            class="form-control form-control-solid form-control-lg" name="end_time"
                                            >

                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('description') }}</label>

                                        <textarea class="form-control form-control-solid form-control-lg" name="description" id="" cols="30"
                                            rows="10">{{ $institution->institutionData->description }}</textarea>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <!--end::Select-->

                                    <!--begin::Select-->

                                    <!--end::Select-->

                                    <!--begin::Select-->

                                    <!--end::Select-->
                                </div>
                                <!--end::Wizard Step 3-->

                                <!--begin::Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('all inputs are ready to store , please
                                        submit the form') }}</h4>




                                </div>
                                <!--end::Wizard Step 4-->



                                <!--begin::Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button"
                                            class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-prev">
                                            {{ __('previous') }}
                                        </button>
                                    </div>
                                    <div>
                                        <button id="submitBtn" type="button"
                                            class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-submit">
                                            {{ __('submit') }}
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-next">
                                            {{ __('next') }}
                                        </button>
                                    </div>
                                </div>
                                <!--end::Wizard Actions-->
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </form>
                            <!--end::Wizard Form-->
                        </div>
                    </div>
                    <!--end::Wizard Body-->
                </div>
                <!--end::Wizard-->
            </div>
            <!--end::Wizard-->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var type = "Edit";
        const routes = {
            institutions_url:"{{url()->previous()}}"
        }
    </script>
   <script src="{{asset('assets/js/crisis_management/institutions/wizard-1.js')}}"></script>

   <!--end::Page Vendors-->

        <script>
            window.page="Edit";
            window.address = "{{$institution->institutionData->location->address}}";
            window.lastLat = "{{$institution->institutionData->location->lat}}";
            window.lastLng = "{{$institution->institutionData->location->lng}}";
        </script>

<script src="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
       <!--begin::Page Scripts(used by this page)-->
       <script src="{{asset('assets/js/crisis_management/services/leaflet-maps.js')}}"></script>
       <!--end::Page Scripts-->
@endpush
