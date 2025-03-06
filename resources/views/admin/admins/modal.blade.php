


<div class="modal fade"  id="Admins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="vaildate"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('add admins')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


                <div class=" container ">
                    <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav  border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step"   data-wizard-state="current">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-list"></i>
                                    <h3 class="wizard-title">{{__('enter details')}}</h3>
                                </div>
                  </div>
                            <!--end::Wizard Step 1 Nav-->

        
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-responsive"></i>
                                    <h3 class="wizard-title">{{__('assign roles and permissions')}}</h3>
                                </div>
                  </div>
                            <!--end::Wizard Step 3 Nav-->
        
        
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-responsive"></i>
                                    <h3 class="wizard-title">{{__('all done')}}</h3>
                                </div>
                  </div>
                            <!--end::Wizard Step 3 Nav-->
        
                            <!--begin::Wizard Step 4 Nav-->

                            <!--end::Wizard Step 4 Nav-->
        
 
                        </div>
                    </div>
                    <!--end::Wizard Nav-->
        
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin::Wizard Form-->
                            <form action="{{route('admin.store')}}" class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                @csrf
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content"  data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{__('enter the details of admin account')}}</h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{__('name')}}</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="name"
                                   
                                         
                                         
                                         placeholder="{{__('baraa elsibakhi')}}" >
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <!--end::Input-->
        
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{__('email')}}</label>
                                        <input type="email" class="form-control form-control-solid form-control-lg" name="email"
                                       
                                        placeholder="{{__('email@example.com')}}">
                                       
                                    <div class="fv-plugins-message-container"></div></div>
                                    <!--end::Input-->
        
                                    <div class="row">
                                        <div class="col-xl-6">

                                            <!--begin::Input-->

                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{__('password')}}</label>
                                                <input type="password" class="form-control form-control-solid form-control-lg" name="password" >
                                               
                                            <div class="fv-plugins-message-container"></div></div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{__('confirmed password')}}</label>
                                                <input type="password" class="form-control form-control-solid form-control-lg" name="password_confirmation"  >
                                              
                                            <div class="fv-plugins-message-container"></div></div>
                                            <!--end::Input-->
                                        </div>
                                     
                                    </div>
                                </div>
                                <!--end::Wizard Step 1-->
        
    <!--begin: Wizard Step 2-->
    <div class="pb-5" data-wizard-type="step-content">
        <div class="d-flex justify-content-between">
            <h4 class="mb-10 font-weight-bold text-dark">{{__('roles & permissions')}}</h4>
          
        </div>
        <div class="row">
            

            <div class="col-12">
                <div class="form-group fv-plugins-icon-container">
                    <label>{{__('roles')}}</label>
                    <select name="roles[]" id="kt_dual_listbox_roles" class="dual-listbox" multiple
                   >
                   @foreach ($roles as $role)
                   <option value="{{$role->name}}">{{__($role->name)}}</option>
                       
                   @endforeach
                  
          
                </select>
                    
                <div class="fv-plugins-message-container"></div></div>
            </div>
                <div class="col-12">
                    <div class="form-group fv-plugins-icon-container">
                        <label>{{__('permissions')}}</label>
                        <select name="permissions[]"  id="kt_dual_listbox_permissions" class="dual-listbox" multiple
                       >
                       @foreach ($permissions as $permission)
                       <option value="{{$permission->name}}">{{__($permission->name)}}</option>
                           
                       @endforeach
                    </select>
                        
                    <div class="fv-plugins-message-container"></div></div>
                </div>
        
           
           
        </div>


    </div>
    <!--end: Wizard Step 2-->
        
        
                                <!--begin::Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{__('all inputs are ready to store , please submit the form')}}</h4>
                                
        
                 
                       
                                </div>
                                <!--end::Wizard Step 4-->
        
 
        
                                <!--begin::Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                            {{__('previous')}} 
                                        </button>
                                    </div>
                                    <div>
                                        <button id="submitBtn" type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                            {{__('submit')}} 
                                        </button>
                                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">
                                            {{__('next')}} 
                                        </button>
                                    </div>
                                </div>
                                <!--end::Wizard Actions-->
                            <div></div><div></div><div></div><div></div></form>
                            <!--end::Wizard Form-->
                        </div>
                    </div>
                    <!--end::Wizard Body-->
                </div>
                <!--end::Wizard-->
            </div>
            <!--end::Wizard-->
        </div>
                </div>





            

        </div>
    </div>
</div>

