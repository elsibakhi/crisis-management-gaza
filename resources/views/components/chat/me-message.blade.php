           
            <!--begin::Message Out-->
               <div class="d-flex flex-column mb-5 align-items-end  ">
                <div class="d-flex align-items-center">
                    <div>
                        @if ($message->read_at)
                        <i class=" seen_icon fas fa-check-double text-success"> </i>
                        @else
                        <i class="seen_icon fas fa-check"> </i>
                        @endif
                        <span  class=" text-muted font-size-sm">{{$message->created_at->diffForHumans()}}</span>
                        
                    </div>
                    <div class="symbol symbol-circle symbol-40 mr-3 symbol-light-primary">
                   
    
                        @if ($user->profile?->logo)

                        <img src="{{ asset("storage/".$user->profile?->logo) }}" alt="image">
                        @else
                        @include("components.base.initials",["text"=>$user->name])
                    @endif
               
                        
                    </div>
                </div>
                <div class="mt-2 rounded p-5 bg-light-primary text-dark-75 font-weight-bold font-size-lg text-right max-w-400px">
                    {{$message->body}}
                </div>
            </div>
            <!--end::Message Out-->