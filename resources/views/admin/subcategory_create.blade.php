{{-- criar subcategoria --}}

@extends('admin.layout.app')

@section('heading1', 'Criar subcategoria')

@section('btn_link', route('admin_home'))
@section('btn_text', 'Voltar')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_subcategory_create_submit') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Subcategoria</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Pertence à categoria</label>
                                <select class="form-control" name="category_id">
                                    <option value="selecione">Selecione</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
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