
<div class="modal fade"  id="opinionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> {{__('add your opinion')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <!--begin::Form-->
            <form id="opinions_form" class="form" method="POST" action="{{ route('opinion.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="card card-custom">
                    

                        <div class="card-body">
                            <div class="form-group form-group-last">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        {{__('you can give your opinion on our site only once')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__('opinion')}}</label>
                                <textarea name="opinion" class="form-control form-control-solid form-control-lg" rows="3"></textarea>
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <div class="form-group fv-plugins-icon-container">
                                <input type="hidden" id="ratingInput" class="form-control form-control-solid form-control-lg" name="rating"  />
                     
                                <label>{{__('rating')}}</label>
                                <span class="fa fa-star" data-value="1"></span>
                                <span class="fa fa-star" data-value="2"></span>
                                <span class="fa fa-star" data-value="3"></span>
                                <span class="fa fa-star" data-value="4"></span>
                                <span class="fa fa-star" data-value="5"></span>
                                
                            <div class="fv-plugins-message-container"></div></div>



                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{__('close')}}</button>
                    <button id="opinions_submut_btn" type="submit" class="btn btn-primary font-weight-bold">{{__('save changes')}}</button>
                </div>


            </form>
            <!--end::Form-->
        </div>






    </div>
</div>


@push('scripts')
<script>
    let dummyUserCheckRoute ="{{route('dummyUser.check')}}" ;
</script>
<script src="{{ asset('assets/js/crisis_management/opinions/form.js') }}"></script>
<script src="{{ asset('assets/js/crisis_management/opinions/stars.js') }}"></script>
@endpush