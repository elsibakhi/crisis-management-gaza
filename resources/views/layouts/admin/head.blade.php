
<head>
    <base href="">
    <meta charset="utf-8"/>
  
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title', __("dashboard")) | {{ __(Config('app.name')) }}</title>
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->

    <!--end::Page Vendors Styles-->
    <link rel="stylesheet" href="{{asset('assets/css/crisis_management/admin/index.css')}}">
   
    @php
    $theme=session("theme");
@endphp

    @if (app()->getLocale()=="ar")

    
    <link href="{{ asset('assets/css/crisis_management/message/typing-rtl.css') }}" rel="stylesheet" type="text/css"/>
   
    <link href="{{ asset('assets/plugins/global/plugins-rtl.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs-rtl.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style-rtl.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
  
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/header/menu/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/brand/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/aside/'.$theme.'-rtl.css') }}" rel="stylesheet" type="text/css"/>
   
   
    @else
   
   
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/css/themes/layout/header/base/'.$theme.'.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/header/menu/'.$theme.'.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/brand/'.$theme.'.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/themes/layout/aside/'.$theme.'.css') }}" rel="stylesheet" type="text/css"/>
        {{-- message typing --}}
        <link href="{{ asset('assets/css/crisis_management/message/typing.css') }}" rel="stylesheet" type="text/css"/>   
  
  
  
        @endif


   



    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          
        }
      

        .icon-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            color: #333333;
            background: #ffffff;
            border: none;
            outline: none;
            border-radius: 50%;
            }

        .icon-button:hover {
            cursor: pointer;
            }

        .icon-button:active {
            background: #cccccc;
            }

        .icon-button__badge {
            position: absolute;
            top: -7px;
            right: -3px;
            width: 20px;
            height: 20px;
            background: red;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            }
            .fa-star {
            
            cursor: pointer;
            color: lightgray; /* Default color */
        }
        .fa-star.checked {
            color: orange; /* Color when checked */
        }
            .leaflet-control-attribution{
                display:none;
            }

            a[href="http://www.amcharts.com"] {
                display:none !important;
              
            }
        

    </style>
    @stack('style')

</head>


       

       