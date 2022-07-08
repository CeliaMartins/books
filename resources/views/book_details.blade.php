{{-- página de detalhe do livro --}}

@extends('layout.app')

@section('page_title', 'Publicações | Detalhe')

@section('main_content')

<div class="page-content">
    <div class="container">
        <div class="row">
            <h2 class="mt-5 mb-5">{{ $post->post_title }}</h2>
   
            <div class="col-lg-6 featured-photo">
                <img src="{{ asset('uploads/' . $post->post_photo) }}" alt="" style="width: 300px">
            </div>

            <div class="col-lg-6"> 
                <div class="item">
                    <p><b><i class="fas fa-tag"></i></b>
                    {{ $post->rsubCategory->category_name }}</p>
                </div>
                <div class="item">
                    <b>Autor</b> {{ $post->author }}
                </div>
                 <div class="item">
                    <b>ISBN</b> {{ $post->ISBN }}
                </div>
                <div class="main-text mt-4">
                    <b>Sinopse</b>
                    {!! $post->post_detail !!}
                </div>
            </div>

            <div class="sub">
                <div class="item" style="color:green">    
                    @if($post->qtd)
                    LIVRO DISPONÍVEL 
                    @endif
                </div>
                <div class="item" style="color:red">  
                    @if(!$post->qtd)
                    LIVRO INDISPONÍVEL 
                    @endif
                </div>
                <div class="item">
                    <b><i class="fas fa-clock"></i></b>
                    @php
                        $ts = strtotime($post->updated_at);
                        $updated_date = date('d M Y');
                    @endphp
                    {{ $updated_date }}
                </div>
                <div class="item">
                    <b><i class="fas fa-user"></i></b>
                    {{ $user_data->name }}
                </div>             
            </div>

        </div>
    </div>
</div>
@endsection