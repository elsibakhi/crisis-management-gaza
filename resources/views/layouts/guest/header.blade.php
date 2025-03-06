            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Logo-->
                        <div class="header-logo">
                            <a href="{{ route('dashboard') }}" class="brand-logo" >
                                <img src="{{ asset('images/logo/'.session("theme").'.png') }}" class="max-h-35px" style="transform: scale(2)"  alt="Logo" />
                            </a>
                        </div>
                        <!--end::Header Logo-->

                    </div>
                    <!--end::Header Menu Wrapper-->

                    <!--begin::Topbar-->
                    <div class="topbar">
                        <!--begin::Search-->
                        <div class="dropdown" id="kt_quick_search_toggle">
                            <!--begin::Toggle-->
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                                    <span
                                        class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / General / Search</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                </div>
                            </div>
                            <!--end::Toggle-->

                            <!--begin::Dropdown-->
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                    <!--begin:Form-->
                                    <form id="search-form" method="get" class="quick-search-form"  action="{{route('dashboard')}}">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span
                                                        class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Search.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            width="24px" height="24px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <title>Stockholm-icons / General / Search</title>
                                                            <desc>Created with Sketch.</desc>
                                                            <defs></defs>
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24">
                                                                </rect>
                                                                <path
                                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    opacity="0.3"></path>
                                                                <path
                                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span> </span>
                                            </div>
                                            <input id="search_input" name="search" type="text" class="form-control" placeholder="{{__('Search...')}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i
                                                        class="quick-search-close ki ki-close icon-sm text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                     
                                    </form>
                                    <!--end::Form-->

                                    <!--begin::Scroll-->
                                    <div class="quick-search-wrapper scroll ps" data-scroll="true" data-height="325"
                                        data-mobile-height="200" style="height: 325px; overflow: hidden;">
                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0"
                                                style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0"
                                                style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Search-->

       



                     

                        <!--begin::Quick panel-->
                        <div class="topbar-item">


                            <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">

                                <div class="d-flex align-items-center">
                    
                                    <button type="button" class="icon-button bg-transparent">
                                        <span
                                        class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Layout / Layout-4-blocks</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" x="4" y="4" width="7" height="7"
                                                    rx="1.5"></rect>
                                                <path
                                                    d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    
                                     
                                    </span>
                                                            <span id="notification_badge" class="icon-button__badge " style="transform: scale(0.7); background-color: rgb(22, 178, 206)">{{$dummyUser?->unreadNotifications()->count()??0}}</span>
                                                            <span class="pulse-ring"></span>
                    
                                    </button>
                                </div>
                               
                                    
                            </div>
                        </div>
                        <!--end::Quick panel-->



              
                        <!--begin::Languages-->
                        <div class="dropdown">
                            <!--begin::Toggle-->
                            <div class="topbar-item"  data-offset="10px,0px">
                                <a href="{{route("login")}}">

                                    <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Door-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>{{__("sign in")}}</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs/>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect opacity="0.300000012" x="0" y="0" width="24" height="24"/>
                                                <polygon fill="#000000" fill-rule="nonzero" opacity="0.3" points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684"/>
                                                <path d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>

                                </a>
                            </div>
                            <!--end::Toggle-->

             
                        </div>
                        <!--end::Languages-->


                    </div>
                    <!--end::Topbar-->



                    @include("layouts.guest.mobile-header")


                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->