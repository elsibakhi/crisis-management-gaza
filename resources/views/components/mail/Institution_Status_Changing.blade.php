

@extends("components.mail.layout.master",["locale"=>$institution->profile->locale])

@php
    $colors=[
        "accepted"=>"green",
        "rejected"=>"red",
        "pending"=>"gold",
];


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
        @include("components.mail.layout.p",["content"=>__("We would like to inform you that the status of your enrollment request has been updated to")." <strong style='color:$colors[$status]'> ".__($status)."</strong>"])
@endpush
@if ($status=="accepted")

@push("p")
        @include("components.mail.layout.p",["content"=>__("Please log in to the site to add useful services during the crisis.")])
@endpush
@section("btn")
@include("components.mail.layout.btn",["title"=>__("Go to Login"),"href"=>route("login")])
@endsection

@elseif($status=="rejected")
@push("p")
        @include("components.mail.layout.p",["content"=>__("We sincerely thank you for your attempt to join our platform. We truly appreciate your interest and the effort you have put into reaching out to us.")])
@endpush

@else
@push("p")
        @include("components.mail.layout.p",["content"=>__("Please stay tuned to your email for updates on the status of your request.")])
@endpush


@endif



@php


app()->setLocale($originalLocale);  

@endphp




