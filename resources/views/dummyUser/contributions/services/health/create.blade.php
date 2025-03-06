@extends('dummyUser.contributions.services.layouts.create')

 @section('additional_info_step')

        <!--begin: Wizard Step 3-->
        <div class="pb-5" data-wizard-type="step-content">
            <input type="hidden" name="service_type" value="health"    />

                <h4 class="mb-10 font-weight-bold text-dark">{{ __('select services type') }}</h4>
                <!--begin::Select-->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('type') }}</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control" name="type">
                            <option value="">{{ __('select') }}</option>
                            <option value="hospital"  
                             >{{ __('hospital') }}</option>
                            <option value="medical_point">{{ __('medical point') }}</option>
                            <option value="clinic">{{ __('clinic') }}</option>
                            <option value="pharmacy">{{ __('pharmacy') }}</option>
                            
                        </select>
                      
                    </div>
                </div>
    
    
                <div class="alert alert-custom alert-notice alert-light-info fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-light"></i></div>
                    <div class="alert-text">{{ __('if you need to add another field , press') }}  <span class="label label-dark label-inline ">Enter</span> {{ __('after fill the input') }}</div>
          
                </div>
                <div id="inputFields3">
                    <div class="input-container3 form-group fv-plugins-icon-container">
                        <label>{{ __('fields') }}</label>
                        <input name="fields[][name]" class="  form-control form-control-solid form-control-lg m-2" type="text"  onkeydown="handleKeyDown(event,'inputFields3',3,'field')" onfocus="handleFocus(event,'inputFields3',3)">
                        <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
    
     
    
    
    
    
    </div>
    <!--end: Wizard Step 3-->
    
 @endsection


 @prepend('scripts')

 <script>
    let  service_type ="health";
 </script>
 @endprepend