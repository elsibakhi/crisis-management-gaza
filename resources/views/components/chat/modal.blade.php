<div class="modal modal-sticky modal-sticky-bottom-right  " id="kt_chat_modal" data-backdrop="false" aria-modal="true" role="dialog" style=" padding-right: 27px; transform: translate(30px,30px)  ">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            <!--begin::Card-->
                                     <div  class="card card-custom">
                                   
                <!--begin::Header-->
                <div class="card-header align-items-center px-4 py-3">
                    <div class="text-left flex-grow-1">

                    </div>
                    <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5">{{$user->name}}</div>
                        <div>
                            <span id="active_label" class="label label-dot label-danger"></span>
                            <span id="active_text" class="font-weight-bold text-muted font-size-sm">{{ __('offline') }}</span>
                        </div>
                    </div>
                    <div class="text-right flex-grow-1">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                            <i class="ki ki-close icon-1x"></i>
                        </button>
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Scroll-->
                    <div id="scroll_div" class="scroll scroll-pull ps ps--active-y" style="height: 375px; overflow: hidden;">
                        <div id="scroll-first"></div>
                        <!--begin::Messages-->
                        <div id="messages-body" class="messages">
               
                       

                        </div>
                 
                        <!--end::Messages-->
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -2px; height: 375px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 133px;"></div></div></div>
                    <!--end::Scroll-->
                </div>
                <!--end::Body-->
           
                <!--begin::Footer-->
                <div class="card-footer align-items-center">
                    <!--begin::Compose-->
                    <form id="chat-form" action="{{route("message.store",$user->id)}}" method="post" >
                        @csrf
                     
                        <div class="form-group fv-plugins-icon-container">

                            <textarea id="message-input" name="message" class="form-control border-0 p-0" rows="2" placeholder="{{__('Type a message')}}" style="height: 17px;"></textarea>

                         
                       
                        <div class="d-flex align-items-end justify-content-end mt-5">
                       
                            <div>
                                <button id="submit_btn" type="submit"  class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">{{ __('send') }}</button>
                            </div>
                        </div>


                    </form>
                    <!--begin::Compose-->

                 
                </div>
                <!--end::Footer-->



            </div>
            <!--end::Card-->
                                       </div>
                               </div>
                        </div>

@php
           $ids=[auth()->id(),$user->id];
           $min_id=min($ids);
           $max_id=max($ids);
  
@endphp



    <script>

      var  user1="{{$min_id}}";
      var  user2="{{$max_id}}";
      var  auth_id="{{auth()->id()}}";
      var  auth_name="{{auth()->user()->name}}";


      var  csrf_token="{{csrf_token()}}";
      var  mark_message_as_read_route="{{route('message.mark.read')}}";

  



    </script>

                
     {{-- @vite('resources/js/chat.js') --}}

<script src="{{ asset('assets/js/crisis_management/message/chat.js') }}"></script>
<script src="{{ asset('assets/js/crisis_management/message/form.js') }}"></script>
<script>
    var load_messages_route = "{{ route('load.messages.pages',['user'=>$user]) }}";
    var page = 1; // رقم الصفحة

    _loadMoreMessages()

 
   </script>




<script>
var scrollDiv = document.querySelector(".scroll.scroll-pull.ps.ps--active-y");

if (scrollDiv) {


    // إضافة حدث scroll لمتابعة حركة التمرير
    scrollDiv.addEventListener('scroll', function() {
        if (scrollDiv.scrollTop === 0) {
          _loadMoreMessages()
            // يمكنك تنفيذ الكود الذي تريده هنا
        }
    });
}




</script>

