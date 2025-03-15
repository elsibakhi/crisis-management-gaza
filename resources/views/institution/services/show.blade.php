@extends(Auth::check() ? 'layouts.admin.master' : 'layouts.guest.master')

@section('title')
  
{{__('service')}}
  
@endsection

@section('breadcrumb')
    @auth
        @parent
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('service.index') }}" class="text-muted mr-2">{{__('services')}}</a>
        </li>
        <li class="breadcrumb-item text-muted">
            <a class="text-muted ">
                {{ $service->title }}
            </a>
        </li>
    @endauth
@endsection



@push('style')
   

<link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>

    @if (app()->getLocale()=="ar")
    <link rel="stylesheet" href="{{ asset('assets/css/crisis_management/services/imagePreview-rtl.css') }}">

@else
<link rel="stylesheet" href="{{ asset('assets/css/crisis_management/services/imagePreview.css') }}">

@endif
@endpush

@section('content')
    <!-- النافذة المنبثقة للصورة المكبرة -->
    <div style="display: none;" id="imageModal" class="imageModal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage" onclick="event.stopPropagation(); closeModal()">
    </div>


@include("institution.services.locationModal")


    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <div class="d-flex">
                <!--begin::Pic-->
                <div class=" mr-7">
                    <div class="symbol symbol-100 symbol-lg-120">

                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-120 symbol-light-primary">
                                <span class="font-size-h3 symbol-label font-weight-boldest">

                                    @food($service->id)
                                        <span
                                            class="svg-icon svg-icon-dark svg-icon-5x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <title>Food</title>
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
                                            </svg><!--end::Svg Icon--></span>
                                    @endfood
                                    @education($service->id)
                                        <span
                                            class="svg-icon svg-icon-dark svg-icon-5x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <title>Education</title>
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
                                            </svg><!--end::Svg Icon--></span>
                                    @endeducation
                                    @health($service->id)
                                        <i class="   flaticon-black text-dark icon-5x" title="Health"></i>
                                    @endhealth





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
                                    {{ $service->title }}
                                </a>
                                <!--end::Name-->
                                @food($service->id)
                                    <span
                                        class="label label-light-info label-inline font-weight-bolder mr-1">{{__(str_replace("_"," ",$service->foodService->type))}}</span>
                                @endfood
                                @education($service->id)
                                    <span
                                        class="label label-light-info label-inline font-weight-bolder mr-1">{{__(str_replace("_"," ",$service->educationService->status))}}</span>
                                @endeducation
                                @health($service->id)
                                    <span
                                        class="label label-light-info label-inline font-weight-bolder mr-1">{{__(str_replace("_"," ",$service->healthService->type))}}</span>
                                @endhealth

                                @contribution($service->id)

                                @can("change contributions status")
                                @include('components.base.status-span',[
                                
                                "status"=>$service->contribution->status ,
                               
                            ]) 
                                @endcan
                           
                  
                                @endcontribution
                            </div>

                            <!--begin::Contacts-->
                            <div class="d-flex flex-wrap my-2">
                                <a href="#"
                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <span
                                        class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Communication / Mail-notification</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000"></path>
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5">
                                                </circle>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    @institution($service->id)
                                        {{ $service->institution->email }}
                                    @endinstitution
                                    @contribution($service->id)
                                    {{ $service->contribution->dummyUser->name }}
                                    @endcontribution

                                </a>

                                <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                    <span
                                        class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Map/Marker2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Map / Marker2</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> {{ $service->location->address }} ,
                                
                                </a>
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--begin::User-->
                        <div class="d-flex">
                            @contribution($service->id)

                            @can("change contributions status")
                            @include('components.base.change-state-dropdown',[
                                "route"=>"admin.contribution.changeState",
                                "id"=>$service->contribution->id ,
                                "type"=>"contribution" ,
                            ])
                            @endcan
                       

              
                            @endcontribution
                       
                            <button type="button" class="btn btn-light btn-icon btn-sm p-5 mx-3" onclick="serviceLocationIcon()">
                                <i class="fa fa-map-marker-alt text-danger  "></i>
                            </button>

                        </div>
                       
                      
                    </div>
                    <!--end::Title-->
                    <div class="separator separator-dashed my-10"></div>
                    <!--begin::Content-->
                    <div class=" w-100 d-flex align-items-center flex-wrap justify-content-between">


                        <!--begin::Progress-->
                        <div class="w-100  mt-5 mt-sm-0 ">


                            <!--begin::Card-->
                            <div class="card card-custom gutter-b">

                                <div class="card-body pt-2">

                            

                                    <div class="gallery {{ count($service->extensions) == 1 ? 'single' : (count($service->extensions) == 2 ? 'double' : (count($service->extensions) == 3 ? 'triple' : 'multiple')) }}">
                                        @forelse ($service->extensions as $extension)
                                            <img src="{{ asset('storage/' . $extension->path) }}" alt="Service Image" onclick="toggleModal(this)">
                                        @empty
                                         
                                        <div class="no-images">
                                            <p>{{__('no images available')}}</p>
                                        </div>
                                

                                        @endforelse
                                    </div>
                                    

                                        </div>
                            



                                </div>
                            </div>
                            <!--end::Card-->

                            <!--begin::Items-->
                            <div class="d-flex align-items-center flex-wrap mt-8">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-time-1 display-4 text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">{{__('start time')}}</span>
                                        <span class="font-weight-bolder font-size-h5">{{ $service->start_time }}</span>

                                    </div>
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-time display-4 text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">{{__('end time')}}</span>
                                        <span class="font-weight-bolder font-size-h5">{{ $service->end_time }}</span>
                                    </div>
                                </div>
                                <!--end::Item-->

                                @education($service->id)
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                        <span class="mr-4">
                                            <i class="far fa-money-bill-alt display-4 text-muted font-weight-bold"></i>
                                        </span>
                                        <div class="d-flex flex-column text-dark-75">
                                            <span class="font-weight-bolder font-size-sm">{{__('cost')}}</span>
                                            <span
                                                class="font-weight-bolder font-size-h5">{{ $service->educationService->cost }}
                                                <span>&#8362;</span></span>
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                @endeducation

                                @can('view complaints')
                                          <!--begin::Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon2-cancel display-4 text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <span class="text-dark-75 font-weight-bolder font-size-sm"><span id="complaint_span">{{$service->complaints_count}}</span>{{__('complaints')}} </span>
                                        <a href="{{route("admin.complaint.index",["service_filter"=>$service->id])}}" class="text-primary font-weight-bolder">{{__('view')}}</a>
                                    </div>
                                </div>
                                <!--end::Item-->
                                @endcan
                                @can('view notes')
                                           <!--begin::Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                                    <span class="mr-4">
                                        <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark-75 font-weight-bolder font-size-sm"><span id="note_span">{{$service->notes_count}}</span> {{__('notes')}}</span>
                                        <a href="{{route("admin.note.index",["service_filter"=>$service->id])}}" class="text-primary font-weight-bolder">{{__('view')}}</a>
                                    </div>
                                </div>
                                <!--end::Item-->
                                @endcan

                          

                         



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

    <!--begin::Row-->
    <div class="row">
        <div class="col-xl-6">



            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header h-auto py-3 border-0">
                    <div class="card-title">
                        <h3 class="card-label text-dark  font-weight-bolder">
                            {{__('service description')}}
                        </h3>
                    </div>

                </div>
                <div class="card-body pt-2">
                    <p class="text-dark-50">
                        @if ($service->description)
                            {{ $service->description }}
                        @else
                        {{__('no description available')}}
                        @endif
                    </p>

                </div>
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header h-auto py-4">
                    <div class="card-title">
                        <h3 class="card-label font-weight-bolder">
                            
                            @institution($service->id)
                            {{__('institution')}}
                        @endinstitution
                        @contribution($service->id)
                        {{__('contributor')}}
                        @endcontribution

                            <span class="d-block text-muted pt-2 font-size-sm">
                                @institution($service->id)
                                {{__('institution profile preview')}}
                            @endinstitution
                            @contribution($service->id)
                            {{__('contributor data preview')}}
                            @endcontribution
</span>
                        </h3>
                    </div>

                </div>
                <!--end::Header-->
                <!--begin::Body-->
                @institution($service->id)
                <div class="card-body py-4">
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('name')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->institution->name }}</span>
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('location')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->institution->institutionData->location->address }}
                              </span>
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('region')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->institution->institutionData->location->region }}
                              </span>
                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('description')}}:</label>
                        <div class="col-8">
                            <span
                                class="font-weight-bolder">{{ $service->institution->institutionData->description ?? 'No Description ' }}</span>

                        </div>
                    </div>
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('phone')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->institution->profile->phone }}</span>
                        </div>
                    </div>



                </div>
                @endinstitution

                @contribution($service->id)
                <div class="card-body py-4">
                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('name')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->contribution->dummyUser->name }}</span>
                        </div>
                    </div>
             @can("change contributions status")
             <div class="form-group row my-2">
                <label class="col-4 col-form-label">{{__('justification')}}:</label>
                <div class="col-8">
                    <span
                        class="font-weight-bolder">{{ $service->contribution->justification }}</span>

                </div>
            </div> 
             @endcan

                    <div class="form-group row my-2">
                        <label class="col-4 col-form-label">{{__('phone')}}:</label>
                        <div class="col-8">
                            <span
                                class="form-control-plaintext font-weight-bolder">{{ $service->contribution->dummyUser->phone }}</span>
                        </div>
                    </div>



                </div>
                @endinstitution
                <!--end::Body-->

            </div>
            <!--end::Card-->

            <div class="card card-custom  gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title font-weight-bolder ">{{__('service working days')}}</h3>
                    <div class="card-toolbar">



                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="timeline timeline-6 mt-3">

                                @foreach ($service->workingDays as $workingDay)
                                    <!--begin::Item-->
                                    <div class="timeline-item align-items-start">
                                        <!--begin::Label-->
                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">
                                            {{ $loop->iteration }}</div>
                                        <!--end::Label-->

                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless text-danger icon-xl"></i>
                                        </div>
                                        <!--end::Badge-->

                                        <!--begin::Text-->
                                        <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                            {{ __($workingDay->day) }}
                                        </div>
                                        <!--end::Text-->

                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!--end::Body-->

                        <!--end::Mixed Widget 14-->
                    </div>
                </div>

            </div>

        </div>
        <div class="col-xl-6">

            @education($service->id)
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label text-dark  font-weight-bolder">
                                {{__('service specializations')}} 
                            </h3>
                        </div>

                    </div>
                    <div class="card-body pt-2">

                        <div class="row">
                            <!--begin::Column-->

                            @foreach ($service->specializations as $specialization)
                                <!--begin::Column-->
                                <div class="col-lg-6">
                                    <div class="card card-custom card-stretch gutter-b bg-gray-200">
                                        <!--begin::Body-->
                                        <div class="card-body text-center pt-4">



                                            <!--begin::Name-->
                                            <div class="my-4 ">
                                                <span
                                                    class="text-dark font-weight-bold text-hover-primary font-size-h4">{{ $specialization->name }}</span>
                                            </div>
                                            <!--end::Name-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <!--end::Column-->
                            @endforeach

                        </div>


                    </div>
                </div>
                <!--end::Card-->

                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label text-dark  font-weight-bolder">
                                {{__('service targets')}} 
                            </h3>
                        </div>

                    </div>
                    <div class="card-body pt-2">

                        <div class="row">
                            <!--begin::Column-->

                            @foreach ($service->targets as $target)
                                <!--begin::Column-->
                                <div class=" col-lg-6">
                                    <div class="card card-custom card-stretch gutter-b bg-gray-200">
                                        <!--begin::Body-->
                                        <div class="card-body text-center pt-4">



                                            <!--begin::Name-->
                                            <div class="my-4">
                                                <span
                                                    class="text-dark font-weight-bold text-hover-primary font-size-h4">{{ $target->name }}</span>
                                            </div>
                                            <!--end::Name-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <!--end::Column-->
                            @endforeach

                        </div>

                    </div>
                </div>
                <!--end::Card-->
            @endeducation


            @health($service->id)
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label text-dark  font-weight-bolder">
                                {{__('service fields')}}
                            </h3>
                        </div>

                    </div>
                    <div class="card-body pt-2">

                        <div class="row">
                            <!--begin::Column-->

                            @foreach ($service->fields as $field)
                                <!--begin::Column-->
                                <div class="col-lg-6 ">
                                    <div class="card card-custom card-stretch gutter-b bg-gray-200">
                                        <!--begin::Body-->
                                        <div class="card-body text-center pt-4">



                                            <!--begin::Name-->
                                            <div class="my-4">
                                                <span
                                                    class="text-dark font-weight-bold text-hover-primary font-size-h4">{{ $field->name }}</span>
                                            </div>
                                            <!--end::Name-->


                                        </div>
                                        <!--end::Body-->
                                    </div>
                                </div>
                                <!--end::Column-->
                            @endforeach

                        </div>

                    </div>
                </div>
                <!--end::Card-->
            @endhealth

