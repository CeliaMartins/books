<div class="navbar-bg"></div>

<a href="{{ route('home') }}" target="_blank" style="color:#fff;font-size: 1.1rem;font-weight:bold"><img alt="image" src="{{ asset('backend/img/book_logo.png') }}" style="height:70px;margin:20px">BIBLIOTECA

<nav class="navbar navbar-expand-lg main-navbar navbar-logo">
    
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('backend/img/celia.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ $admin->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin_profile', $admin->id) }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Perfil
                </a>
                <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </div>
        </li>
    </ul>
</nav>