@extends('layouts.admin.auth')
@section('title', __('login'))
@section('form')
    <!--begin::Signin-->
    <div class="login-form login-signin w-100">
        <!--begin::Form-->

        <form class="form" id="login-form" method="POST" action="{{ route('login') }}">
			@csrf
            <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('sign in')}}</h3>
              
            </div>
            <!--begin::Title-->

            <!--begin::Form group-->
            <div class="form-group">
				<label class="font-size-h6 font-weight-bolder text-dark">
					{{__('email')}} 
				</label>
				
                <input class="form-control form-control-solid h-auto py-5 px-6 rounded-lg border-0" type="text"
                    name="{{ config('fortify.username') }}" id="email" autocomplete="off" />
            </div>
            <!--end::Form group-->

            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5">{{__('password')}}</label>

                    <a href="{{ route('password.request') }}"
                        class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">
                       {{__('forgot password ?')}}
                    </a>
                </div>
                <input class="form-control form-control-solid h-auto py-5 px-6 rounded-lg border-0" type="password"
                    name="password" autocomplete="off" />
            </div>
            <!--end::Form group-->

            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="login-form-btn"
                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('sign in')}}</button>

            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
@endsection

