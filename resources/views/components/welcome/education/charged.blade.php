
    <div class="row">
        @forelse ($charged_services as $service)

       
  
        
            <!--begin::Column-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-custom card-stretch gutter-b">
                    <div class=" ribbon ribbon-top ribbon-ver">
                        <div class="ribbon-target bg-dark" style="top: -2px; right: 20px;">
                           {{$service->educationService->cost}} &#8362;
                        </div>
                     
                    </div>
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
               
        
                        <!--begin::User-->
                        <div class="mt-7">
                            <div class="symbol symbol-circle symbol-lg-90">
                                <img src="storage/{{$service->extensions()->first()->path??"services/extensions/default/charged.png"}}" alt="image">
                            </div>
                        </div>
                        <!--end::User-->
        
                        <!--begin::Name-->
                        <div class="my-4">
                            <span class="text-dark font-weight-bold text-hover-warning font-size-h4">{{$service->title}}</span>
                        </div>
                        <!--end::Name-->
        
                        <!--begin::Label-->
                        <span class="text-muted">{{$service->description}}</span>
                        <!--end::Label-->
        
                        <!--begin::Buttons-->
                        <div class="mt-9">
                            <a href="{{route("dummyUser.service.show",$service->id)}}" class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">{{__('view')}}</a>
                        </div>
                        <!--end::Buttons-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::Column-->
     



        @empty
        <div class="alert alert-light text-center" role="alert">
            {{ __('there are no services available at the moment') }}
        </div>
        @endforelse
 
    </div>



 

