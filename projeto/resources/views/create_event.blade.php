@extends('layout')
@section('title', 'Página de Cadastro de Evento')

@section('content')

    <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
        <form class="container p-3 rounded text-center bg-secondary w-25 h-auto" method="POST" action="{{ route('create.event') }}">
            @csrf

            <legend class="text-light">Cadastro de evento</legend>
            <div class="mb-3">
                <input class="form-control" name="title" type="text" placeholder="Título" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="description" type="email" placeholder="Descrição">
            </div>
            <div class="mb-3">
                <input class="form-control" name="init_date" type="date" placeholder="Data de início" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="end_date" type="date" placeholder="Data de final" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="max_participants" type="number" placeholder="Quantidade máxima de participantes">
            </div>
            <div class="mb-3">
                <input class="form-control" name="price" type="number" placeholder="Valor da entrada" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="price" type="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>

@endsection
