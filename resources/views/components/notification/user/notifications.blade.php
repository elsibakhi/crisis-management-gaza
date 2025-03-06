

           
                    <!--begin::Nav-->
                    <div id="notification_container" class="navi navi-hover scroll my-4 ps" data-scroll="true"
                        data-height="300" data-mobile-height="200" style="height: 300px; overflow: hidden;">

                        @foreach (Auth::user()->notifications as $notification)
                            <!--begin::Item-->

                 

                          
                            <a href="{{$notification->data['route'] }}?nid={{ $notification->id }}"
                                class="navi-item">
                                <div class="navi-link"
                                    @if ($notification->unread()) style="background-color: #f7f8f9;" @endif>
                                    <div class="navi-icon mr-2">

                                       
                                        <i class="{{$notification->data['icon'] }}"></i>
                                       
                                        
                                        


                                    </div>
                                    <div class="navi-text">
                                        <div class="font-weight-bold">

                                            @switch($notification->data['translation_key'])
                                                @case("complaint-added")

                                                        {{__("notifications.complaint-added",
                                                        [
                                                            "title"=>$notification->data['message_title']
                                                        ])}}
                                                    @break
                                                    
                                                @case('contribution-added')
                                                {{__("notifications.contribution-added",
                                                [
                                                    "type"=>__($notification->data['message_type'])
                                                ])}}
                                                    @break
                                                @case('enrollment-added')
                                                {{__("notifications.enrollment-added",
                                                [
                                                    "type"=>__($notification->data['message_type']),
                                                    "name"=>$notification->data['message_name']
                                                ])}}
                                                    @break
                                                @case('institution-added')
                                                {{__("notifications.institution-added",
                                                [
                                                    "type"=>__($notification->data['message_type']),
                                                    "name"=>$notification->data['message_name']
                                                ])}}
                                                    @break
                                                @case('news-added')
                                                {{__("notifications.news-added",
                                                [
                                                    "title"=>$notification->data['message_title']
                                                ])}}
                                                    @break
                                                @case('note-added')
                                                {{__("notifications.note-added",
                                                [
                                                    "title"=>$notification->data['message_title']
                                                ])}}
                                                    @break
                                                @case('link-added')
                                                {{__("notifications.link-added",
                                                [
                                                    "title"=>$notification->data['message_title']
                                                ])}}
                                                    @break
                                                @case('opinion-added')
                                                {{__("notifications.opinion-added",
                                                [
                                                    "rating"=>$notification->data['message_rating']
                                                ])}}
                                                    @break
                                                @case('service-added')
                                                {{__("notifications.service-added",
                                                [
                                                    "type"=>__($notification->data['message_type']),
                                                    "title"=>$notification->data['message_title']
                                                ])}}
                                                    @break
                                            
                                              
                                                    
                                            @endswitch


                                       

                                        </div>
                                        <div class="text-muted">
                                            {{ $notification->created_at->diffForHumans() }}
                                        </div>
                                    </div>

                                </div>
                            </a>
                  




                              

                            <!--end::Item-->
        
                            @endforeach







                            {{--         
                            <div class="text-center">
                                <a href="{{route('allUserNotifications')}}" class="dark-link">View All Notifications</a>
                            </div> --}}
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                </div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                        <!--end::Nav-->
                
