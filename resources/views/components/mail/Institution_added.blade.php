


@extends("components.mail.layout.master",["locale"=>$institution->profile->locale])

@php
     $originalLocale = app()->getLocale();  // حفظ اللغة الأصلية

app()->setLocale($institution->profile->locale);  // تغيير اللغة مؤقتًا إلى الإنجليزية



@endphp

@section("heading")
{{__("Dear")." ".$institution->name." ,"}}
@endsection
@section("footer")
{{__("Thank you for choosing our platform!")}}
@endsection

@push("p")
        @include("components.mail.layout.p",["content"=>__("We would like to inform you that you added in our platform as institution")])
@endpush


@push("p")
        @include("components.mail.layout.p",["content"=>__("Your password is")." ".$password])
@endpush
@section("btn")
@include("components.mail.layout.btn",["title"=>__("Go to Login"),"href"=>route("login")])
@endsection






@php


app()->setLocale($originalLocale);  

@endphp







