@extends('layout')

@section('content')
    <section id="event-detail" class="d-flex justify-content-center align-items-center " style="height: 100vh">
        <div class="h-75 d-flex shadow p-4" style="max-height: 600px">
            <div>
                <img class="rounded h-100" src={{ $event->event_image }} style=" max-width: 400px">
            </div>
            <div id="container-event-infos" class="p-4 d-flex flex-column gap-2">
                <h2 style="max-width: 250px">{{ $event->title }}</h2>
                <p style="max-width: 400px">{{ $event->description }}</p>
                <div>
                    <span class="d-block">Início: {{ $event->init_date }}</span>
                    <span>Final: {{ $event->end_date }}</span>
                </div>
                <span>Número máximo participantes: {{ $event->max_participants }}</span>
                <span class="d-block">Entrada: R$ {{ number_format($event->entry_price, 2, ',', '.') }}</span>
                <button class="btn btn-danger w-75 m-auto">Participar</button>
            </div>
        </div>
    </section>
@endsection