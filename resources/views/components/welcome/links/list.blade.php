

    

        @forelse ($links as $link)

       
  
        
    <div class="d-flex align-items-center mb-9 bg-dark-o-15 rounded p-5">
        <!--begin::Icon-->

        <!--end::Icon-->

        <!--begin::Title-->
        <div class="d-flex flex-column flex-grow-1 mr-2">
            <a href="{{$link->link}}" target="_blank" class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">{{$link->title}}</a>
            <span class="text-muted ">{{$link->description}}</span>
        </div>
        <!--end::Title-->

        <!--begin::Lable-->
        <span onclick="copyLink('{{$link->link}}',{{$link->id}},'{{csrf_token()}}')" class="font-weight-bolder text-warning py-1 font-size-lg" style="cursor: pointer"><i class="fas fa-copy text-light-dark text-hover-primary "></i></span>
        <!--end::Lable-->
    </div>
    <!--end::Item-->



        @empty
        <div class="alert alert-light text-center" role="alert">
            {{ __('there are no links available at the moment') }}
        </div>
        @endforelse
 
 



 