@guest
    

         
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <!--begin::Header-->
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
                                    <span class="nav-icon mr-2">
                                        <span
                                            class="svg-icon mr-3"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Notification2.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                        
                                                <defs></defs>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                        fill="#000000"></path>
                                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5"
                                                        r="2.5"></circle>
                                                </g>
                                            </svg><!--end::Svg Icon--></span> </span>
                                    <span class="nav-text">
                                        {{__('notes')}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
                                    <span class="nav-icon mr-2">
                                        <span
                                            class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Communication/Mail-locked.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                            
                                                <defs />
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z"
                                                        fill="#000000" />
                                                    <path
                                                        d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg><!--end::Svg Icon--></span></span>
                                    <span class="nav-text">
                                        {{__('complaints')}}
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                  
                <!--begin::Body-->
                <div class="card-body px-0">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                            <div class="container">
                                <form id="kt_form_note" class="form" action="{{ route('note.store') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}" />
                                    <div class="form-group">
                                        <textarea id="note_input" name="note" class="form-control form-control-lg form-control-solid"
                                            id="exampleTextarea" rows="3" placeholder="{{__('Type a note')}}" ></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <a id="kt_btn_note"
                                                onclick="event.preventDefault();  addForm(event,'kt_form_note','kt_btn_note','note_input','note')"
                                                class="btn btn-light-primary font-weight-bold">{{__('add a note')}}</a>
                                            <a href="#" class="btn btn-clean font-weight-bold">{{__('cancel')}}</a>
                                        </div>
                                    </div>
                                </form>

                                <div class="separator separator-dashed my-10"></div>
                                <div id="note_timeline_container">

                                    @include('dummyUser.notes.timeline')

                                </div>

                            </div>
                        </div>
                        <!--end::Tab Content-->

                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                            <div class="container">
                                <form id="kt_form_complaint" class="form" action="{{ route('complaint.store') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}" />
                                    <div class="form-group">
                                        <textarea id="complaint_input" name="complaint" class="form-control form-control-lg form-control-solid"
                                            id="exampleTextarea" rows="3" placeholder="{{__('Type a complaint')}}"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <a onclick="event.preventDefault();  
                                           
                                         addForm(event,'kt_form_complaint','kt_btn_complaint','complaint_input','complaint')
                                            "
                                                class="btn btn-light-primary font-weight-bold">{{__('add a complaint')}}
                                               </a>
                                            <a id="kt_btn_complaint" href="#"
                                                class="btn btn-clean font-weight-bold">{{__('cancel')}}</a>
                                        </div>
                                    </div>
                                </form>

                                <div class="separator separator-dashed my-10"></div>


                            </div>
                        </div>
                        <!--end::Tab Content-->


                    </div>
                </div>
                <!--end::Body-->
           
            </div>

            
            <!--end::Card-->
            @endguest


        </div>
    </div>
    <!--end::Row-->









@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>

    <script>
        function addForm(event, formId, btnId, inputId, addable) {

            var formSubmitButton = KTUtil.getById(btnId);
            var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
            KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "{{__('please wait')}}");

            // Simulate Ajax request
            setTimeout(function() {
                KTUtil.btnRelease(formSubmitButton);
            }, 1000);
            var form = KTUtil.getById(formId);
            $.ajax({
                url: "{{ route('dummyUser.check') }}",
                type: "GET",
                success: function(response) {

                    if (response.is_dummy_user) {
                        $.ajax({
                            url: $(form).attr("action"),
                            type: "POST",
                            data: $(form).serialize(),
                            success: function(response) {
                                if (response) {
                                    $("#" + inputId).val('');

                                    let last_number = parseInt($("#"+addable+'_span').html()); // Convert to integer
                                    
                                      $("#"+addable+'_span').html(++last_number); // Pre-increment to update immediately

                                    Swal.fire({
                                        text: "{{__('form submitted successfully!')}}",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "{{__('Ok, got it!')}}",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-primary",
                                        }
                                    });

                                    if (addable == "note") {
                                        refreshNotes()

                                    }


                                } else {
                                    // Handle server-side validation errors or other errors
                                    Swal.fire({
                                        text: "{{__('an error occurred while submitting the form')}}",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "{{__('Ok, got it!')}}",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-primary",
                                        }
                                    });
                                }
                            },
                            error: function(error) {
                                // Handle AJAX request error

                                Swal.fire({
                                    text: error.responseJSON.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "{{__('Ok, got it!')}}",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-primary",
                                    }
                                });
                            }
                        });

                    } else {
                        // show the modal	
                        $('#dummyUserModal').modal('show');
                    }
                },
                error: function(error) {
                    // Handle AJAX request error

                    Swal.fire({
                        text: error.responseJSON.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "{{__('Ok, got it!')}}",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                        }
                    });
                }
            });


        }


        function checkIfUserIsDummy() {
            $.ajax({
                url: "{{ route('dummyUser.check') }}",
                type: "GET",
                success: function(response) {

                    if (response.is_dummuy_user) {
                        return true;

                    } else {
                        return false;
                    }
                },
                error: function(error) {
                    // Handle AJAX request error

                    Swal.fire({
                        text: error.responseJSON.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "{{__('Ok, got it!')}}",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-primary",
                        }
                    });
                }
            });
        }
    </script>
    <script>
        function refreshNotes() {
            $("#note_timeline_container").load('{{ route('note.timeline', ['service_id' => $service->id]) }}');
        }

    </script>
    <script src="{{ asset('assets/js/crisis_management/actions/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/crisis_management/services/imagePreview.js') }}"></script>
@endpush
