@extends('layouts.admin.master')
@section('title')
   {{ __('view an institution') }}
@endsection


@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="
        @if ( $institution->institutionData->status == "accepted")
        {{ route('institution.index',["type"=>"institutions"]) }}
        
        @else
        {{ route('institution.index',["type"=>"enrollments"]) }}
            
        @endif
         
        " class="text-muted mr-2">{{ __('institutions') }}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted">
            {{ $institution->name }} </a>
    </li>
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b w-100">
        <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex mb-9">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    <div class="symbol symbol-50 symbol-lg-120">
                        @if ($institution->profile?->logo)
                            <img src="{{ asset('storage/'.$institution->profile?->logo) }}" alt="image">
                        @else
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120 symbol-light-primary">
                                    @include("components.base.initials",["text"=>$institution->name])
                                </div>
                            </div>
                        @endif

                    </div>


                </div>
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between flex-wrap mt-1">
                        <div class="d-flex mr-3">
                            <a href="#"
                                class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $institution->name }}</a>
                            <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                           @can("changing the enrollment status of institutions")
                           @include('components.base.status-span',[
                                
                           "status"=>$institution->institutionData->status ,
                          
                       ]) 
                           @endcan
                         
                        </div>


                    </div>
                    <!--end::Title-->

                    <!--begin::Content-->
                    <div class="d-flex flex-wrap justify-content-between mt-1">
                        <div class="d-flex flex-column flex-grow-1 pr-8">
                            <div class="d-flex flex-wrap mb-4">
                                <a class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-new-email mr-2 font-size-lg"></i>{{ $institution->email }}</a>
                                <a class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{ __($institution->institutionData->type) }}</a>
                                <a class="text-dark-50 text-hover-primary font-weight-bold"><i
                                        class="flaticon2-placeholder mr-2 font-size-lg"></i>

                                    {{ $institution->institutionData->location->address }}
                                

                                </a>
                            </div>

                            <span class="font-weight-bold text-dark-50">{{ $institution->institutionData->description }}</span>

                        </div>


                    </div>
                    <!--end::Content-->
                </div>

                @can("changing the enrollment status of institutions")
                @include('components.base.change-state-dropdown',[
                    "route"=>"admin.institution.changeState" ,
                    "id"=>$institution->id ,
                    "type"=>"institution" ,
                ])
                @endcan
 
            </div>
            <!--end::Details-->

            <div class="separator separator-solid"></div>

            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-time-1 display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">{{ __('start time') }}</span>
                        <span class="font-weight-bolder font-size-h5">{{ $institution->institutionData->start_time }}</span>

                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-time display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">{{ __('end time') }}</span>
                        <span class="font-weight-bolder font-size-h5">{{ $institution->institutionData->end_time }}</span>
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon2-phone display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">{{ __('phone') }}</span>
                        <span class="font-weight-bolder font-size-h5">{{ $institution->profile->phone }}</span>
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon2-cancel display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column flex-lg-fill">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">{{ $institution->complaints()->count() }} {{ __('complaint') }}</span>
                        <a href="{{route("admin.complaint.index",["institution_filter"=>$institution->id])}}" class="text-primary font-weight-bolder">{{ __('view') }}</a>
                    </div>
                </div>
                <!--end::Item-->

             



            </div>
            <!--begin::Items-->
        </div>

 
    </div>
    <!--end::Card-->

    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-8">
            <!--begin::Advance Table Widget 2-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">{{ __('last services') }}</span>
                       
                    </h3>
       
                </div>
                <!--end::Header-->

                <div class="card-body">
                    <!--begin: Search Form-->
      
                    <!--end: Search Form-->
            
                    <!--begin: Datatable-->
                    <div class="datatable datatable-default datatable-bordered datatable-loaded">
                        <table class="datatable-bordered datatable-head-custom datatable-table" id="kt_datatable" style="display: block;">
                        <thead class="datatable-head">
                            <tr class="datatable-row" style="left: 0px;">
                                <th class=" datatable-cell datatable-cell-sort"><span  style="width: 108px; ">{{ __('title') }}</span></th>

                                <th  class=" datatable-cell datatable-cell-sort"><span  style="width: 108px; ">{{ __('start date') }}</span></th>
                                <th  class=" datatable-cell datatable-cell-sort"><span  style="width: 108px; ">{{ __('period') }}</span></th>
                                <th class=" datatable-cell datatable-cell-sort"><span  style="width: 108px; ">{{ __('access') }}</span></th>
                                <th  class=" datatable-cell datatable-cell-sort"><span  style="width: 108px; ">{{ __('location') }}</span></th>
                     
                            </tr>
                        </thead>
                        <tbody style="" class="datatable-body">
                            @forelse ($services as $service)
                            <tr data-row="0" class="datatable-row" style="left: 0px;">
                                <td  class="datatable-cell text-center"><a class="text-dark text-hover-primary" href="{{route('service.show',$service->id)}}"><span style="width: 108px;">{{$service->title}}</span></a></td>
                              
                                <td class="datatable-cell text-center"><span style="width: 108px;">{{$service->start_date}}</span></td>
                                <td class="datatable-cell text-center"><span style="width: 108px;">{{$service->period}}</span></td>
                                <td class="datatable-cell text-center"><span style="width: 108px;">{{$service->access}}</span></td>
                                <td  class="datatable-cell text-center"><span style="width: 108px;">{{$service->location->region}}</span></td>
                            </tr>
                                @empty
                                <tr data-row="0" class="datatable-row" style="left: 0px;">

                                    <td colspan="5"  class="p-5 text-center" ><span>{{ __('there is no services for this institution') }}</span></td>
                                </tr>
                                @endforelse
                            
                              
                            </tbody>
                  
                  
                        </table>
                
                </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Advance Table Widget 2-->
        </div>
        <div class="col-lg-4">
            <!--begin::Mixed Widget 14-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title font-weight-bolder ">{{ __('working days') }}</h3>
                    <div class="card-toolbar">
                      
                      

                <!--end::Header-->

                <!--begin::Body-->
                 <div class="card-body d-flex flex-column">
                    <div class="timeline timeline-6 mt-3">

                        @foreach ($institution->workingDays as $workingDay)
                                           <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{$loop->iteration}}</div>
                            <!--end::Label-->
                    
                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger icon-xl"></i>
                            </div>
                            <!--end::Badge-->
                    
                            <!--begin::Text-->
                            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                               {{__($workingDay->day)}}
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
    </div>
    
    <!--end::Row-->
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
@endpush
