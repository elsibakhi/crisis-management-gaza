@extends('dummyUser.contributions.services.layouts.create')

 @section('additional_info_step')

        <!--begin: Wizard Step 3-->
        <div class="pb-5" data-wizard-type="step-content">

            <input type="hidden" name="service_type" value="education" />
    
                <h4 class="mb-10 font-weight-bold text-dark">{{ __('select service status') }}</h4>
                <!--begin::Select-->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('status') }}</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control" name="status" id="costSelection" onchange="toggleCostField()" >
                            <option value="">{{ __('select') }}</option>
                            <option value="charged"  
                             >{{ __('charged') }}</option>
                            <option value="free">{{ __('free') }}</option>
                            
                            
                        </select>
                      
                    </div>
                </div>
    
                <div id="costField" style="display: none;" class="form-group fv-plugins-icon-container">
                    <label>{{ __('cost') }}</label>
                    <input  type="number" class="form-control form-control-solid form-control-lg" name="cost"
                  
                    placeholder="200" value="0" >
                    
                <div class="fv-plugins-message-container"></div></div>
    
    
            
    
                <div class="alert alert-custom alert-notice alert-light-info fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-light"></i></div>
                    <div class="alert-text"> {{ __('if you need to add another specialization or target , press') }} <span class="label label-dark label-inline ">Enter</span> {{ __('after fill the input') }}</div>
          
                </div>
                <div id="inputFields1">
                    <div class="input-container1 form-group fv-plugins-icon-container">
                        <label>{{ __('specializations') }}</label>
                        <input name="specializations[][name]" class="  form-control form-control-solid form-control-lg m-2" type="text" 
                        onkeydown="handleKeyDown(event,'inputFields1',1,'specialization')" 
                       
                        onfocus="handleFocus(event,'inputFields1',1)"
                        >
                        <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
                <div id="inputFields2">
                    <div class="input-container2 form-group fv-plugins-icon-container">
                        <label>{{ __('targets') }}</label>
                        <input name="targets[][name]" class="  form-control form-control-solid form-control-lg m-2" type="text"  onkeydown="handleKeyDown(event,'inputFields2',2,'target')" onfocus="handleFocus(event,'inputFields2',2)">
                        <div class="fv-plugins-message-container"></div>
                    </div>
                </div>
            
    
        
    
    
    
    
    </div>
    <!--end: Wizard Step 3-->
    
 @endsection


 @prepend('scripts')

 <script>
    let  service_type ="education";




    
 </script>
 @endprepend