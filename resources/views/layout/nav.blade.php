<div class="top">
    <div class="top-nav" style="background-color:#3abdc4"><a href="{{ route('home') }}">
        <img alt="image" src="{{ asset('backend/img/book_logo.png') }}" style="height:70px;margin:20px"></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">{{ date('d/m/Y') }}</li>
                    <li class="email-text">contact@biblioteca.com</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    <li class="menu"><a href="{{ route('home') }}">Home</a></li>
                    <li class="menu"><a href="">Sobre nós</a></li>
                    <li class="menu"><a href="{{ route('book_list') }}">Publicações</a></li>
                    <li class="menu"><a href="">Contactos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>