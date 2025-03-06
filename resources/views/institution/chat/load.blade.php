
                <div class="row" >
        @forelse ($admins as $admin)


  
        
            <!--begin::Column-->
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-custom card-stretch gutter-b ">
                    <!--begin::Body-->
                    <div class="card-body text-center pt-4">
               
        
                        <!--begin::User-->
                        <div class="mt-7">
                            <div class="symbol symbol-circle symbol-lg-90">
                                <div class="flex-shrink-0 mr-7">
                                    <div class="symbol symbol-50 symbol-lg-120 symbol-light-primary">
                                        @include("components.base.initials",["text"=>$admin->name])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::User-->
        
                        <!--begin::Name-->
                        <div class="my-4">
                            <span class="text-dark font-weight-bold text-hover-warning font-size-h4">{{$admin->name}}</span>
                        </div>

                        @forelse ($admin->roles as $role)
                        <div class="my-4">
                            <span class="text-muted ">{{__($role->name)}}</span>
                        </div>
                        @empty
                        <span class="text-muted ">{{__("no roles")}}</span>
                        @endforelse
                   
                        <!--end::Name-->
        
                        <!--begin::Label-->
                      
                        <!--end::Label-->
        
                        <!--begin::Buttons-->
                        <div class="mt-9">
                            <a onclick='
    event.preventDefault();

     _load("chat-modal-div","{{route("load.chat.modal",$admin->id)}}","kt_chat_modal");  ' class="btn btn-md btn-icon btn-light-twitter btn-pill mx-2" ><i class="far fa-comment"></i></a>
                        </div>

           
                        <!--end::Buttons-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::Column-->
     



        @empty
        <div class="alert alert-light text-center" role="alert">
            {{__('there are no admins at the moment')}}
        </div>
        @endforelse
    
     
    </div>