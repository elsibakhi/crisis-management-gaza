@extends('layouts.guest.master')

@push('style')



@if (app()->getLocale()=="ar")
<link rel="stylesheet" href="{{asset('assets/css/pages/wizard/wizard-5-rtl.css')}}"/>
<link href="{{asset('assets/plugins/custom/uppy/uppy-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/custom/leaflet/leaflet-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
@else
<link rel="stylesheet" href="{{asset('assets/css/pages/wizard/wizard-5.css')}}"/>
<link href="{{asset('assets/plugins/custom/uppy/uppy.bundle.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>

    @endif
@endpush

@section('title')
{{ __('service contribution') }}
@endsection


@section('content')
<div class=" container ">
    <!--begin::Card-->
<div class="card card-custom">
<!--begin::Card Body-->
<div class="card-body p-0">
<!--begin::Wizard 5-->
<div class="wizard wizard-5 d-flex flex-column flex-lg-row flex-row-fluid" id="kt_wizard" data-wizard-state="first">
    <!--begin::Aside-->
    <div class="wizard-aside bg-white d-flex flex-column flex-row-auto w-100 w-lg-300px w-xl-400px w-xxl-500px">
        <!--begin::Aside Top-->
        <div class="d-flex flex-column-fluid flex-column px-xxl-30 px-10">
            <!--begin: Wizard Nav-->
            <div class="wizard-nav d-flex d-flex justify-content-center pt-10 pt-lg-20 pb-5">
                <!--begin::Wizard Steps-->
                <div class="wizard-steps">


                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / General / User</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('service details') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('setup your service details') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / General / User</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('service justification') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('tell me what is your justification') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Map/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / Map / Compass</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('setup location') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('choose service location') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Thunder-move.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / General / Thunder-move</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
                        <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('times') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('setup your time') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Thunder-move.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / General / Thunder-move</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
                        <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('additional info') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('setup additional info') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->
                        
                        <!--begin::Wizard Step 3 Nav-->
