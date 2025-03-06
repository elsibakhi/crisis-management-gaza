<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{ route('dashboard') }}" class="brand-logo">

            <img src="{{ asset('images/logo/'.session("theme").'.png') }}" class="max-h-35px" style="transform: scale(2)"  alt="Logo" />
            
            
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
              
                <li class="menu-item   @if (request()->route()->getName()=='dashboard')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,19 C22,19.5522847 21.5522847,20 21,20 L3,20 C2.44771525,20 2,19.5522847 2,19 L2,5 C2,4.44771525 2.44771525,4 3,4 Z" fill="#000000" opacity="0.1"/>
                                <rect x="6" y="10" width="2" height="6" fill="#000000" rx="1"/>
                                <rect x="10" y="8" width="2" height="8" fill="#000000" rx="1"/>
                                <rect x="14" y="6" width="2" height="10" fill="#000000" rx="1"/>
                                <rect x="18" y="12" width="2" height="4" fill="#000000" rx="1"/>
                            </g>
                        </svg>
                        
                        </span>
                        
                        <span class="menu-text">{{__("dashboard")}}</span>
                    </a>
                </li>

          




                <li class="menu-section">
                    <h4 class="menu-text">{{__("general")}}</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>


 @can([
       'view service contributions',
       'view link contributions',
     ])
               
                <li class="menu-item menu-item-submenu @if (request()->route()->getName()=='admin.contribution.service.index'||request()->route()->getName()=='admin.contribution.link.index')
               menu-item-open menu-item-here
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Expand-arrows.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            
                                <defs/>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                            
                            
                            </span>
                          </span>
                        <span class="menu-text">{{__('contributions')}}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            
                      
    @can([
                      'view service contributions',
                       ])
                            <li class="menu-item menu-item-submenu   @if (request()->route()->getName()=='admin.contribution.service.index')
                menu-item-active
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                             
                          
                                <a href="{{route('admin.contribution.service.index')}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                      <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon-->
                                        
                                        
                                        
                                    </span>
                                    
                                    
                                    
                                    <span class="menu-text">{{__('services')}}</span>
                                </a>

                            </li>

                          @endcan
                          
                          @can([
                           'view link contributions',
                              ])
                            <li class="menu-item menu-item-submenu   @if (request()->route()->getName()=='admin.contribution.link.index')
                menu-item-active
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                      
                         
                                <a href="{{route('admin.contribution.link.index')}}" class="menu-link">
                                

                                    <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Clip.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     
                                        <defs/>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) "/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    
                                    
                                    <span class="menu-text">{{__('links')}}</span>
                                </a>

                            </li>
                           

@endcan



                        </ul>
                    </div>
                </li>
@endcan
@cannot([
    'view institutions',
  
    'changing the enrollment status of institutions',
  ])

@can('communication with institutions')

          <li class="menu-item menu-item-submenu   @if (request()->getUri()==route('institution.index',["type"=>"institutions"]))
menu-item-active
@endif" aria-haspopup="true" data-menu-toggle="hover">
           
        
              <a href="{{route('institution.index',["type"=>"institutions"])}}" class="menu-link">
                  <span class="svg-icon menu-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <!-- رمز المبنى الذي يمثل المؤسسات -->
                              <path d="M3,2 L3,22 L21,22 L21,2 L3,2 Z M4,3 L4,21 L20,21 L20,3 L4,3 Z" fill="#4CAF50"/>
                              <path d="M7,6 L7,9 L17,9 L17,6 L7,6 Z" fill="#4CAF50"/>
                              <path d="M7,11 L7,14 L17,14 L17,11 L7,11 Z" fill="#4CAF50"/>
                              <path d="M7,16 L7,19 L17,19 L17,16 L7,16 Z" fill="#4CAF50"/>
                          </g>
                      </svg>
                      
                  </span>
                  <span class="menu-text">{{__('institutions')}}</span>
              </a>

          </li>

        
@endcan
    
@endcannot

 @can([
       'view institutions',
     
       'changing the enrollment status of institutions',
     ])
               
                <li class="menu-item menu-item-submenu @if (request()->getUri()==route('institution.index',["type"=>"enrollments"])||request()->getUri()==route('institution.index',["type"=>"institutions"]))
                  menu-item-open menu-item-here
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                
                        
                        
<span class="svg-icon menu-icon">
    <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Expand-arrows.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    
        <defs/>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon points="0 0 24 0 24 24 0 24"/>
            <path d="M10.5857864,12 L5.46446609,6.87867966 C5.0739418,6.48815536 5.0739418,5.85499039 5.46446609,5.46446609 C5.85499039,5.0739418 6.48815536,5.0739418 6.87867966,5.46446609 L12,10.5857864 L18.1923882,4.39339828 C18.5829124,4.00287399 19.2160774,4.00287399 19.6066017,4.39339828 C19.997126,4.78392257 19.997126,5.41708755 19.6066017,5.80761184 L13.4142136,12 L19.6066017,18.1923882 C19.997126,18.5829124 19.997126,19.2160774 19.6066017,19.6066017 C19.2160774,19.997126 18.5829124,19.997126 18.1923882,19.6066017 L12,13.4142136 L6.87867966,18.5355339 C6.48815536,18.9260582 5.85499039,18.9260582 5.46446609,18.5355339 C5.0739418,18.1450096 5.0739418,17.5118446 5.46446609,17.1213203 L10.5857864,12 Z" fill="#000000" opacity="0.3" transform="translate(12.535534, 12.000000) rotate(-360.000000) translate(-12.535534, -12.000000) "/>
            <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
        </g>
    </svg><!--end::Svg Icon-->
    
    
    </span>
  </span>          
                        
                        
                        
                        
                        
                        
                        <span class="menu-text">{{__('institutions')}}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">

                            
                       
    @can([
                      'view institutions',
                      
                       ])
                            <li class="menu-item menu-item-submenu   @if (request()->getUri()==route('institution.index',["type"=>"institutions"]))
                menu-item-active
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                             
                          
                                <a href="{{route('institution.index',["type"=>"institutions"])}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <!-- رمز المبنى الذي يمثل المؤسسات -->
                                                <path d="M3,2 L3,22 L21,22 L21,2 L3,2 Z M4,3 L4,21 L20,21 L20,3 L4,3 Z" fill="#4CAF50"/>
                                                <path d="M7,6 L7,9 L17,9 L17,6 L7,6 Z" fill="#4CAF50"/>
                                                <path d="M7,11 L7,14 L17,14 L17,11 L7,11 Z" fill="#4CAF50"/>
                                                <path d="M7,16 L7,19 L17,19 L17,16 L7,16 Z" fill="#4CAF50"/>
                                            </g>
                                        </svg>
                                        
                                    </span>
                                    <span class="menu-text">{{__('institutions')}}</span>
                                </a>

                            </li>

                          @endcan
                          
                          @can([
                           'changing the enrollment status of institutions',
                              ])
                            <li class="menu-item menu-item-submenu   @if (request()->getUri()==route('institution.index',["type"=>"enrollments"]))
                menu-item-active
                @endif" aria-haspopup="true" data-menu-toggle="hover">
                      
                         
                                <a href="{{route('institution.index',["type"=>"enrollments"])}}" class="menu-link">
                                    <span class="svg-icon menu-icon">
<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon-->
                                        
                                        
                                        
                                    </span>
                                    <span class="menu-text">{{__('enrollments')}}</span>
                                </a>

                            </li>
                           

@endcan



                        </ul>
                    </div>
                </li>
@endcan





                @can([
                'view admins',
            
                ])
                    
                
                <li class="menu-item   @if (request()->route()->getName()=='admin.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('admin.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
   
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        
                        
                        <span class="menu-text">{{__('admins')}}</span>
                    </a>
                </li>
            
                @endcan
  
                

                @can([
                     'view services',
                       ])
                <li class="menu-item   @if (request()->route()->getName()=='service.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('service.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('services')}}</span>
                    </a>
                </li>
                @endcan
                @can([
                      'view links',
                      ])
                <li class="menu-item   @if (request()->route()->getName()=='link.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('link.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Clip.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                     
                            <defs/>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) "/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <span class="menu-text">{{__('links')}}</span>
                    </a>
                </li>
 @endcan

               



@can([
'view notes',
  ])
                <li class="menu-item   @if (request()->route()->getName()=='admin.note.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('admin.note.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                       <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Write.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
   
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953) "/>
        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('notes')}}</span>
                    </a>
                </li>

@endcan

@can([
      'view complaints',
  ])
                <li class="menu-item   @if (request()->route()->getName()=='admin.complaint.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('admin.complaint.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                     <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Sad.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10"/>
        <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" transform="translate(12.000000, 15.499947) scale(1, -1) translate(-12.000000, -15.499947) "/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('complaints')}}</span>
                    </a>
                </li>
@endcan

@can([
     'view opinions',
  ])

                <li class="menu-item   @if (request()->route()->getName()=='admin.opinion.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('admin.opinion.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
 
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('opinions')}}</span>
                    </a>
                </li>

@endcan

@can([
  'view news',
  ])
                <li class="menu-item   @if (request()->route()->getName()=='news.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('news.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                      <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Binocular.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
   
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M12.8434797,16 L11.1565203,16 L10.9852159,16.6393167 C10.3352654,19.064965 7.84199997,20.5044524 5.41635172,19.8545019 C2.99070348,19.2045514 1.55121603,16.711286 2.20116652,14.2856378 L3.92086709,7.86762789 C4.57081758,5.44197964 7.06408298,4.00249219 9.48973122,4.65244268 C10.5421727,4.93444352 11.4089671,5.56345262 12,6.38338695 C12.5910329,5.56345262 13.4578273,4.93444352 14.5102688,4.65244268 C16.935917,4.00249219 19.4291824,5.44197964 20.0791329,7.86762789 L21.7988335,14.2856378 C22.448784,16.711286 21.0092965,19.2045514 18.5836483,19.8545019 C16.158,20.5044524 13.6647346,19.064965 13.0147841,16.6393167 L12.8434797,16 Z M17.4563502,18.1051865 C18.9630797,18.1051865 20.1845253,16.8377967 20.1845253,15.2743923 C20.1845253,13.7109878 18.9630797,12.4435981 17.4563502,12.4435981 C15.9496207,12.4435981 14.7281751,13.7109878 14.7281751,15.2743923 C14.7281751,16.8377967 15.9496207,18.1051865 17.4563502,18.1051865 Z M6.54364977,18.1051865 C8.05037928,18.1051865 9.27182488,16.8377967 9.27182488,15.2743923 C9.27182488,13.7109878 8.05037928,12.4435981 6.54364977,12.4435981 C5.03692026,12.4435981 3.81547465,13.7109878 3.81547465,15.2743923 C3.81547465,16.8377967 5.03692026,18.1051865 6.54364977,18.1051865 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('news')}}</span>
                    </a>
                </li>

                @endcan

        
                <li class="menu-item   @if (request()->route()->getName()=='institution.admins.index')
                menu-item-active
                @endif" aria-haspopup="true">
                    <a href="{{route('institution.admins.index')}}" class="menu-link">
                        <span class="svg-icon menu-icon">
                      <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    
    <defs/>
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">{{__('contact with admins')}}</span>
                    </a>
                </li>
              
        
              
             




     












            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
