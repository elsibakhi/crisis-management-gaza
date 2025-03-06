<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale()=="ar") dir="rtl" @else dir="ltr" @endif >
<!--begin::Head-->

<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>@yield('title', __("authentication")) | {{ __(Config('app.name')) }}</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    @php
    $theme=session("theme");
@endphp

    @if (app()->getLocale()=="ar")
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/pages/login/login-1-rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins-rtl.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs-rtl.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style-rtl.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

	<link href="{{ asset('assets/css/pages/login/login-4-rtl.css?v=7.2.9') }}" rel="stylesheet" type="text/css"/>
    
    @else
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/'.$theme.'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/'.$theme.'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/'.$theme.'.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/'.$theme.'.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

	<link href="{{ asset('assets/css/pages/login/login-4.css?v=7.2.9') }}" rel="stylesheet" type="text/css"/>
    
    
        @endif


        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            </style>


    @stack('styles')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled
        subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable
        page-loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row
                flex-column-fluid wizard"
            id="kt_login">
            <!--begin::Content-->
            <div
                class="login-container d-flex flex-center flex-row
                    flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white
                    py-lg-0 pb-lg-0 pt-15 pb-12">
                <!--begin::Container-->
                <div class="login-content login-content-signup d-flex
                        flex-column">
                    <!--begin::Aside Top-->
                    <div class="d-flex flex-column-auto flex-column  py-10 ">
   
						

                    </div>
                    <!--end::Aside Top-->
                    <!--begin::Signin-->
                    <div class="login-form">
                        <!--begin::Form-->
                       @yield('form')
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Container-->
            </div>
            <!--begin::Content-->
            <!--begin::Aside-->
            <div
                class="login-aside bg-white
                                                                                order-1
                                                                                order-lg-2
                                                                                bgi-no-repeat
                                                                                bgi-position-x-right">
                <div class="login-conteiner
                                                                                    bgi-no-repeat
                                                                                    bgi-position-x-center
                                                                                    bgi-position-y-center"
                    style="background-image:
                                                                                    url({{ asset('images/logo/full-dark.png') }});
                                                                                    background-color: #181c32;">
                    <!--begin::Aside title-->
           
                    <!--end::Aside title-->
                </div>
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    @include('lang/language')
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
	<script>
		let routes = {
		login_url: "{{ route('login') }}",
		
		home_url : "{{ route('dashboard') }}",
	}	

  

     
		</script>
	
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.9') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js?v=7.2.9') }}"></script>
    {{-- <script src="https://keenthemes.com/metronic/assets/js/engage_code.js"></script> --}}
	<script src="{{ asset('assets/js/pages/custom/login/login-4.js?v=7.2.9') }}"></script>

	@stack('scripts')
    <!--end::Global Theme Bundle-->

</body>
<!--end::Body-->

</html>
