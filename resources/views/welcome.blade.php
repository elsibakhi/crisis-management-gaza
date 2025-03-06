@extends('layouts.guest.master')



@section('content')
    <!-- Start Landing -->

    <section id="landing" class="landing">
        <div class="contener ">
            <div class="text">
                <h1> {{__("welcome to")}} {{__(config('app.name')." website")}} </h1>
                <p>
                    {{__("your trusted companion in navigating essential services during challenging times.access vital resources, including food, education, and healthcare services, all at your fingertips. stay informed with the latest news and helpful links designed to support you and your community.together, we overcome")}}</p>



            </div>
            <div class="imge">
                <img src="{{asset('images/landing.png')}}" alt="">
            </div>

        </div>



  


    </section>




    <section id="Food-sec" class="Sweets">
        <div class="dots dots-up"></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title"><span data-title-main="{{__("food services")}}">{{__("food services")}}</span> </h2>
        <div class="row justify-content-center ">


            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("cooking")}} <i class="fas fa-utensils fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('cooking')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'cooking'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100 " id="cooking-section">

                  


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("food parcel")}} <i class="fas fa-box-open fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('food_parcel')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                        >
                        <i class="ki ki-reload icon-nm"></i>

                    </span>
                    <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'food_parcel'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                        >
                        <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="food_parcel-section">
                  


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("flour")}} <i class="fas fa-bread-slice fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('flour')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a  title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'flour'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="flour-section">

                 


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("gas")}} <i class="fas fa-gas-pump fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('gas')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                        >
                        <i class="ki ki-reload icon-nm"></i>
                    </span>

                    <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'food','service_sub_type'=>'gas'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="gas-section">
                  


                </div>
            </div>


        </div>



    </section>





    <!--Start Sweets Plans -->

    <section id="Health-sec" class="Sweets">
        <div class="dots dots-up"></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title"><span data-title-main="{{__("health services")}}">{{__("health services")}}</span> </h2>
        <div class="row justify-content-center">


            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__("clinic")}}  <i class="fas fa-utensils fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('clinic')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                        >
                        <i class="ki ki-reload icon-nm"></i>
                    </span>

                    <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'clinic'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="clinic-section">

                  


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("hospital")}} <i class="fas fa-box-open fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('hospital')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                        >
                        <i class="ki ki-reload icon-nm"></i>
                    </span>

                    <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'hospital'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>

                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="hospital-section">
                 


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("medical point")}} <i class="fas fa-bread-slice fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('medical_point')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                        >
                        <i class="ki ki-reload icon-nm"></i>
                    </span>
                    <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'medical_point'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="medical_point-section">

                   


                </div>
            </div>
            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("pharmacy")}} <i class="fas fa-gas-pump fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('pharmacy')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'health','service_sub_type'=>'pharmacy'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="pharmacy-section">
                   


                </div>
            </div>


        </div>



    </section>




    <!--Start Sweets Plans -->

    <section id="Education-sec" class="Sweets w-100">
        <div class="dots dots-up"></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title"><span data-title-main="{{__("education services")}}">{{__("education services")}}</span> </h2>
        <div class="row justify-content-center">


            <div class="card card-custom col-10 m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("free")}} <i class="fas fa-utensils fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('free')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'education','service_sub_type'=>'free'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="free-section">

                  


                </div>
            </div>
            <div class="card card-custom col-10 m-5   " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("charged")}} <i class="fas fa-box-open fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('charged')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.service.index',['service_type'=>'education','service_sub_type'=>'charged'])}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body m-4 bg-gray-100" id="charged-section">
                 


                </div>
            </div>



        </div>



    </section>
    <!--Start Sweets Plans -->

    <section id="Links-News-sec" class="Sweets w-100">
        <div class="dots dots-up"></div>
        <div class="dots dots-down"></div>
        <h2 class="main-title"><span data-title-main="{{__("links & news")}}">{{__("links & news")}}</span> </h2>
        <div class="row justify-content-center">


            <div class="card card-custom col-5  m-5 " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2> {{__("links")}} <i class="fas fa-link fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('links')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.link.index')}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                            >
                            <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body" id="links-section">

                 


                </div>
            </div>
            <div class="card card-custom col-5  m-5  " id="kt_card_3">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__("news")}}  <i class="far fa-newspaper fa-1x text-dark"></i> </h2>
                    </div>
                    <div class="card-toolbar">

                        <span onclick="load_section('news')" class="btn btn-icon btn-circle btn-sm btn-light-dark mr-1"
                            >
                            <i class="ki ki-reload icon-nm"></i>
                        </span>
                        <a title="{{__("show all")}}" href="{{route('dummyUser.news.index')}}" class="btn btn-icon btn-circle btn-sm btn-light-primary mr-1"
                        >
                        <i class="ki ki-menu-grid icon-nm"></i>
</a>
                    </div>
                </div>
                <div class="card-body" id="news-section">
                    


                </div>
            </div>



        </div>



    </section>





    <!--Start Opinions-->

    <section id="Opinions-sec" class="Opinions container">
        <h2 class="main-title"><span data-title-main="{{__("opinions")}}">{{__("opinions")}}</span> </h2>
        <div class="row">
       
            @forelse ($opinions as $opinion)
                  <!--begin::Col-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
        
        
                        <!--begin::User-->
                        <div class="mt-7 pb-2">
                          

                            <div class="symbol symbol-lg-75 symbol-circle symbol-light-success">
                             @include("components.base.initials",["text"=>$opinion->dummyUser->name])
                            </div>
                        </div>
                        <!--end::User-->
        
                        <!--begin::Name-->
                        <div class="my-2">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4">{{$opinion->dummyUser->name}}</a>
                        </div>
                        <!--end::Name-->
        
                        <!--begin::Label-->
                        <div href="#" class="label label-inline label-lg label-light-warning font-weight-bold">
                            @for ($i = 0; $i < 5; $i++)
                            @if (($i+1) <= $opinion->rating)
                            <i class="fa fa-star checked" ></i>
                            @else
                            <i class="fa fa-star" ></i>
                            @endif
                           
                            @endfor
                        </div>
                        <!--end::Label-->
        
                        <!--begin::Buttons-->
                        <div class="mt-9 mb-6 text-muted">
                            {{$opinion->opinion}}
                        </div>
                        <!--end::Buttons-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Col-->
            @empty
            <div class="alert alert-dark text-center w-100 p-10 mb-5 " role="alert">
                {{__("there are no opinions available at the moment")}}
            </div>
            @endforelse
          
        
        </div>
    </section>

    <!--End Opinions-->
@endsection

@push('scripts')

    <script src="{{ asset('assets/js/pages/features/miscellaneous/blockui.js') }}"></script>
    
    
    <script >
        var search = "{{$search}}";
    </script>
    
    <script >
        var load_routes={
            "cooking":"{{route('welcome.load.service',['service_type'=>'food','service_sub_type'=>'cooking'])}}",
            "food_parcel":"{{route('welcome.load.service',['service_type'=>'food','service_sub_type'=>'food_parcel'])}}",
            "gas":"{{route('welcome.load.service',['service_type'=>'food','service_sub_type'=>'gas'])}}",
            "flour":"{{route('welcome.load.service',['service_type'=>'food','service_sub_type'=>'flour'])}}",
            "free":"{{route('welcome.load.service',['service_type'=>'education','service_sub_type'=>'free'])}}",
            "charged":"{{route('welcome.load.service',['service_type'=>'education','service_sub_type'=>'charged'])}}",
            "clinic":"{{route('welcome.load.service',['service_type'=>'health','service_sub_type'=>'clinic'])}}",
            "hospital":"{{route('welcome.load.service',['service_type'=>'health','service_sub_type'=>'hospital'])}}",
            "medical_point":"{{route('welcome.load.service',['service_type'=>'health','service_sub_type'=>'medical_point'])}}",
            "pharmacy":"{{route('welcome.load.service',['service_type'=>'health','service_sub_type'=>'pharmacy'])}}",
            "links":"{{route('welcome.load.links')}}",
            "news":"{{route('welcome.load.news')}}",
        };
    </script>
    <script src="{{ asset('assets/js/crisis_management/welcome/script.js') }}"></script>
    <script src="{{asset('assets/js/crisis_management/welcome/demo.js')}}"></script>
    <script src="{{ asset('assets/js/crisis_management/actions/copy-link.js') }}"></script>
@endpush