<div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
    <div class="wizard-wrapper">
        <div class="wizard-icon">
            <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Thunder-move.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <title>Stockholm-icons / General / Thunder-move</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <rect x="0" y="0" width="24" height="24"></rect>
    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
    </g>
    </svg><!--end::Svg Icon--></span>                            </div>
        <div class="wizard-label">
            <h3 class="wizard-title">
                {{ __('attachments') }}
            </h3>
            <div class="wizard-desc">
                {{ __('attach photos') }}
            </div>
        </div>
    </div>
    </div>
    <!--end::Wizard Step 3 Nav-->
                        
                        
                        
                        <!--begin::Wizard Step 6 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                        <div class="wizard-wrapper">
                            <div class="wizard-icon">
                                <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Like.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / General / Like</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"></path>
                        <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"></rect>
                        </g>
                        </svg><!--end::Svg Icon--></span>                            </div>
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    {{ __('completed!') }}
                                </h3>
                                <div class="wizard-desc">
                                    {{ __('review and submit') }}
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--end::Wizard Step 6 Nav-->
                </div>
                <!--end::Wizard Steps-->
            </div>
            <!--end: Wizard Nav-->
        </div>
        <!--end::Aside Top-->

 
    </div>
    <!--begin::Aside-->

    <!--begin::Content-->
    <div class="wizard-content bg-white d-flex flex-column flex-row-fluid py-15 px-5 px-lg-10">


        <!--begin::Form-->
        <div class="d-flex justify-content-center flex-row-fluid">
            <form action="{{route('contribution.service.store')}}" method="POST" class="pb-5 w-100 w-md-450px w-lg-500px fv-plugins-bootstrap fv-plugins-framework service-cont-form" novalidate="novalidate" id="kt_form" >
 @csrf

         
    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
        <h4 class="mb-10 font-weight-bold text-dark">{{ __('enter your service details') }}</h4>
        <!--begin::Input-->
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('title') }}</label>
            <input type="text" class="form-control form-control-solid form-control-lg" name="title"  >
            
        <div class="fv-plugins-message-container"></div></div>
        <!--end::Input-->

        <!--begin::Input-->
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('description') }}</label>
           
            <textarea class="form-control form-control-solid form-control-lg" name="description" id="" cols="30" rows="10"></textarea>
        <div class="fv-plugins-message-container"></div></div>
        <!--end::Input-->




    </div>
    <!--end: Wizard Step 1-->
    <div class="pb-5" data-wizard-type="step-content" >
        <h4 class="mb-10 font-weight-bold text-dark">{{ __('enter your justification to accept this service') }}</h4>
        <!--begin::Input-->

        <!--begin::Input-->
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('justification') }}</label>
           
            <textarea class="form-control form-control-solid form-control-lg" name="justification" id="" cols="30" rows="10"></textarea>
        <div class="fv-plugins-message-container"></div></div>
        <!--end::Input-->




    </div>
    <!--end: Wizard Step 1-->

    <!--begin: Wizard Step 2-->
    <div class="pb-5" data-wizard-type="step-content">
        <div class="d-flex justify-content-between">
            <h4 class="mb-10 font-weight-bold text-dark">{{ __('setup current location') }}</h4>
            <i class="fa fa-map-marker-alt fa-2x  text-hover-dark " style="cursor: pointer" onclick="locationIcon()"></i>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('location') }}</label>
                    <div id="kt_leaflet_5" style="height:300px;"></div>
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('address') }}</label>
                    <input name="address" type="text" class="form-control form-control-solid form-control-lg" >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('region') }}</label>
                    <select name="region" class="form-control form-control-lg form-control-solid " id="exampleSelectl" data-gtm-form-interact-field-id="1">
                        <option selected value="" >{{ __('select the region') }}</option>
                        <option value="أم النصر">أم النصر</option>
                        <option vlaue="بيت لاهيا" >بيت لاهيا</option>
                        <option vlaue="بيت حانون" >بيت حانون</option>
                        <option vlaue="مخيم جباليا" >مخيم جباليا</option>
                        <option vlaue="جباليا" >جباليا</option>
                        <option vlaue="غزة" >غزة</option>
                        <option vlaue="مخيم الشاطئ" >مخيم الشاطئ</option>
                        <option vlaue="الزهراء" >الزهراء</option>
                        <option vlaue="المغراقة" >المغراقة</option>
                        <option vlaue="جحر الديك" >جحر الديك</option>
                        <option vlaue="دير البلح" >دير البلح</option>
                        <option vlaue="مخيم دير البلح" >مخيم دير البلح</option>
                        <option vlaue="مخيم النصيرات" >مخيم النصيرات</option>
                        <option vlaue="النصيرات" >النصيرات</option>
                        <option vlaue="مخيم البريج" >مخيم البريج</option>
                        <option vlaue="البريج" >البريج</option>
                        <option vlaue="مخيم المغازي" >مخيم المغازي</option>
                        <option vlaue="المغازي" >المغازي</option>
                        <option vlaue="الزوايدة" >الزوايدة</option>
                        <option vlaue="المصدر" >المصدر</option>
                        <option vlaue="وادي السلقا" >وادي السلقا</option>
                        <option vlaue="خان يونس" >خان يونس</option>
                        <option vlaue="مخيم خان يونس" >مخيم خان يونس</option>
                        <option vlaue="بني سهيلا" >بني سهيلا</option>
                        <option vlaue="القرارة" >القرارة</option>
                        <option vlaue="حمد" >حمد</option>
                        <option vlaue="عبسان الجديدة" >عبسان الجديدة</option>
                        <option vlaue="عبسان الكبيرة" >عبسان الكبيرة</option>
                        <option vlaue="خزاعة" >خزاعة</option>
                        <option vlaue="الفخاري" >الفخاري</option>
                        <option vlaue="رفح" >رفح</option>
                        <option vlaue="مخيم رفح" >مخيم رفح</option>
                        <option vlaue="النصر(البيوك)" >النصر(البيوك)</option>
                        <option vlaue="شوكة الصوفي" >شوكة الصوفي</option>
                      
                      
                    </select>
                    
                <div class="fv-plugins-message-container"></div></div>
            </div>
      
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                
                    <input type="hidden"  name="lat"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <input type="hidden"  name="lng"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
           
           
        </div>
   

    </div>
    <!--end: Wizard Step 2-->

    <!--begin: Wizard Step 3-->
    <div class="pb-5" data-wizard-type="step-content">
        <h4 class="mb-10 font-weight-bold text-dark">{{ __('setup your time') }}</h4>

        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('start date') }}</label>
            <input type="date" class="form-control form-control-solid form-control-lg" name="start_date" 
       
           >
            
        <div class="fv-plugins-message-container"></div></div>
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('period') }}</label>
            <input type="number" class="form-control form-control-solid form-control-lg" name="period"
          
             >
            
        <div class="fv-plugins-message-container"></div></div>

        <div class="form-group row">
            <label class="col-3 col-form-label">{{ __('working days') }}</label>
            <div class="col-9 col-form-label">
                <div class="checkbox-inline">
                       
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="saturday"/>
                            <span></span>
                            {{ __('saturday') }}  
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="sunday"/>
                            <span></span>
                            {{ __('sunday') }} 
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="monday"/>
                            <span></span>
                            {{ __('monday') }} 
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="tuesday"/>
                            <span></span>
                            {{ __('tuesday') }} 
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="wednesday"/>
                            <span></span>
                            {{ __('wednesday') }} 
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="thursday"/>
                            <span></span>
                            {{ __('thursday') }} 
                        </label>
                        <label class="checkbox checkbox-outline checkbox-dark">
                            <input type="checkbox" name="workingDays[]" value="friday"/>
                            <span></span>
                            {{ __('friday') }} 
                        </label>
                       

        
                    
                </div>
            
            </div>
        </div>
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('start time') }}</label>
            <input type="time" class="form-control form-control-solid form-control-lg" name="start_time" 
       
       >
            
        <div class="fv-plugins-message-container"></div></div>
        <div class="form-group fv-plugins-icon-container">
            <label>{{ __('end time') }}</label>
            <input type="time" class="form-control form-control-solid form-control-lg" name="end_time" 
          
            >
            
        <div class="fv-plugins-message-container"></div></div>
        <!--end::Select-->
    </div>
    <!--end: Wizard Step 3-->


                @yield('additional_info_step')

    <!--begin: Wizard Step 4-->
    <div class="pb-5" data-wizard-type="step-content">
        <h4 class="mb-10 font-weight-bold text-dark">{{ __('attach pictures if you want') }}</h4>


    <div class="uppy" id="kt_uppy_1"><div class="uppy-Root" dir="ltr">
        <div class="uppy-Dashboard uppy-Dashboard--animateOpenClose uppy-size--height-md uppy-Dashboard--isInnerWrapVisible" data-uppy-theme="light" data-uppy-num-acquirers="4" data-uppy-drag-drop-supported="true" aria-hidden="false" aria-label="File Uploader"><div class="uppy-Dashboard-overlay" tabindex="-1"></div><div class="uppy-Dashboard-inner" style="width: 750px; height: 470px;"><div class="uppy-Dashboard-innerWrap"><div class="uppy-Dashboard-dropFilesHereHint">{{ __('drop your files here') }}</div><div class="uppy-DashboardContent-bar"><div class=""></div><div class="uppy-DashboardContent-title" role="heading" aria-level="1">{{ __('upload complete') }}</div><button class="uppy-DashboardContent-addMore" type="button" aria-label="{{ __('add more files') }}" title="{{ __('add more files') }}"><svg aria-hidden="true" focusable="false" class="uppy-c-icon" width="15" height="15" viewBox="0 0 15 15"><path d="M8 6.5h6a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8v6a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5V8h-6a.5.5 0 0 1-.5-.5V7a.5.5 0 0 1 .5-.5h6v-6A.5.5 0 0 1 7 0h.5a.5.5 0 0 1 .5.5v6z"></path></svg><span class="uppy-DashboardContent-addMoreCaption">{{ __('add more') }}</span></button></div><div class="uppy-Dashboard-files" role="list"><div role="presentation" style="position: relative; width: 100%; min-height: 100%; height: 71px;"><div role="presentation" style="position: absolute; top: 0px; left: 0px; width: 100%; overflow: visible;"><div role="presentation"><div class="uppy-Dashboard-Item is-complete is-resumable" id="uppy_uppy-tawkelratiba///copy/png-10-1d-10-1e-image/png-14497-1729414349725" role="listitem"><div class="uppy-Dashboard-Item-preview"><div class="uppy-Dashboard-Item-previewInnerWrap" style="background-color: rgb(104, 109, 224);"><a class="uppy-Dashboard-Item-previewLink" href="https://master.tus.io/files/f8a43b0f078e182d9665c0b44cb170d2+3dG.1lJAerundNrtcJ4kImQL7Vp9xcREzSCshCvNqaReTDIHMyX72bkbRHR4cMbsfRrDXhm8PgTWyIiqwjEyQZDjJnbdiJqS0Ht4bkxXMVciq4ZWBHuHTXgnsQmCjKzK" rel="noreferrer noopener" target="_blank" aria-label="tawkelRatiba - Copy.png"></a><div class="uppy-Dashboard-Item-previewIconWrap"><span class="uppy-Dashboard-Item-previewIcon" style="color: rgb(104, 109, 224);"><svg aria-hidden="true" focusable="false" width="25" height="25" viewBox="0 0 25 25"><g fill="#686DE0" fillRule="evenodd"><path d="M5 7v10h15V7H5zm0-1h15a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1z" fillRule="nonzero"></path><path d="M6.35 17.172l4.994-5.026a.5.5 0 0 1 .707 0l2.16 2.16 3.505-3.505a.5.5 0 0 1 .707 0l2.336 2.31-.707.72-1.983-1.97-3.505 3.505a.5.5 0 0 1-.707 0l-2.16-2.159-3.938 3.939-1.409.026z" fillRule="nonzero"></path><circle cx="7.5" cy="9.5" r="1.5"></circle></g></svg></span><svg aria-hidden="true" focusable="false" class="uppy-Dashboard-Item-previewIconBg" width="58" height="76" viewBox="0 0 58 76"><rect fill="#FFF" width="58" height="76" rx="3" fillRule="evenodd"></rect></svg></div></div><div class="uppy-Dashboard-Item-progress"><div class="uppy-Dashboard-Item-progressIndicator"><svg aria-hidden="true" focusable="false" width="70" height="70" viewBox="0 0 36 36" class="uppy-c-icon uppy-Dashboard-Item-progressIcon--circle"><circle r="15" cx="18" cy="18" fill="#1bb240"></circle><polygon class="uppy-Dashboard-Item-progressIcon--check" transform="translate(2, 3)" points="14 22.5 7 15.2457065 8.99985857 13.1732815 14 18.3547104 22.9729883 9 25 11.1005634"></polygon></svg></div></div></div><div class="uppy-Dashboard-Item-fileInfoAndButtons"><div class="uppy-Dashboard-Item-fileInfo" data-uppy-file-source="Dashboard"><div class="uppy-Dashboard-Item-name" title="tawkelRatiba - Copy.png">tawkelRatiba - Copy.png</div><div class="uppy-Dashboard-Item-status"><div class="uppy-Dashboard-Item-statusSize">14 KB</div></div></div><div class="uppy-Dashboard-Item-actionWrapper"><button class="uppy-u-reset uppy-Dashboard-Item-action uppy-Dashboard-Item-action--copyLink" type="button" aria-label="{{ __('copy link') }}" title="{{ __('copy link') }}"><svg aria-hidden="true" focusable="false" class="uppy-c-icon" width="14" height="14" viewBox="0 0 14 12"><path d="M7.94 7.703a2.613 2.613 0 0 1-.626 2.681l-.852.851a2.597 2.597 0 0 1-1.849.766A2.616 2.616 0 0 1 2.764 7.54l.852-.852a2.596 2.596 0 0 1 2.69-.625L5.267 7.099a1.44 1.44 0 0 0-.833.407l-.852.851a1.458 1.458 0 0 0 1.03 2.486c.39 0 .755-.152 1.03-.426l.852-.852c.231-.231.363-.522.406-.824l1.04-1.038zm4.295-5.937A2.596 2.596 0 0 0 10.387 1c-.698 0-1.355.272-1.849.766l-.852.851a2.614 2.614 0 0 0-.624 2.688l1.036-1.036c.041-.304.173-.6.407-.833l.852-.852c.275-.275.64-.426 1.03-.426a1.458 1.458 0 0 1 1.03 2.486l-.852.851a1.442 1.442 0 0 1-.824.406l-1.04 1.04a2.596 2.596 0 0 0 2.683-.628l.851-.85a2.616 2.616 0 0 0 0-3.697zm-6.88 6.883a.577.577 0 0 0 .82 0l3.474-3.474a.579.579 0 1 0-.819-.82L5.355 7.83a.579.579 0 0 0 0 .819z"></path></svg></button></div></div></div></div></div></div></div><div class="uppy-Dashboard-progressindicators"><div class="uppy-StatusBar is-complete"><div class="uppy-StatusBar-progress
                       " role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100" style="width: 100%;"></div><div class="uppy-StatusBar-content" title="Complete" role="status"><div class="uppy-StatusBar-status"><div class="uppy-StatusBar-statusPrimary"><svg aria-hidden="true" focusable="false" class="uppy-StatusBar-statusIndicator uppy-c-icon" width="15" height="11" viewBox="0 0 15 11"><path d="M.414 5.843L1.627 4.63l3.472 3.472L13.202 0l1.212 1.213L5.1 10.528z"></path></svg>{{ __('complete') }}</div></div></div><div class="uppy-StatusBar-actions"><button type="button" class="uppy-u-reset uppy-c-btn uppy-StatusBar-actionBtn uppy-StatusBar-actionBtn--done" data-uppy-super-focusable="true">{{ __('done') }}</button></div></div><div class="uppy uppy-Informer" aria-hidden="true"><p role="alert">{{ __('connection with companion failed') }} <span aria-label="{{ __('error: could not get') }} https://companion.uppy.io/instagram/list/recent. {{ __('error: this looks like a network error, the endpoint might be blocked by an internet provider or a firewall') }}.

