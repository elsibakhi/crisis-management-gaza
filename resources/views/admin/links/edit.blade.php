@extends('layouts.admin.master')
@section('title')
   {{ __('edit link') }}
@endsection
@push('style')
@if (app()->getLocale()=="ar")
<link href="{{ asset('assets/css/pages/wizard/wizard-1-rtl.css') }}" rel="stylesheet" type="text/css" />
@else
<link href="{{ asset('assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />

    @endif
   
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item text-muted">
        <a href="{{ route('link.index') }}" class="text-muted mr-2">{{ __('links') }}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted mr-2">{{ __('edit') }} {{ $link->title }}</a>
    </li>
@endsection
@section('content')
    <div class=" col-12 ">
        <div class="card card-custom">

            <!--begin::Form-->
            <form id="link_form" class="form" action="{{ route('link.update', $link->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-body">
                        <input type="hidden" name="link_id" value="{{$link->id}}">
                    <div class="form-group fv-plugins-icon-container">
                        <label>{{ __('title') }}</label>
                        <input type="text" name="title" class="form-control form-control-solid form-control-lg"
                            value="{{ $link->title }}" />

                        <div class="fv-plugins-message-container"></div>
                    </div>

                    <div class="form-group fv-plugins-icon-container">
                        <label>{{ __('link') }}</label>
                        <input type="text" name="uri" class="form-control form-control-solid form-control-lg"
                            placeholder="{{ __('www.example.com') }}" value="{{ $link->link }}" />

                        <div class="fv-plugins-message-container"></div>
                    </div>

                    <div class="form-group fv-plugins-icon-container">
                        <label>{{ __('description') }}</label>
                        <textarea name="description" class="form-control form-control-solid form-control-lg" rows="3">{{ $link->description }}</textarea>

                        <div class="fv-plugins-message-container"></div>
                    </div>

                    <button  type="submit" class="btn btn-primary font-weight-bold ">{{ __('update') }}</button>
                </div>
              
               
            </form>
            <!--end::Form-->
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var type = "Edit";
        const routes = {
          links_url: "{{ route('link.index') }}"
        }
    </script>

   <script src="{{ asset('assets/js/crisis_management/links/form.js') }}"></script>
@endpush
