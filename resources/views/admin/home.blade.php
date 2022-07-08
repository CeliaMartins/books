{{-- Homepage do backoffice --}}

@extends('admin.layout.app')

@section('heading1', 'Gestão de livros')

@section('main_content')
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
        <div class="card-icon book rounded-circle"><a class="" href="{{ route('admin_post_show') }}">
            <i class="fas fa-book"></i></a>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4><a class="link-count" href="{{ route('admin_post_show') }}">Livros</a></h4>
            </div>
            <div class="card-body">
                <h1>{{ $all_posts->count() }}</h1>  {{-- mostra o total dos livros que existem na BD --}}
            </div>
        </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
          <div class="card-icon book rounded-circle"><a class="" href="{{ route('admin_category_show') }}">
              <i class="fas fa-tag"></i></a>
          </div>
          <div class="card-wrap">
              <div class="card-header">
                  <h4><a class="link-count" href="{{ route('admin_category_show') }}">Categorias</a></h4>
              </div>
              <div class="card-body">
                <h1>{{ $all_categories->count() }}</h1>  {{-- mostra total das categorias criadas --}}
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
        <div class="card-icon book rounded-circle"><a class="" href="{{ route('admin_subcategory_show') }}">
            <i class="fas fa-tags"></i></a>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4><a class="link-count" href="{{ route('admin_subcategory_show') }}">Subcategorias</a></h4>
            </div>
            <div class="card-body">
                <h1>{{ $all_sub_categories->count() }}</h1>  {{-- mostra total das subcategorias criadas--}} 
            </div>
        </div>
    </div>
</div>
</div>
<h4 class="mt-3">Últimas entradas</h4>
<div class="row justify-content-between flex-nowrap">
@foreach ($all_posts->take(4) as $post)   {{-- mostra os 4 últimos livros criados --}}
<div class="m-4">
    <p><b>{{ $post->rSubCategory->category_name }}</b><br>  {{-- nome da subcategoria --}}
        {{ $post->post_title }}</p>  {{-- titulo do livro --}}
    <img src="{{ asset('uploads/' . $post->post_photo) }}" alt="" style="height:200px;">  {{--  imagem  --}}
</div>
@endforeach
</div>
@endsection