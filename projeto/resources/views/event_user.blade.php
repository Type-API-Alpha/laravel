@extends('layout')
@section('title', 'Eventos do usuário')
@section('content')
@include('components/sidebar')
    <button>Criar evento</button>
    <div class="container" style="margin-left: 20rem">
        <h1 class="text-center">Meus eventos</h1>
        <div class="row">
            @if($myEvents->isEmpty())
                <p>Você não possui nenhum evento.</p>
            @else
                @foreach ($myEvents as $event)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card" style="min-height: 200px">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="card-title">{{ Str::limit($event->title, 30) }}</h6>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <a href="{{ route('form.edit.event', $event->id) }}" class="btn-detail btn btn-primary w-50 ">Editar Evento</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="mb-5">
            {{ $myEvents->links('custom.paginate') }}
        </div>
    </div>

    <div class="container" style="margin-left: 20rem">
        <h1 class="text-center">Eventos que faço parte</h1>
        <div class="row">
            @if($eventsIn->isEmpty())
                <p>Você não faz parte de nenhum evento.</p>
            @else
                @foreach ($eventsIn as $event)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card" style="min-height: 200px">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="card-title">{{ Str::limit($event->title, 30) }}</h6>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <div class="d-flex gap-5">
                                    <a href="#" class="btn-detail btn btn-primary w-50 ">Visualizar Evento</a>
                                    <a href="#" class="btn-detail btn btn-danger w-50 ">Sair do evento</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="mb-5">
            {{ $eventsIn->links('custom.paginate') }}
        </div>
    </div>

@endsection
