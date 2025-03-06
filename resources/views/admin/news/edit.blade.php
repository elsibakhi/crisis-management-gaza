@extends('layouts.admin.master')
@section('title')
 {{ __('edit a news') }}
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
        <a href="{{ route('news.index') }}" class="text-muted mr-2">{{ __('news') }}</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a class="text-muted mr-2">{{ __('edit') }} {{ $news->title }}</a>
    </li>
@endsection
@section('content')
    <div class=" col-12 ">
        <div class="card card-custom">

            <!--begin::Form-->
            <form id="news_form" class="form" action="{{ route('news.update', $news->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="card-body">

          
                    <div class="form-group fv-plugins-icon-container">
                        <label>{{ __('title') }}</label>
                        <input type="text" value="{{$news->title}}" name="title" class="form-control form-control-solid form-control-lg"
                        />
                        
                    <div class="fv-plugins-message-container"></div></div>
                    <div class="form-group fv-plugins-icon-container">
                        <label>{{ __('the news') }}</label>
                        <textarea name="news" rows="10" class="form-control form-control-solid form-control-lg"
                        >{{$news->news}}</textarea>
                        
                    <div class="fv-plugins-message-container"></div></div>

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
          news_url: "{{ route('news.index') }}"
        }
    </script>

<script src="{{ asset('assets/js/crisis_management/news/form.js') }}"></script>
@endpush
