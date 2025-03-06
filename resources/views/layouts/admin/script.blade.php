<!--end::Demo Panel-->

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

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script> --}}
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script src="{{ asset('assets/js/jquery.toaster.js') }}"></script>
<script src="{{ asset('assets/js/pages/features/miscellaneous/toastr.js?v=7.2.9') }}"></script>

<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/jstree/jstree.bundle.js?v=7.0.3') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/features/miscellaneous/treeview.js?v=7.0.3') }}"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

{{-- <script src="{{ asset('assets/js/pages/pusher-notifications.js') }}"></script> --}}
<!--end::Page Scripts-->
<script>
    function toaster(title, message, type) {
        //success info warning danger
        $.toaster({
            priority: type,
            title: title,
            message: message
        });
    }
</script>
@if(session('success'))
    <script>
        toastr.success('{{__("success")}}', '{{ session("success") }}', {
            timeOut: 3000
        });
    </script>
@endif

<script>
    let jsroutes = {
        'admin_userBookings_index': ""
    };
    let userID = '{{ Auth::id() }}';
</script>
@auth

    @vite('resources/js/notifications.js')
  
@endauth

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    var language="{{app()->getLocale()}}";
    var theme="{{session('theme')}}";
</script>

<script src="{{asset('assets/js/crisis_management/message/bootstrap-notify.js')}}"></script>

@stack('scripts')


<script src="{{asset('assets/js/crisis_management/actions/scripts.js')}}"></script>

