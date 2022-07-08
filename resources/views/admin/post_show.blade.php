{{-- página que mostra os livros existentes e possibilidade de adicionar novos, editar ou apagar os existentes--}}

@extends('admin.layout.app')

@section('heading1', 'Livros')

@section('btn_link', route('admin_post_create'))
@section('btn_text', 'Adicionar livro')

@section('main_content')
<a href="{{ route('admin_home') }}" class="btn btn-plus m-3 "><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>Voltar</a>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Foto</th>
                                        <th>Título</th>
                                        <th>Autor</th>
                                        <th>ISBN</th>
                                        <th>Qtd</th>
                                        <th>Subcategoria</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($all_posts as $post)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $post->post_photo) }}" alt=""
                                                    style="height:150px;">
                                            </td>
                                            <td>{{ $post->post_title }}</td>
                                            <td>{{ $post->author }}</td>
                                            <td>{{ $post->ISBN }}</td>
                                            <td>{{ $post->qtd }}</td>
                                            <td>{{ $post->rSubCategory->category_name }}</td>
                                            
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_post_edit', $post->id) }}"
                                                    class="btn btn-warning"><i class="fa fa-pen mr-2" aria-hidden="true"></i>Editar</a>
                                                <a href="{{ route('admin_post_delete', $post->id) }}"
                                                    class="btn btn-danger"
                                                    onClick="return confirm('Tem a certeza que quer apagar o registo?');"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Apagar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection