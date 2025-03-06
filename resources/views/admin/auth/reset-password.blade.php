@extends('layouts.admin.auth')
@section('title',__('reset password') )
@section('form')
    <!--begin::Signin-->
    <div class="login-form login-signin w-100">
        <!--begin::Form-->

        <form class="form" id="reset-password-form" method="POST" action="reset-password">
			@csrf
            <input type="hidden" name="token" value="{{request()->route('token')}}">
            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('reset password')}}</h3>
              
            </div>
            <!--begin::Title-->

            <!--begin::Form group-->
            <div class="form-group " >
		
				
                <input class="form-control form-control-solid h-auto py-5 px-6 rounded-lg border-0" type="hidden"
                    name="{{ config('fortify.username') }}" id="email" autocomplete="off" value={{request()->query("email")}} />
            </div>
            <!--end::Form group-->

            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{__('password')}}</label>

               
                </div>
                <input class="form-control form-control-solid h-auto py-5 px-6 rounded-lg border-0" type="password"
                    name="password" autocomplete="off" />
            </div>
            <!--end::Form group-->

            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{__('confirmed password')}}</label>

               
                </div>
                <input class="form-control form-control-solid h-auto py-5 px-6 rounded-lg border-0" type="password"
                    name="password_confirmation" autocomplete="off" />
            </div>
            <!--end::Form group-->

            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="reset-password-form-btn"
                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('sign in')}}</button>

            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
@endsection

