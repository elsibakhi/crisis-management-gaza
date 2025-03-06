@extends('layouts.guest.master')

@push('style')

@if (app()->getLocale()=="ar")
<link rel="stylesheet" href="{{asset('assets/css/pages/wizard/wizard-5-rtl.css')}}"/>
@else
<link rel="stylesheet" href="{{asset('assets/css/pages/wizard/wizard-5.css')}}"/>

    @endif

@endpush

@section('title')
  {{ __('link contribution') }}
@endsection

@section('content')


<div class="card card-custom container my-5 py-5">
    <div class="card-header">
		<h3 class="card-title">
			{{ __('add a link') }}
		</h3>
		
	</div>
    <!--begin::Form-->
    <form id="link_form" class="form" action="{{ route('contribution.link.store') }}" method="POST"> 
        @csrf
        <div class="card-body">

            <div class="form-group fv-plugins-icon-container">
                <label>{{ __('title') }}</label>
                <input type="text" name="title" class="form-control form-control-solid form-control-lg"
            />
                
            <div class="fv-plugins-message-container"></div></div>


            <div class="form-group fv-plugins-icon-container">
                <label>{{ __('justification') }}</label>
                <textarea name="justification" class="form-control form-control-solid form-control-lg" rows="3"></textarea>
                
            <div class="fv-plugins-message-container"></div></div>

            <div class="form-group fv-plugins-icon-container">
                <label>{{ __('link') }}</label>
                <input type="text" name="uri" class="form-control form-control-solid form-control-lg"
                placeholder="{{ __('example@gmail.com') }}" />
                
            <div class="fv-plugins-message-container"></div></div>
            <div class="form-group fv-plugins-icon-container">
                <label>{{ __('description') }}</label>
                <textarea name="description" class="form-control form-control-solid form-control-lg" rows="3"></textarea>
                
            <div class="fv-plugins-message-container"></div></div>
        
           
        </div>
    
            <button id="submit_btn" type="submit"
                class="btn btn-primary font-weight-bold">{{ __('add') }}</button>

    </form>
    <!--end::Form-->
</div>





@endsection


@push('scripts')
<script>
    routes ={ 
        'welcome_url' :"/" ,
        'dummyUserCheck' :"{{route('dummyUser.check')}}" 
    
    }
</script>
<script src="{{ asset('assets/js/crisis_management/contributions/links/form.js') }}"></script>

@endpush