Source error: [TypeError: Failed to fetch]" data-microtip-position="top-left" data-microtip-size="medium" role="tooltip">?</span></p></div></div></div></div></div></div></div>


    </div>
    <!--end: Wizard Step 4-->
               
    <!--begin: Wizard Step 4-->
    <div class="pb-5" data-wizard-type="step-content">
        <h4 class="mb-10 font-weight-bold text-dark">{{ __('all inputs are ready to store , please submit the form') }}</h4>

    </div>
    <!--end: Wizard Step 4-->

                <!--begin: Wizard Actions-->
                <div class="d-flex justify-content-between pt-3">
                    <div class="mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder font-size-h6 pl-6 pr-8 py-4 my-3 mr-3" data-wizard-type="action-prev">
                                {{ __('previous') }} 
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-5 pr-8 py-4 my-3" data-wizard-type="action-submit">
                            {{ __('submit') }}
                              </button>

                        <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 pl-8 pr-4 py-4 my-3" data-wizard-type="action-next">
                            {{ __('next step') }}
                              </button>
                    </div>
                </div>
                <!--end: Wizard Actions-->
            <div></div><div></div></form>
        </div>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Wizard 5-->
</div>
<!--end::Card Body-->
</div>
<!--end::Card-->
</div>


@endsection


@push('scripts')
<script>
    routes ={ 'welcome_url' :"/" }
</script>


<!--begin::Page Scripts(used by this page)-->
{{-- <script src="{{asset('assets/js/crisis_management/services/leaflet-maps.js')}}"></script> --}}
   <!--begin::Page Scripts(used by this page)-->
   <script src="{{asset('assets/plugins/custom/uppy/uppy.bundle.js')}}"></script>

<!--end::Page Scripts-->
<script src="{{asset('assets/js/crisis_management/services/educationAndHealth.js')}}"></script>

<!--end::Page Scripts-->
<script src="{{asset('assets/js/crisis_management/contributions/services/wizard-5.js')}}"></script>
@endpush