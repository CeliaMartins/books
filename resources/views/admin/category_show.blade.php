{{-- página que mostra as categorias existentes com possibilidade de criar novas, editar ou apagar as existentes--}}

@extends('admin.layout.app')

@section('heading1', 'Categorias')

@section('btn_link', route('admin_category_create'))
@section('btn_text', 'Adicionar categoria')

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
                                        <th>Categoria</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($all_categories as $category)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $category->category_name }}</td>
                                          
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_category_edit', $category->id) }}"
                                                    class="btn btn-warning"><i class="fa fa-pen mr-2" aria-hidden="true"></i>Editar</a>
                                                <a href="{{ route('admin_category_delete', $category->id) }}"
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