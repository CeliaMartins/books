{{-- criar nnova categoria --}}

@extends('admin.layout.app')

@section('heading1', 'Criar Categoria')

@section('btn_link', route('admin_home'))
@section('btn_text', 'Voltar')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_category_create_submit') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Categoria</label>
                                <input type="text" class="form-control" name="category_name">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submeter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection