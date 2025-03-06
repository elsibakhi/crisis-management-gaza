

      <!--begin::Message In-->
           <div class="d-flex flex-column mb-5 align-items-start ">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-circle symbol-40 mr-3 symbol-light-primary">
              
                
                        
                    @if ($user->profile?->logo)

                    <img src="{{ asset("storage/".$user->profile?->logo) }}" alt="image">
                    @else
                    @include("components.base.initials",["text"=>$user->name])
                @endif
           
                   
           
                </div>
                <div>
               
                    
                    <span class="text-muted font-size-sm">{{$message->created_at->diffForHumans()}}</span>
                </div>
            </div>
            <div  class="mt-2 rounded p-5 bg-light-secondary text-dark-75 font-weight-bold font-size-lg text-left  max-w-400px">
                {{$message->body}}
            </div>
        </div>
        <!--end::Message In-->