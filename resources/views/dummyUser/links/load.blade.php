
                <div class="row" >
        @forelse ($links as $link)

       
  
        
            <!--begin::Column-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-custom card-stretch gutter-b ">
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
               
        
          
        
                        <!--begin::Name-->
                        <div class="my-4">
                            <span class="text-dark font-weight-bold text-hover-warning font-size-h4">{{$link->title}}</span>
                        </div>
                        <!--end::Name-->
        
                        <!--begin::Label-->
                        <span class="text-muted">{{$link->description}}</span>
                        <!--end::Label-->
        
                        <!--begin::Buttons-->
                        <div class="mt-9">
                            <a onclick="event.preventDefault();  copyLink('{{$link->link}}',{{$link->id}},'{{csrf_token()}}')  " class="btn btn-light-primary font-weight-bolder btn-sm py-3 px-6 text-uppercase">{{__('copy')}}</a>
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