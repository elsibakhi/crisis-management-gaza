
<div class="modal fade"  id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('select your location')}}</h5>
              
            </div>

            <!--begin::Form-->
            <form id="location_form" class="form" method="POST" action="{{ route('welcome.location.store.cookie') }}">
                @csrf
                <div class="modal-body">

                    <div class="card card-custom">
                    

                        <div class="card-body">
                            <div class="alert alert-secondary" role="alert">
                                {{__('if you want to use the automatic location service, give the location permission and then reload the page')}}
                            </div>
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__('region')}}</label>
                                <select name="region" class="form-control form-control-lg" id="exampleSelectl" data-gtm-form-interact-field-id="1">
                                    <option selected value="" >{{__('select the region')}}</option>
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

                            
                                <div class="form-group fv-plugins-icon-container">
                                    <label>{{__('address')}}</label>
                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address"  >
                                    
                                <div class="fv-plugins-message-container"></div></div>
                                <!--end::Input-->
                          
                    



                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{__('close')}}</button>
                    <button id="location_submut_btn" type="submit" class="btn btn-primary font-weight-bold">{{__('save changes')}}</button>
                </div>


            </form>
            <!--end::Form-->
        </div>






    </div>
</div>


@push('scripts')

<script src="{{ asset('assets/js/crisis_management/location/form.js') }}"></script>

@endpush