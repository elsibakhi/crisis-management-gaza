@extends('layouts.admin.auth')
@section('title',__('forget password'))
@section('form')
<!--begin::Forgot-->
<form class="form" id="kt_login_forgot_form" method="post" action="forgot-password">
    <!--begin::Title-->
    @csrf
    <div class="pb-5 pb-lg-15">
        <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('forgotten password ?')}}</h3>
        <p class="text-muted font-weight-bold font-size-h4">{{__('enter your email to reset your password')}}</p>
    </div>
    <!--end::Title-->

    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-5 px-6 border-0 rounded-lg font-size-h6" type="email" placeholder="{{__('email@example.com')}}" name="email" autocomplete="off"/>
    </div>
    <!--end::Form group-->

    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap">
        <button type="submit" id="kt_login_forgot_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">{{__('submit')}}</button>
     
    </div>
    <!--end::Form group-->
</form>
<!--end::Forgot-->
@endsection
