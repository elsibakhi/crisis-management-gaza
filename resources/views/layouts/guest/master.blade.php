<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale()=="ar") dir="rtl" @else dir="ltr" @endif >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
     
        
        <link rel="stylesheet" href="{{asset('assets/css/crisis_management/welcome/normalize.css')}}">
        <!--Font Awsome-->
        <link rel="stylesheet" href="{{asset('assets/css/crisis_management/welcome/all.min.css')}}">
        <!--Main Css File-->
        <link rel="stylesheet" href="{{asset('assets/css/crisis_management/welcome/index.css')}}">
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href=
    "https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&
    family=Open+Sans:wght@400;600;700;800&family=Branches+Sans:wght@200;300;400;600;700;800&display=swap"
     rel="stylesheet">
     <link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>
     <link href="{{asset('assets/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css"/>
     @include('layouts.guest.head')


<style>
    .fa-star{
        color: #b5b2acce;
        transition-duration: 0.5s
    }
    .fa-star.checked{
        color: #ffc107;
    }

</style>

         @stack('style')
  
    </head>
    @php
    $dummyUser = \App\Models\DummyUser::find(\Illuminate\Support\Facades\Cookie::get("dummy_user_id"));
    @endphp

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed">
  
  
    @include('dummyUser.opinions.modal')
    @include('dummyUser.location.modal')
    @include('dummyUser.modal')
    <!--begin::Main-->

    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                
                          
                @include('layouts.guest.header')

                    
  
                <div class="content d-flex flex-column w-100 flex-column-fluid" id="kt_content">
                        <!--begin::Container-->
                        <div class="container w-100">
                            <div class="row w-100" >

                       


                                @yield('content')
                            </div>
                        </div>
                        <!--end::Container-->


                </div>
            </div>
            <!--end::Wrapper-->

            @include('admin.institutions.modal',["action"=>route('institution.enrollment.store')])
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->










    <!--begin::Quick Panel-->
    <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
        <!--begin::Header-->
        <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5"
            kt-hidden-height="45" style="">
            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-4x nav-tabs-primary flex-grow-1 px-5 flex-nowrap"
                role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"
                        href="#kt_quick_panel_general">{{__("general")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-toggle="tab"
                        href="#kt_quick_panel_contributions">{{__("contributions")}}</a>
                </li>
                
            
                
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab"
                                        href="#kt_quick_panel_institution">{{__("institutions")}}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab"
                                    href="#kt_quick_panel_notifications">{{__("notifications")}} 
                                    <span  class=" label  bg-light-primary pulse pulse-primary mr-10">
                                        <span id="notification_pulse" class="position-relative">{{$dummyUser?->unreadNotifications()->count()??0}}</span>
                                        <span class="pulse-ring"></span>
                                    </span></a>
                                    
                                </li>
            
            </ul>
            <div class="offcanvas-close mt-n1 pr-5" style="transform:translateY(50px)" >
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Content-->
        <div class="offcanvas-content px-10">
            <div class="tab-content">

                <!--begin::Tabpane-->
                <div class="tab-pane fade active show  pt-2 pr-5 mr-n5 scroll ps"
                    id="kt_quick_panel_general" role="tabpanel" style="">
                 
                 
                    <div class=" accordion accordion-light   accordion-toggle-arrow"  style="transform: scale(0.9)" id="accordionExample5">
                        <div class="card ">
                            <div class="card-header " id="headingOne5">
                                <div class="card-title  collapsed " data-toggle="collapse" data-target="#collapseOne5">
                                    <i class="flaticon-pie-chart-1"></i> {{__("food services")}}
                                </div>
                            </div>
                            <div id="collapseOne5" class="collapse " data-parent="#accordionExample5">
                                <div class="card-body">
                                    <ul class="navi">
                  


                     
                                       
                                        <li class="navi-item text-hover-info">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'food_parcel'])}}">
                                                <span class="navi-icon"><i class="fas fa-box-open"></i></span>
                                                <span class="navi-text">{{__("food parcel")}}</span>
                                               
                                            </a>
                                        </li>
                                        
                                        <li class="navi-item text-hover-warning">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'cooking'])}}">
                                                <span class="navi-icon"><i class="fas fa-utensils"></i></span>
                                                <span class="navi-text">{{__("cooking")}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item text-hover-dark">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'flour'])}}">
                                                <span class="navi-icon"><i class="fas fa-bread-slice"></i></span>
                                                <span class="navi-text">{{__("flour")}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item text-hover-primary">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'gas'])}}">
                                                <span class="navi-icon"><i class="fas fa-gas-pump"></i></span>
                                                <span class="navi-text">{{__("gas")}}</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo5">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo5">
                                    <i class="flaticon2-notification"></i> {{__("education services")}}
                                </div>
                            </div>
                            <div id="collapseTwo5" class="collapse" data-parent="#accordionExample5">
                                <div class="card-body">
                                    <ul class="navi">
                                        <li class="navi-item text-hover-dark">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'education','service_sub_type'=>'free'])}}">
                                                <span class="navi-icon"><i class="fas fa-gift"></i></span>
                                                <span class="navi-text">{{__("free")}}</span>
                                            </a>
                                        </li>

                                        <li class="navi-item text-hover-success">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'education','service_sub_type'=>'charged'])}}">
                                                <span class="navi-icon"><i class="fas fa-money-bill"></i></span>
                                                <span class="navi-text">{{__("charged")}}</span>
                                               
                                            </a>
                                        </li>
                                        
                                 
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree5">
                                <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseThree5">
                                    <i class="flaticon2-chart"></i> {{__("health services")}}
                                </div>
                            </div>
                            <div id="collapseThree5" class="collapse" data-parent="#accordionExample5">
                                <div class="card-body">
                                    <ul class="navi">
                                        


                                        <li class="navi-item text-hover-dark">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'hospital'])}}">
                                                <span class="navi-icon"><i class="fas fa-hospital"></i></span>
                                                <span class="navi-text">{{__("hospital")}}</span>
                                               
                                            </a>
                                        </li>
                                        
                                        <li class="navi-item text-hover-warning">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'medical_point'])}}">
                                                <span class="navi-icon"><i class="fas fa-first-aid"></i></span>
                                                <span class="navi-text">{{__("medical point")}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item text-hover-primary">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'clinic'])}}">
                                                <span class="navi-icon"><i class="fas fa-stethoscope"></i></span>
                                                <span class="navi-text">{{__("clinic")}}</span>
                                            </a>
                                        </li>
                                        <li class="navi-item text-hover-success">
                                            <a class="navi-link" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'pharmacy'])}}">
                                                <span class="navi-icon"><i class="fas fa-capsules"></i></span>
                                                <span class="navi-text">{{__("pharmacy")}}</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="navi  ">
                  


                     
                        <li class="navi-separator my-4"></li>
                        <li class="navi-item">
                            <a class="navi-link text-hover-dark" href="{{route('dummyUser.link.index')}}">
                                <span class="navi-icon "><i class="fas fa-link"></i></span>
                                <span class="navi-text">{{__("links")}}</span>
                               
                            </a>
                        </li>
                        <li class="navi-separator my-4"></li>
                        <li class="navi-item text-hover-info">
                            <a class="navi-link" href="{{route('dummyUser.news.index')}}">
                                <span class="navi-icon "><i class="far fa-newspaper"></i></span>
                                <span class="navi-text">{{__("news")}}</span>
                            </a>
                        </li>
                       
                    </ul>

                
                </div>
                <!--end::Tabpane-->

           <!--begin::Tabpane-->
           <div class="tab-pane fade  show  pt-2 pr-5 mr-n5 scroll ps"
           id="kt_quick_panel_contributions" role="tabpanel" style="">
        
        
    

           <ul class="navi  ">
         
            <li class="navi-item">
                <a class="navi-link text-hover-dark" href="{{ route('contribution.service.food.create') }}">
                    <span class="navi-icon ">                <span
                        class="svg-icon "><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <title>{{__("food")}}</title>
                            <desc>Created with Sketch.</desc>
                            <defs />
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M3.98842709,3.05999994 L11.0594949,10.1310678 L8.23106778,12.9594949 L3.98842709,8.71685419 C2.42632992,7.15475703 2.42632992,4.62209711 3.98842709,3.05999994 Z"
                                    fill="#000000" />
                                <path
                                    d="M17.7539614,3.90710683 L14.8885998,7.40921548 C14.7088587,7.62889898 14.7248259,7.94903916 14.9255342,8.14974752 C15.1262426,8.35045587 15.4463828,8.36642306 15.6660663,8.18668201 L19.1681749,5.32132039 L19.8752817,6.02842717 L17.0099201,9.53053582 C16.830179,9.75021933 16.8461462,10.0703595 17.0468546,10.2710679 C17.2475629,10.4717762 17.5677031,10.4877434 17.7873866,10.3080024 L21.2894953,7.44264073 L21.9966021,8.14974752 L18.8146215,11.331728 C17.4477865,12.6985631 15.2317091,12.6985631 13.8648741,11.331728 C12.4980391,9.96489301 12.4980391,7.74881558 13.8648741,6.38198056 L17.0468546,3.20000005 L17.7539614,3.90710683 Z"
                                    fill="#000000" />
                                <path
                                    d="M11.0753788,13.9246212 C11.4715437,14.3207861 11.4876245,14.9579589 11.1119478,15.3736034 L6.14184561,20.8724683 C5.61370242,21.4567999 4.71186338,21.5023497 4.12753173,20.9742065 C4.10973311,20.9581194 4.09234327,20.9415857 4.0753788,20.9246212 C3.51843234,20.3676747 3.51843234,19.4646861 4.0753788,18.9077397 C4.09234327,18.8907752 4.10973311,18.8742415 4.12753173,18.8581544 L9.62639662,13.8880522 C10.0420411,13.5123755 10.6792139,13.5284563 11.0753788,13.9246212 Z"
                                    fill="#000000" opacity="0.3" />
                                <path
                                    d="M13.0754022,13.9246212 C13.4715671,13.5284563 14.1087399,13.5123755 14.5243844,13.8880522 L20.0232493,18.8581544 C20.0410479,18.8742415 20.0584377,18.8907752 20.0754022,18.9077397 C20.6323487,19.4646861 20.6323487,20.3676747 20.0754022,20.9246212 C20.0584377,20.9415857 20.0410479,20.9581194 20.0232493,20.9742065 C19.4389176,21.5023497 18.5370786,21.4567999 18.0089354,20.8724683 L13.0388332,15.3736034 C12.6631565,14.9579589 12.6792373,14.3207861 13.0754022,13.9246212 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg><!--end::Svg Icon--></span></span>
                    <span class="navi-text">{{__("food service")}}</span>
                   
                </a>
            </li>
            <li class="navi-item">
                <a class="navi-link text-hover-dark" href="{{ route('contribution.service.education.create') }}">
                    <span class="navi-icon ">                <span
                        class="svg-icon "><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <title>{{__("education")}}</title>
                            <desc>Created with Sketch.</desc>
                            <defs />
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
                                    fill="#000000" />
                                <path
                                    d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg><!--end::Svg Icon--></span></span>
                    <span class="navi-text">{{__("education service")}}</span>
                   
                </a>
            </li>
            <li class="navi-item">
                <a class="navi-link text-hover-dark" href="{{ route('contribution.service.health.create') }}">
                    <span class="navi-icon "><i class="flaticon-black"></i></span>
                    <span class="navi-text">{{__("health service")}}</span>
                   
                </a>
            </li>

            
               <li class="navi-separator my-4"></li>
               <li class="navi-item">
                   <a class="navi-link text-hover-dark" href="{{ route('contribution.link.create') }}">
                       <span class="navi-icon "><i class="flaticon-interface"></i></span>
                       <span class="navi-text">{{__("link")}}</span>
                      
                   </a>
               </li>
     
              
           </ul>

       
       </div>
       <!--end::Tabpane-->


                <!--begin::Tabpane-->
                <div class="tab-pane fade pt-3 pr-5 mr-n5 scroll ps"
                    id="kt_quick_panel_notifications" role="tabpanel" style="height: 303px; overflow: hidden;">
                    <!--begin::Nav-->
                    <div id="pane_notifications_contributionAcceptance" class="navi navi-icon-circle navi-spacer-x-0">
              
                        @include('components.notification.dummyUser.contributionNotifications')
                     
                    </div>
                    <!--end::Nav-->
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
                <!--end::Tabpane-->
                <!--begin::Tabpane-->
                <div class="tab-pane fade pt-3 pr-5 mr-n5 scroll ps"
                    id="kt_quick_panel_institution" role="tabpanel" style="height: 303px; overflow: hidden; cursor: pointer;">
                    <ul class="navi  ">
                  


                     
                        
                        <li class="navi-item">
                            <span class="navi-link text-hover-primary"  data-toggle="modal" data-target="#Institutions">
                                <span class="navi-icon "><i class="fas fa-user-plus"></i></span>
                                <span class="navi-text">{{__("enrollment as an institution")}}</span>
                               
                            </span>
                        </li>

                       
                    </ul>
                </div>
                <!--end::Tabpane-->

               
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Quick Panel-->



    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span
            class="svg-icon"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <title>Stockholm-icons / Navigation / Up-2</title>
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1">
                    </rect>
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero"></path>
                </g>
            </svg><!--end::Svg Icon--></span>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Sticky Toolbar-->
    <ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
 

        <!--begin::Item-->
        <li class="nav-item mb-2" data-toggle="tooltip" title="" data-placement="left"
            data-original-title="{{__('rate the site')}}">
            <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning"
                data-toggle="modal" data-target="#opinionsModal">
                <i class="far fa-star"></i>
            </button>

        </li>
        <!--end::Item-->


    </ul>
    <!--end::Sticky Toolbar-->


    <footer>
        <div class="contener">
            <div class="box d-flex justify-content-around mb-15">
                <h3 class=""> <a href="{{ route('dashboard') }}"  >
                    <img src="{{ asset('images/logo/full-dark.png') }}" class="max-h-100px" style="transform: scale(2)"   alt="Logo" />
                </a></h3>
       
                <p>{{__("We hope you liked the tour on our site, and We hope you will repeat it again")}}
                    </p>
            </div>


        </div>
        <p class="end"> &copy;{{now()->year}} {{__(config("app.name"))}}</p>
    </footer>






    <!--begin::Page Scripts-->
    @include('layouts.admin.script')


                       <!--end::Demo Panel-->
    <script>
        let checkDummyUserRoute = "{{ route('dummyUser.check') }}"
        let type="Create";
    </script>
 
 <script src="{{asset('assets/js/crisis_management/institutions/wizard-1.js')}}"></script>
 <script src="{{asset('assets/js/crisis_management/actions/submit-search-form.js')}}"></script>
 <script src="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.js')}}"></script>
 <!--end::Page Vendors-->
 
 <script>
     window.page="Create";
  
 </script>
 
     <!--begin::Page Scripts(used by this page)-->
     <script src="{{asset('assets/js/crisis_management/services/leaflet-maps.js')}}"></script>
     <!--end::Page Scripts-->

     
 @vite('resources/js/dummyUserNotifications.js')



</body>
</html>