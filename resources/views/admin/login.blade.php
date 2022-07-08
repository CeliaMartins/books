{{-- página de autenticação do admin --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('backend/img/favicon.png') }}">

    <title>Login | Books Management Panel</title>

    @include('admin.layout.styles')

    @include('admin.layout.scripts')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <section class="section">
                <div class="container container-login">
                    <div class="row">
                        <div
                            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            @if (session()->has('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="card card-primary border-box">
                                <div class="card-header card-header-auth">
                                    <h4 class="text-center">Iniciar sessão</h4>
                                </div>
                                <div class="card-body card-body-auth">
                                    <form method="POST" action="{{ route('admin_login_submit') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" placeholder="Email" value="{{ old('email') }}"
                                                autofocus>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Entrar
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <a href="{{ route('admin_forgot') }}">
                                                    Esqueceu-se da password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    @include('admin.layout.scripts_footer')

</body>

</html>