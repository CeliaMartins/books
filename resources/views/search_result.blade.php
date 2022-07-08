{{-- página com o resultado da pesquisa --}}

@extends('layout.app')
@section('page_title', 'Publicações')
@section('main_content')

<div class="container">

<h1 class="text-center" style="margin:3rem">Resultado da pesquisa</h1>
<div class="row">
<div class="col-12">    
    <div class="card">
        @foreach ($all_posts as $post)
        <div class="card-body">
                                             
            <h5>{{ $post->post_title }}</h5>
            <p><img src="{{ asset('uploads/' . $post->post_photo) }}" alt="" style="height:200px;"></a></p>
            <p><b>Autor</b> {{ $post->author }}<br>
            <b>ISBN</b> {{ $post->ISBN }}</p>
            <a href="{{ route('book_details', $post->id) }}">ver mais</a>
                    
        </div>
        @endforeach
    </div>

    {{-- mensagem quando não existe resultado de pesquisa --}}
    @forelse($all_posts as $post)
    @empty
    Não foram encontrados resultados
    @endforelse
    
</div>
<a href="{{ route('book_list') }}" class="mt-4" style="font-size: 1.1rem;">voltar à lista</a>
</div>

    {{-- Resultado da pesquisa --}}
    @if (isset($filters))
        {{ $all_posts->appends($filters)->links() }}
    @else
        {{ $all_posts->links() }}
    @endif
    
</div>
@endsection
