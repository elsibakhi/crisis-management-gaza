@extends(Auth::check() ? 'layouts.admin.master' : 'layouts.guest.master')

@section('title')
    @auth
{{ __('contribution') }}
    @endauth
@endsection

@section('breadcrumb')
    @auth
        @parent
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.contribution.link.index') }}" class="text-muted mr-2">{{ __('link') }}</a>
        </li>
        <li class="breadcrumb-item text-muted">
            <a class="text-muted ">
                {{ $link->title }}
            </a>
        </li>
    @endauth
@endsection

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b col-12">
        <div class="card-body">
            <div class="d-flex">
                <!--begin::Pic-->
                <div class=" mr-7">
                    <div class="symbol symbol-100 symbol-lg-120">

                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-120 symbol-light-primary">
                                <span class="font-size-h3 symbol-label font-weight-boldest">


                                    <span
                                        class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Clip.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>{{ __('link') }}</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) " />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>







                                </span>
                            </div>
                        </div>



                    </div>
                </div>
                <!--end::Pic-->

                <!--begin: Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex align-items-center justify-content-between ">
                        <!--begin::User-->
                        <div class="mr-3">
                            <div class="d-flex align-items-center mr-3">
                                <!--begin::Name-->
                                <a href="#"
                                    class="font-weight-bolder d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                    {{ $link->title }}
                                </a>

                                @can("change contributions status")
                                @include('components.base.status-span',[
                                
                                "status"=>$link->contribution->status ,
                               
                            ])
                                @endcan
                        

              

                            </div>

                            <!--begin::Contacts-->
                            <div class="d-flex flex-wrap my-2">
                                <a href=" {{ $link->link }}" target="_blank"
                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <span
                                        class="svg-icon svg-icon-muted svg-icon-1x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Clip.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>{{ __('link') }}</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) " />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>

                                    {{ $link->link }}


                                </a>


                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--begin::User-->


                        @can("change contributions status")
                        @include('components.base.change-state-dropdown',[
                            "route"=>"admin.contribution.changeState" ,
                            "id"=>$link->contribution->id ,
                            "type"=>"contribution" ,
                        ])
                        @endcan

                 
   


                    </div>
                    <!--end::Title-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--begin::Content-->
                    <div class=" w-100">




                        <!--begin::Items-->
                        <div class="  w-100 d-flex align-items-center  mt-8">
                            <!--begin::Item-->
                            <div class="d-flex  align-items-center w-50  mr-5 mb-2">

                                <div class="d-flex flex-column text-dark-75 text-center">
                                    <i class="flaticon-user-ok display-4 text-muted font-weight-bold"></i>
                                    <span class="font-weight-bolder mt-1 ">{{ __('justification') }}</span>
                                    <span
                                        class=" font-size-sm  mt-4 text-justify">{{ $link->contribution->justification }}</span>

                                </div>
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="d-flex align-items-center w-50   mr-5 mb-2">

                                <div class="d-flex flex-column text-dark-75 text-center">
                                    <i class="flaticon-interface-11 display-4 text-muted font-weight-bold"></i>
                                    <span class="font-weight-bolder mt-1 ">{{ __('description') }}</span>
                                    <span class=" font-size-sm mt-4 text-justify">{{ $link->description }}</span>
                                </div>
                            </div>
                            <!--end::Item-->







                        </div>
                        <!--begin::Items-->

                    </div>
                    <!--end::Progress-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    </div>
    <!--end::Card-->
@endsection

