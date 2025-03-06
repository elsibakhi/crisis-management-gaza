<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale()=="ar") dir="rtl" @else dir="ltr" @endif >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('assets/css/crisis_management/error/style.css')}}">
    </head>
    <body >


        <div id="notfound">
            <div class="notfound">
                <div class="notfound-404">
                    <div></div>
                    <h1>@yield('code')</h1>
                </div>
                <h2>@yield('title')</h2>
                <p>@yield('message')</p>
                <a href="/">{{__('home page')}}</a>
            </div>
        </div>






    </body>
</html>
