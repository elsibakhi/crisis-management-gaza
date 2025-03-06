@extends('dummyUser.contributions.services.layouts.create')

 @section('additional_info_step')

        <!--begin: Wizard Step 3-->
        <div class="pb-5" data-wizard-type="step-content">

                    <input type="hidden" name="service_type" value="food"   />
      
                <h4 class="mb-10 font-weight-bold text-dark">{{ __('select services type') }}</h4>
                <!--begin::Select-->
                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12">{{ __('type') }}</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <select class="form-control" name="type">
                            <option value="">{{ __('select') }}</option>
                            <option value="food_parcel"  
                             >{{ __('food parcel') }}</option>
                            <option value="cooking">{{ __('cooking') }}</option>
                            <option value="flour">{{ __('flour') }}</option>
                            <option value="gas">{{ __('gas') }}</option>
                            
                        </select>
                      
                    </div>
                </div>
      
    
    
    
    </div>
    <!--end: Wizard Step 3-->
    
 @endsection


@prepend('scripts')
<script>
   
  
   let  service_type ="food";
</script>
@endprepend