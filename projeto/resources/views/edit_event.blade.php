@extends('layout')
@section('title', 'Edição de evento')

@section('content')
@include('components.header')
    <section class="vh-100 d-flex justify-content-center align-items-center flex-column" id="login-section">
        <form class="position-relative w-100 p-5 d-flex flex-column gap-3 justify-content-center align-items-center shadow rounded" style="max-width: 500px; max-height: fit-content; margin-top: 3rem;" enctype="multipart/form-data" method="POST" action="{{ route('edit.event', $event->id) }}">
            @csrf
            @method('PUT')
            <h3 class="fw-medium .text-body">Editar evento</h3>
            <div class="mb-1 w-100">
                <label for="input-title" class="form-label">Título: </label>
                <div id="container-input-title">
                    <input id="input-title" type="text" name="title" class="form-control rounded-pill" required value="{{ $event->title }}">
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-description" class="form-label">Descrição</label>
                <div id="container-input-description">
                    <input id="input-description" type="text" name="description" class="form-control rounded-pill" required value="{{ $event->description }}">
                </div>
            </div>
            <div class="mb-1 w-100 d-flex">
                <div class="col-6 pe-4">
                    <label for="input-init_date" class="form-label">Data de início </label>
                    <div id="container-input-init_date">
                        <input id="input-init_date" type="date" name="init_date" class="form-control  rounded-pill" required value="{{ $event->init_date }}">
                    </div>
                </div>
                <div class="col-6 ps-4">
                    <label for="input-end_date" class="form-label">Data de encerramento </label>
                    <div id="container-input-end_date">
                        <input id="input-end_date" type="date" name="end_date" class="form-control  rounded-pill" required value="{{ $event->end_date }}">
                    </div>
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-max_participants" class="form-label">Quantidade máxima de participantes </label>
                <div id="container-input-max_participants">
                    <input id="input-max_participants" type="number" name="max_participants" class="form-control  rounded-pill" required value="{{ $event->max_participants }}">
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-entry_price" class="form-label">Valor da entrada </label>
                <div id="container-input-entry_price">
                    <input id="input-entry_price" type="number" name="entry_price" class="form-control  rounded-pill" required value="{{ $event->entry_price }}">
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-image" class="form-label">Imagem principal do evento </label>
                <div id="container-input-image">
                    <input id="input-image" type="file" name="image" class="form-control  rounded-pill" value="{{ $event->event_image }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-4">Salvar</button>
        </form>
        <div>
            @if ( $errors->any() )
                <div class="alert alert-danger mt-5">
                    <ul style="list-style: none; margin: 0; padding: 0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <script>
                    const errorContainer = document.querySelector('.alert');
                    setTimeout(() => {
                        errorContainer.remove();
                    }, 6000);
                </script>
            @endif
        </div>

    </section>

@endsection
