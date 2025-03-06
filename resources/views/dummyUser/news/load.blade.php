
                
        


        <div class="timeline timeline-6 mt-3">

            @php
                $colors =[
                    "primary","info","danger","dark","secondry","success"
                ]
            @endphp
        
            @forelse ($news as $new)
        
               
          
            <!--begin::Item-->
            <div class="timeline-item align-items-start">
                <!--begin::Label-->
                <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg col-2">{{$new->created_at->diffForHumans()}}</div>
                <!--end::Label-->
                
                <!--begin::Badge-->
                <div class="timeline-badge">
                <i class="fa fa-genderless text-{{$colors[array_rand($colors)]}} icon-xl"></i>
                </div>
                <!--end::Badge-->
                
                <!--begin::Content-->
                <div class="timeline-content d-flex">
                    <div class="card card-custom gutter-b  ">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Container-->
                            <div>
                                <!--begin::Header-->
                                <div class="d-flex align-items-center">
                            
                    
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a onclick="event.preventDefault();   "  class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$new->title}}</a>
                                    
                                    </div>
                                    <!--end::Info-->
                    
                
                                </div>
                                <!--end::Header-->
                    
                                <!--begin::Body-->
                                <div>
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">
                                        {{$new->news}}
                                    </p>
                                    <!--end::Text-->
                    
                
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Container-->
                    
                  
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Content-->
                </div>
                <!--end::Item-->
            
            
                @empty
                <div class="alert alert-light text-center" role="alert">
                    {{__('there are no news available at the moment')}}
                </div>
                @endforelse
        
        
    
     
    








        
        
        
        