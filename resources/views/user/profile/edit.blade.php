@extends('layouts.admin.master')
@section('title')
{{__("edit profile")}}
@endsection
@push('style')

    @if (app()->getLocale()=="ar")

    
    
   
    <link href="{{ asset('assets/css/pages/wizard/wizard-2-rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/leaflet/leaflet-rtl.bundle.css')}}" rel="stylesheet" type="text/css"/>
   
    @else
   
    <link href="{{ asset('assets/css/pages/wizard/wizard-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/leaflet/leaflet.bundle.css')}}" rel="stylesheet" type="text/css"/>
  
  
        @endif


@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('user.profile.edit',[$user->id]) }}" class="text-muted mr-2">{{__("profile")}}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted mr-2">{{__("edit")}} {{ $user->name }} {{__("profile")}}</a>
    </li>
@endsection
@section('content')
<div class="d-flex flex-row w-100">

	<!--end::Aside-->
	<!--begin::Content-->
	<div class="flex-row-fluid ml-lg-8 ">
        	<!--begin::Form-->
		<form id="profile_form" class="form" method="post" action="{{route('user.profile.update')}}" >
            @csrf
            @method("PUT")
		<!--begin::Card-->
		<div class="card card-custom card-stretch ">
			<!--begin::Header-->
			<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">{{__("profile information")}}</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">{{__("update your profile informaiton")}}</span>
                </div>
				<div class="card-toolbar">
					<button id="btn_submit" type="submit" class="btn btn-success mr-2">{{__("save changes")}}</button>
				
				</div>
			</div>
			<!--end::Header-->

		
				<!--begin::Body-->
				<div class="card-body">

					<div class="form-group row">
						<label class="col-xl-3 col-lg-3 col-form-label">{{__("logo")}}</label>
						<div class="col-lg-9 col-xl-6 form-group fv-plugins-icon-container">
							<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{asset('assets/media/users/blank.png')}})">
                                <div class="image-input-wrapper" style="background-image:@if($user->profile?->logo)url({{asset('storage/'.$user->profile?->logo)}})@endif
                                
                                "></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="{{__('Change avatar')}}">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" >
        							<input type="hidden" name="profile_avatar_remove">
                                </label>

        						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="{{__('Cancel avatar')}}">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="{{__('Remove avatar')}}">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">{{__("allowed file types:")}}  png, jpg, jpeg.</span>
						</div>
					</div>

                    <div class="row">


                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label class="col-xl-3 col-lg-3 col-form-label">{{__("name")}}</label>
                               
                                    <input name="name" class="form-control form-control-lg form-control-solid" type="text" value="{{$user->name}}">
                                
                            </div>
                   
                        </div>
                    </div>



            
            

                  

                    
					<div class="row">
				

    
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__("email address")}}</label>
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{$user->email}}" placeholder="Email">
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>
                        <div class="col-xl-6">

                            <!--begin::Input-->
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__("phone number")}}</label>
                                <input type="text" name="phone" class="form-control form-control-lg form-control-solid" value="{{$user->profile->phone}}" >
                                
                            <div class="fv-plugins-message-container"></div></div>
                            <!--end::Input-->
                        </div>

    
					</div>
                    
					<div class="row">
				
        
    
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label >{{__("languge")}}</label>
                               
                                    <select class="form-control" name="locale">
                                        <option value="">{{__("select")}}</option>
                                        <option @selected($user->profile->locale=="ar") value="ar">العربية</option>
                                        <option @selected($user->profile->locale=="en") value="en">English</option>
                                     
                                        
                                    </select>
                                  
                             
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <!--begin::Input-->
                            <div class="form-group fv-plugins-icon-container">
                                <label >{{__("theme")}}</label>
                               
                                    <select class="form-control" name="theme">
                                        <option value="">{{__("select")}}</option>
                                        <option @selected($user->profile->theme=="dark") value="dark">{{__("dark")}}</option>
                                        <option @selected($user->profile->theme=="light") value="light">{{__("light")}}</option>
                                     
                                        
                                    </select>
                                  
                             
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
     

    
					</div>
        

			

                    
       
            

				</div>
				<!--end::Body-->
                
		</div>
    </form>
    <!--end::Form-->
        	<!--begin::Form-->
		<form id="change_password_form" class="form" method="post" action="{{route('user.profile.password.update')}}" >
            @csrf
            @method("PUT")
		<!--begin::Card-->
		<div class="card card-custom card-stretch ">
			<!--begin::Header-->
			<div class="card-header py-3">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label font-weight-bolder text-dark">{{__("password changing")}}</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">{{__("update your account password")}}</span>
                </div>
				<div class="card-toolbar">
					<button id="change_password_btn" type="submit" class="btn btn-danger mr-2">{{__("save changes")}}</button>
				
				</div>
			</div>
			<!--end::Header-->

		
				<!--begin::Body-->
				<div class="card-body">


        

                <div class="row p-5">
                    <div class="col-xl-6">

                        <!--begin::Input-->

                        <div class="form-group fv-plugins-icon-container">
                            <label>{{__("new password")}}</label>
                            <input type="password" class="form-control form-control-solid form-control-lg" name="password"  >
                           
                        <div class="fv-plugins-message-container"></div></div>
                        <!--end::Input-->
                    </div>
                    <div class="col-xl-6">
                        <!--begin::Input-->
                        <div class="form-group fv-plugins-icon-container">
                            <label>{{__("confirmed password")}}</label>
                            <input type="password" class="form-control form-control-solid form-control-lg" name="password_confirmation"  >
                          
                        <div class="fv-plugins-message-container"></div></div>
                        <!--end::Input-->
                    </div>
                </div>
			

                    
       
            

				</div>
				<!--end::Body-->
                
		</div>
    </form>
    <!--end::Form-->
	</div>
	<!--end::Content-->
</div>

<div class="modal fade" id="checkPasswprdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="vaildate"></div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("password check")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">


                <div class="card card-custom">

                    <!--begin::Form-->
                    <form id="check_password_form" class="form" action="{{ route('user.check.password') }}" method="GET"> 
                        <h3 class="card-label font-weight-bolder text-dark">
                            {{__("enter your password to complete the operation")}}
                        </h3>
                        <div class="card-body">

        
                            <div class="form-group fv-plugins-icon-container">
                                <label>{{__("password")}}</label>
                                <input type="password" class="form-control form-control-solid form-control-lg" name="password"  >
                                
                            <div class="fv-plugins-message-container"></div></div>
                     

                        

                     
                           
                        </div>
                        <div class="modal-footer">
                         
                            <button id="check_password_btn" type="submit"
                                class="btn btn-danger font-weight-bold">{{__("submit")}}</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>








            </div>
        </div>
    </div>






@endsection

@push('scripts')
<script>
    home_route="/";
</script>
<script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
<script src="{{ asset('assets/js/crisis_management/profile/form.js') }}"></script>




@endpush
