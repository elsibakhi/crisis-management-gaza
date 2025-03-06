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
        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{$new->created_at->diffForHumans()}}</div>
        <!--end::Label-->
        
        <!--begin::Badge-->
        <div class="timeline-badge">
        <i class="fa fa-genderless text-{{$colors[array_rand($colors)]}} icon-xl"></i>
        </div>
        <!--end::Badge-->
        
        <!--begin::Content-->
        <div class="timeline-content d-flex">
        <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">{{$new->news}}</span>
        </div>
        <!--end::Content-->
        </div>
        <!--end::Item-->
    
    
        @empty
        <div class="alert alert-light text-center" role="alert">
            {{ __('there are no news available at the moment') }}
        </div>
        @endforelse


</div>



