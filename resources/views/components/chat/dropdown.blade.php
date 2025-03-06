
                        <!--begin::Nav-->
                        <div id="notification_container" class="navi navi-hover scroll my-4 ps" data-scroll="true"
                            data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">

                            @foreach ($unreadChats as $chat)
                                <!--begin::Item-->
                                @php
                                $user1_id=$chat->user1;
                                $user2_id=$chat->user2;

                               switch (auth()->id()) {
                                case  $user1_id:
                                   $user_id=$user2_id;
                                    break;
                                case  $user2_id:
                                  $user_id=$user1_id;
                                    break;
                                
                            
                               }
                            @endphp
                              
                                    <a onclick='
                                    event.preventDefault();
                                
                                     _load("chat-modal-div","{{route("load.chat.modal",$user_id)}}","kt_chat_modal");    this.remove(); '
                                        class="navi-item">
                                        <div class="navi-link"
                                           style="background-color: #f1f3f5dd; cursor: pointer;" >
                                            <div class="navi-icon mr-2">

                                               
                                                <i class="far fas fa-comment text-dark"></i>
                                               
                                                



                                            </div>
                                    
                                            <div class="navi-text">
                                                <div class="font-weight-bold">

                                                    {{ __('you have') }} @if($chat->has_unread>1)
                                                    {{$chat->has_unread}}   
                                                    {{ __('unread messages') }}
                                                    @else 
                                                    {{ __('unread message') }} 
                                                   @endif  {{ __('from') }} {{ \App\models\User::find($user_id)->name}}.

                                                </div>
                                        
                                            </div>

                                        </div>
                                    </a>
                             




              
                   
                            @endforeach





   
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                </div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                        <!--end::Nav-->
               
