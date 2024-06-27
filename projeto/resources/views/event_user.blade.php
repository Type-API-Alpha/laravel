@extends('layout')
@section('title', 'Eventos do usuário')
@section('content')
    <button>Criar evento</button>
    <div>
        <h1 class="text-center">Meus eventos</h1>
        @if($myEvents->isEmpty())
            <p>Você não possui nenhum evento.</p>
        @else
            <section class="d-flex container gap-3">
                @foreach ($myEvents as $event)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 30)  }}</p>
                            <a href="#" class="btn btn-primary"e>Editar Evento</a>
                        </div>
                    </div>
                @endforeach
            </section>
        @endif
    </div>

    <div class="mt-3">
        <h1 class="text-center">Eventos que participo</h1>
        <section class="d-flex container gap-3">
            <section class="d-flex container gap-3">
                @foreach ($eventsIn as $event)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ Str::limit($event->description, 30)  }}</p>
                            <a href="#" class="btn btn-primary"e>Detalhes</a>
                            <a href="#" class="btn btn-danger"e>Sair</a>
                        </div>
                    </div>
                @endforeach
        </section>
    </div>

@endsection
