         <!--begin::Timeline-->
         <div class="timeline timeline-3">
            <div class="timeline-items">

                @foreach ($notes as $note)
                    
               
                <div class="timeline-item">
                    <div class="timeline-media">
                        <i class="flaticon2-pen text-dark"></i>
                    </div>
                    <div class="timeline-content">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="mr-2">
                                <a href="#"
                                    class="text-dark-75 text-hover-primary font-weight-bold">
                                    {{$note->dummyUser->name}}
                                </a>
                                <span class="text-muted ml-2">
                                  {{$note->updated_at->diffForHumans()}}
                                </span>
                       
                            </div>
                            @can("delete notes")
                            
                            <div class=" ml-2" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="Delete">
                                <a onclick="
                                event.preventDefault();
                                _delete('{{route('note.destroy',$note->id)}}','{{csrf_token()}}','note')"
                                    class="btn btn-hover-light-danger btn-sm btn-icon"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ki ki-bold-close icon-md"></i>
                                </a>
                         
                            </div>
                            @endcan
                        </div>
                        <p class="p-0">
                            {{$note->note}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $notes->links("pagination::bootstrap-5") }}
        </div>
        <!--end::Timeline-->