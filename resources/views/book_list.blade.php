{{-- página das publicações / Lista de livros --}}

@extends('layout.app')
@section('page_title', 'Publicações')
@section('main_content')

<div class="section-body">
<div class="container">  

{{-- Pesquisa --}}
<form action="{{ route('search') }}" method="post" class="mt-5 d-flex">
    @csrf
    <div class="form-group mb-3 d-flex">
        <input type="text" class="form-control" name="search" placeholder="Pesquisar">
        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i></button>
    </div>
</form>

{{-- Lista de livros --}}
    <h1 class="text-center" style="margin:3rem">Lista de livros</h1>
    <div class="row">
        <div class="col-12">    
            <div class="card">
                @foreach ($all_posts as $post)
                <div class="card-body">
                                                     
                    <h5>{{ $post->post_title }}</h5>
                    <p><img src="{{ asset('uploads/' . $post->post_photo) }}" alt="" style="height:200px;"></a></p>
                    <p><b>Autor</b> {{ $post->author }}<br>
                    <b>ISBN</b> {{ $post->ISBN }}</p>
                    <a href="{{ route('book_details', $post->id) }}">ver mais</a>  {{-- caminho para o detalhe --}}
                            
                </div>
                @endforeach
            </div>
        </div>
    </div>
{{-- Paginação --}}
{{ $all_posts->links() }}
</div>
</div>

@endsection