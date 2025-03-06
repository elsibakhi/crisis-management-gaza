
                            @forelse ( $dummyUser?->notifications ?? [] as $notification)


                                                  <!--begin::Item-->
  <a href="
  {{ 
   $notification->data['status']=="accepted" ?
   (
  $notification->data['contribution_type']=='service'?
  route('dummyUser.service.show',[$notification->data['addable_id']]) 
   :
    route('dummyUser.contribution.link.show',[$notification->data['addable_id']])
    ) : "/"
     }}?nid={{ $notification->id }}" class="navi-item">
                            <div class="navi-link rounded " @if ($notification->unread()) style='background-color: #f7f8f9;' @endif>
                                <div class="symbol symbol-50 mr-3">
                                    <div class="symbol-label"><i class="flaticon-bell text-success icon-lg"></i></div>
                                </div>
                                <div class="navi-text">
                                    <div class="font-weight-bold font-size-lg">
                                        {{ __('your contribution status has been changed to') }} {{$notification->data['status']}}
                                    </div>
                                    <div class="text-muted">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--end::Item-->    

                            

                                


                                <!--end::Item-->
                            @empty
                                <!--begin::Item-->
                                <a id="empty_notifications" href="#" class="navi-item">
                                    <div class="navi-link">

                                        <div class="navi-text">
                                            <div class="font-weight-bold">
                                                {{ __('there are no notifications for you') }}
                                            </div>

                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                            @endforelse



