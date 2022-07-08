{{-- página para criar novo livro --}}

@extends('admin.layout.app')

@section('heading1', 'Adicionar livro')

@section('btn_link', route('admin_home'))
@section('btn_text', 'Voltar')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_post_create_submit') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Título</label>
                                <input type="text" class="form-control" name="post_title">
                            </div>
                            <div class="form-group mb-3">
                                <label>Autor</label>
                                <input type="text" class="form-control" name="author">
                            </div>
                            <div class="form-group mb-3">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="ISBN">
                            </div>
                            <div class="form-group mb-3">
                                <label>Qtd</label>
                                <input type="text" class="form-control" name="qtd">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sinopse</label>
                                <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Subcategoria</label>
                                <select class="form-control" name="sub_category_id">
                                    <option value="selecione">Selecione</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->category_name }}
                                            ({{ $sub_category->rCategory->category_name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Foto *</label>
                                <div><input type="file" name="post_photo"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection