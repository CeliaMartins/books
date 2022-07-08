{{-- Homepage - frontend --}}

@extends('layout.app')

@section('page_title', 'Biblioteca')

@section('main_content')
<div class="container">
<div class="mt-5 mb-5">
    <h2 class="text-center"><a href="{{ route('book_list') }}">CONSULTA A LISTA DE LIVROS</a></h2>
    <h3 class="text-center">E VERIFICA SE ESTÁ DISPONÍVEL</h3>
    <h4 class="text-center">O QUE PRETENDES</h4>
</div>

<h1>Novidades</h1>
<div class="col-12">    
    <div class="card">
        @foreach ($all_posts as $post)
        <div class="card-body">
                                             
            <h5>{{ $post->post_title }}</h5>
            <p><img src="{{ asset('uploads/' . $post->post_photo) }}" alt="" style="height:200px;"></a></p>
            <p><b>Autor</b> {{ $post->author }}</p>
            
            <a href="{{ route('book_details', $post->id) }}">ver mais</a>
                    
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection