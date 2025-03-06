
                <div class="row" >
        @forelse ($services as $service)

       
  
        
            <!--begin::Column-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-custom card-stretch gutter-b ">
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
               
        
                        <!--begin::User-->
                        <div class="mt-7">
                            <div class="symbol symbol-circle symbol-lg-90">
                                @if ($service->extensions()->count()==0)
                                
                                <img src="{{asset('storage/services/extensions/default/'.str_replace("_","-",$service_sub_type).'.png')}}" alt="image">
                                @else
                                    
                                <img src="{{asset('storage/'.$service->extensions()->first()->path)}}" alt="image">
                                @endif
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
            {{__('there are no services available at the moment')}}
        </div>
        @endforelse
    
     
    </div>