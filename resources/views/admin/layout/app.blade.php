<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('backend/img/book_favicon.png') }}">

    <title>Books Management Panel</title>

    @include('admin.layout.styles')

    @include('admin.layout.scripts')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            
            @include('admin.layout.nav')

            <div class="main-content pl-4 pr-4">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('heading1')</h1>
                        <div class="ml-auto">
                            <a href="@yield('btn_link')" class="btn btn-primary btn-plus">
                            @yield('btn_text')</a>
                        </div>
                    </div>
                    @yield('main_content')
                </section>
            </div>

        </div>
    </div>

    @include('admin.layout.scripts_footer')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}'
                })
            </script>
        @endforeach
    @endif

    @if (session()->has('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session('success') }}'
            })
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ session('error') }}'
            })
        </script>
    @endif

</body>

</html>