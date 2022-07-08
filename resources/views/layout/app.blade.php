<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
        <meta name="description" content="">
        <title>@yield('page_title')</title>        
		
        <link rel="icon" type="image/png" href="{{ asset('backend/img/book_favicon.png') }}">

    @include('layout.styles')

    @include('layout.scripts')

    </head>

    <body>

        @include('layout.nav')

        @yield('main_content')

        @include('layout.footer')
                
        @include('layout.scripts_footer')

    </body>
    
</html>