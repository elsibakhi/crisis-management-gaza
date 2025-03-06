


<div class="modal fade "  id="Institutions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="vaildate"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('add institutions')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


                <div class=" container ">
                    <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin::Wizard-->
                {{-- <x-wizards.wizard-1 :action="$action" >
                   <!--begin::Wizard Step  Navs-->
                    <x-slot:step_navs>
             <!--begin::Wizard Step 1 Nav-->
             <x-wizards.components.step-nav state="current" title="1. Enter Details">
                <x-slot:icon>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / Navigation / Arrow-right</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                        </g>
                    </svg><!--end::Svg Icon--></span>  
                    </x-slot>
            </x-wizards.components.step-nav>

            <!--end::Wizard Step 1 Nav-->

            <!--begin::Wizard Step 2 Nav-->
            <x-wizards.components.step-nav  title="2. Setup Location">
                <x-slot:icon>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / Navigation / Arrow-right</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                        </g>
                    </svg><!--end::Svg Icon--></span>   
                    </x-slot>
            </x-wizards.components.step-nav>




            <!--end::Wizard Step 2 Nav-->

            <!--begin::Wizard Step 3 Nav-->
            <x-wizards.components.step-nav  title="3. Select Services">
                <x-slot:icon>
                    <span class="svg-icon svg-icon-xl wizard-arrow"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / Navigation / Arrow-right</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                        </g>
                    </svg><!--end::Svg Icon--></span>      
                    </x-slot>
            </x-wizards.components.step-nav>

            <!--end::Wizard Step 3 Nav-->

            <!--begin::Wizard Step 4 Nav-->
            <x-wizards.components.step-nav  title="4. Review and Submit">
                <x-slot:icon>
                    <span class="svg-icon svg-icon-xl wizard-arrow last"><!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <title>Stockholm-icons / Navigation / Arrow-right</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"></rect>
                            <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "></path>
                        </g>
                    </svg><!--end::Svg Icon--></span>     
                    </x-slot>
            </x-wizards.components.step-nav>
            <!--end::Wizard Step 4 Nav-->    
                        </x-slot>
<!--end::Wizard Step  Navs-->



                </x-wizards.wizard-1> --}}
                <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav  border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step"   data-wizard-state="current">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-list"></i>
                                    <h3 class="wizard-title">{{ __('enter details') }}</h3>
                                </div>
                        </div>
                            <!--end::Wizard Step 1 Nav-->
        
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending" >
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-bus-stop"></i>
                                    <h3 class="wizard-title">{{ __('setup location') }}</h3>
                                </div>
                   </div>



                            <!--end::Wizard Step 2 Nav-->
        
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-responsive"></i>
                                    <h3 class="wizard-title">{{ __('extra info') }}</h3>
                                </div>
                  </div>
                            <!--end::Wizard Step 3 Nav-->
        
                            <!--begin::Wizard Step 4 Nav-->

                            <!--end::Wizard Step 4 Nav-->
        
                            <!--begin::Wizard Step 5 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-globe"></i>
                                    <h3 class="wizard-title">{{ __('all done') }}</h3>
                                </div>
                   </div>
                            <!--end::Wizard Step 5 Nav-->
                        </div>
                    </div>
                    <!--end::Wizard Nav-->
        
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin::Wizard Form-->
                            <form action="{{$action}}" class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form_institution">
                                @csrf
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content"  data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('enter the details of institution account') }}</h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('name') }}</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="name"
                                   
                                         
                                         
                                         placeholder="{{ __('baraa elsibakhi') }}" >
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <!--end::Input-->
        
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('email') }}</label>
                                        <input type="email" class="form-control form-control-solid form-control-lg" name="email"
                                       
                                        placeholder="{{ __('email@example.com') }}">
                                       
                                    <div class="fv-plugins-message-container"></div></div>
                                    <!--end::Input-->
        
                                    <div class="row">
                                        <div class="col-xl-6">

                                            <!--begin::Input-->

                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{ __('password') }}</label>
                                                <input type="password" class="form-control form-control-solid form-control-lg" name="password"  >
                                               
                                            <div class="fv-plugins-message-container"></div></div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{ __('confirmed password') }}</label>
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
            <h4 class="mb-10 font-weight-bold text-dark">{{ __('setup current location') }}</h4>
            <i class="fa fa-map-marker-alt fa-2x  text-hover-dark " style="cursor: pointer" onclick="locationIcon()"></i>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('location') }}</label>
                    <div id="kt_leaflet_5" style="height:300px;"></div>
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>

            <div class="col-xl-6">
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('region') }}</label>
                    <select name="region" class="form-control form-control-lg form-control-solid " id="exampleSelectl" data-gtm-form-interact-field-id="1">
                        <option selected value="" >{{ __('select the region') }}</option>
                        <option value="أم النصر">أم النصر</option>
                        <option vlaue="بيت لاهيا" >بيت لاهيا</option>
                        <option vlaue="بيت حانون" >بيت حانون</option>
                        <option vlaue="مخيم جباليا" >مخيم جباليا</option>
                        <option vlaue="جباليا" >جباليا</option>
                        <option vlaue="غزة" >غزة</option>
                        <option vlaue="مخيم الشاطئ" >مخيم الشاطئ</option>
                        <option vlaue="الزهراء" >الزهراء</option>
                        <option vlaue="المغراقة" >المغراقة</option>
                        <option vlaue="جحر الديك" >جحر الديك</option>
                        <option vlaue="دير البلح" >دير البلح</option>
                        <option vlaue="مخيم دير البلح" >مخيم دير البلح</option>
                        <option vlaue="مخيم النصيرات" >مخيم النصيرات</option>
                        <option vlaue="النصيرات" >النصيرات</option>
                        <option vlaue="مخيم البريج" >مخيم البريج</option>
                        <option vlaue="البريج" >البريج</option>
                        <option vlaue="مخيم المغازي" >مخيم المغازي</option>
                        <option vlaue="المغازي" >المغازي</option>
                        <option vlaue="الزوايدة" >الزوايدة</option>
                        <option vlaue="المصدر" >المصدر</option>
                        <option vlaue="وادي السلقا" >وادي السلقا</option>
                        <option vlaue="خان يونس" >خان يونس</option>
                        <option vlaue="مخيم خان يونس" >مخيم خان يونس</option>
                        <option vlaue="بني سهيلا" >بني سهيلا</option>
                        <option vlaue="القرارة" >القرارة</option>
                        <option vlaue="حمد" >حمد</option>
                        <option vlaue="عبسان الجديدة" >عبسان الجديدة</option>
                        <option vlaue="عبسان الكبيرة" >عبسان الكبيرة</option>
                        <option vlaue="خزاعة" >خزاعة</option>
                        <option vlaue="الفخاري" >الفخاري</option>
                        <option vlaue="رفح" >رفح</option>
                        <option vlaue="مخيم رفح" >مخيم رفح</option>
                        <option vlaue="النصر(البيوك)" >النصر(البيوك)</option>
                        <option vlaue="شوكة الصوفي" >شوكة الصوفي</option>
                      
                      
                    </select>
                    
                <div class="fv-plugins-message-container"></div></div>
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <label>{{ __('address') }}</label>
                    <input type="text" class="form-control form-control-solid form-control-lg" name="address"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                
                    <input type="hidden"  name="lat"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
            <div class="col-xl-6">
                <!--begin::Input-->
                <div class="form-group fv-plugins-icon-container">
                    <input type="hidden"  name="lng"  >
                    
                <div class="fv-plugins-message-container"></div></div>
                <!--end::Input-->
            </div>
           
           
        </div>


    </div>
    <!--end: Wizard Step 2-->
        
                                <!--begin::Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('extra info') }}</h4>
                                    <!--begin::Select-->
                                    <div class="form-group row">
                                        <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('type') }}</label>
                                        <div class="col-lg-9 col-md-9 col-sm-12">
                                            <select class="form-control" name="type">
                                                <option value="">{{ __('select') }}</option>
                                                <option value="food"  
                                                 >{{ __('food') }}</option>
                                                <option value="education">{{ __('education') }}</option>
                                                <option value="health">{{ __('health') }}</option>
                                                
                                            </select>
                                          
                                        </div>
                                    </div>

                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('phone number') }}</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="phone"
                                      
                                        placeholder="0591234567" >
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label >{{ __('languge') }}</label>
                               
                                        <select class="form-control" name="locale">
                                            <option value="">{{ __('select') }}</option>
                                            <option  value="ar">العربية</option>
                                            <option  value="en">English</option>
                                         
                                            
                                        </select>
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">{{ __('working days') }}</label>
                                        <div class="col-9 col-form-label">
                                            <div class="checkbox-inline">
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="saturday"/>
                                                    <span></span>
                                                    {{ __('saturday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="sunday"/>
                                                    <span></span>
                                                    {{ __('sunday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="monday"/>
                                                    <span></span>
                                                    {{ __('monday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="tuesday"/>
                                                    <span></span>
                                                    {{ __('tuesday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="wednesday"/>
                                                    <span></span>
                                                    {{ __('wednesday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="thursday"/>
                                                    <span></span>
                                                    {{ __('thursday') }}
                                                </label>
                                                <label class="checkbox checkbox-outline checkbox-dark">
                                                    <input type="checkbox" name="workingDays[]" value="friday"/>
                                                    <span></span>
                                                    {{ __('friday') }}
                                                </label>
                                                
                                            </div>
                                        
                                        </div>
                                    </div>

                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('start time') }}</label>
                                        <input type="time" class="form-control form-control-solid form-control-lg" name="start_time" 
                                   
                                       >
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('end time') }}</label>
                                        <input type="time" class="form-control form-control-solid form-control-lg" name="end_time" 
                                      
                                       >
                                        
                                    <div class="fv-plugins-message-container"></div></div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{ __('description') }}</label>
                                      
                                        <textarea class="form-control form-control-solid form-control-lg" name="description" id="" cols="30" rows="10">

                                            
                                        </textarea>
                                    <div class="fv-plugins-message-container"></div></div>
                                    <!--end::Select-->
        
                                    <!--begin::Select-->

                                    <!--end::Select-->
        
                                    <!--begin::Select-->

                                    <!--end::Select-->
                                </div>
                                <!--end::Wizard Step 3-->
        
                                <!--begin::Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('all inputs are ready to store , please submit the form') }}</h4>
                                
        
                 
                       
                                </div>
                                <!--end::Wizard Step 4-->
        
 
        
                                <!--begin::Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                            {{ __('previous') }}
                                        </button>
                                    </div>
                                    <div>
                                        <button id="submitBtn" type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                            {{ __('submit') }}
                                        </button>
                                        <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">
                                            {{ __('next') }}
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

