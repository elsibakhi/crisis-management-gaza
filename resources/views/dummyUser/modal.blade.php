<!-- Modal-->
<div class="modal fade"  id="dummyUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('adding your data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>

            <!--begin::Form-->
            <form id="dummy_user_form" class="form" method="POST" action="{{ route('dummyUser.register') }}">
                @csrf
                <div class="modal-body">

                    <div class="card card-custom">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{__('client details')}}
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group form-group-last">
                                <div class="alert alert-custom alert-default" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                                    <div class="alert-text">
                                        {{__('this process is done only once')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{__('name')}}</label>
                                <input name="name" type="text" class="form-control form-control-solid"
                                     />
                            </div>
                            <div class="form-group">
                                <label>{{__('phone')}}</label>
                                <input name="phone" type="text" class="form-control form-control-solid"
                                     />
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{__('close')}}</button>
                    <button id="dummy_user_submut_btn" type="submit" class="btn btn-primary font-weight-bold">{{__('save changes')}}</button>
                </div>


            </form>
            <!--end::Form-->
        </div>






    </div>
</div>


@push('scripts')
<script>

</script>
<script src="{{ asset('assets/js/crisis_management/dummyUser/form.js') }}"></script>
@endpush
