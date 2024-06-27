@extends('layout')
@section('title', 'Página de Cadastro de Evento')

@section('content')

    <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
        <form class="container p-3 rounded text-center bg-secondary w-25 h-auto" method="POST" action="{{ route('edit.event', $event) }}">
            @method('PUT')
            @csrf

            <legend class="text-light">Editar evento</legend>
            <div class="mb-3">
                <input class="form-control" name="title" type="text" placeholder="Título" required value="{{ $event->title }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="description" type="text" placeholder="Descrição" value="{{ $event->description }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="init_date" type="date" placeholder="Data de início" required value="{{ $event->init_date }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="end_date" type="date" placeholder="Data de final" required value="{{ $event->end_date }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="max_participants" type="number" placeholder="Quantidade máxima de participantes" required value="{{ $event->max_participants }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="price" type="number" placeholder="Valor da entrada" required value="{{ $event->entry_price }}">
            </div>
            <div class="mb-3">
                <input class="form-control" name="image" type="file" value="{{ $event->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

@endsection
