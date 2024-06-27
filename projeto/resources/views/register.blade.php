@extends('layout')
@section('title', 'Página de Cadastro')
@section('body-class', 'custom-body-class')
@push('styles')
<style>
    .custom-body-class {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
@endpush

@section('content')

    <div>
        <form class="container p-3 rounded text-center bg-secondary" method="POST" action="{{ route('register') }}">
            @csrf
            <legend class="text-light">Cadastro</legend>
            <div class="mb-3">
                <input class="form-control" name="name" type="text" placeholder="Nome" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="email" type="email" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="password" type="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection
