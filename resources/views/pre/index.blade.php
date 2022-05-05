@extends('layouts.pre')
@section('content')
    <div class="main-logo">
        <div class="logo">
            <img src="{{ asset('pre/img/logo.svg') }}" alt="">
        </div>
    </div>
    <div class="main-form">
        <div class="text-center text">
            <h2>Pré-Cadastro empresas</h2>
        </div>
        <div class="container my-5">
            <form method="post" action="{{ route('pre.store') }}">
                @csrf
                <div class="form-group my-4">
                    <input type="text" name="empresa" class="form-control" placeholder="Nome da Empresa">
                </div>
                <div class="form-group my-4">
                    <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Whatsapp com DDD">
                </div>
                <div class="form-group my-4">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group my-4">
                    <input type="text" name="nome" class="form-control" placeholder="Nome do Responsável">
                </div>
                <div>
                    <button type="submit" class="btn btn-cadastro">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
