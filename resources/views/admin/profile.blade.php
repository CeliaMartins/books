{{-- perfil do admin autenticado --}}

@extends('admin.layout.app')
@section('heading1', 'O meu perfil')
@section('btn_link', route('admin_home'))
@section('btn_text', 'Voltar')
@section('main_content')
    <div class="section-body">        
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <img alt="image" src="{{ asset('backend/img/celia.png') }}">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-6 col-12 mt-5">

                <p><b>Nome:</b> {{ $admin->name }}</p>
                <p><b>Email:</b> {{ $admin->email }}</p>
                <p><b>Telemóvel:</b> {{ $admin->phone }}</p>

            <hr>
           </div>       
        </div>
    </div>
@endsection