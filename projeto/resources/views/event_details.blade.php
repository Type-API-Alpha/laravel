@extends('layout')

@section('content')
<section id="event-detail" class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="h-75 d-flex shadow" style="max-height: 600px">
            <div>
                <img class="rounded h-100" src="{{ asset('storage/' . $event->event_image) }}" style="max-width: 400px">
            </div>
            <div id="container-event-infos" class="p-4 d-flex flex-column gap-2">
                <h2 style="max-width: 350px">{{ $event->title }}</h2>
                <p style="max-width: 400px">{{ $event->description }}</p>
                <div>
                    <span class="d-block">Início: {{ $event->init_date }}</span>
                    <span>Final: {{ $event->end_date }}</span>
                </div>
                <span class="d-block">Entrada: R$ {{ number_format($event->entry_price, 2, ',', '.') }}</span>

                @php
                    $previousUrl = parse_url(request()->headers->get('referer'));
                    $previousRouteName = ltrim($previousUrl['path'], '/');
                @endphp

                @if ($previousRouteName === 'home')
                    <div class="d-flex flex-column justify-content-end mt-5 gap-3 align-items-center">
                        @if ($soldOff)
                            <span id="span-soldOff" class="text-danger fw-bold mt-5" style="width: max-content">Ingresso esgotado</span>
                        @else
                            <div class="d-flex flex-column mt-5">
                                <form  action="{{ route('event.join', $event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" style="width: 20rem">Participar</button>
                                </form>
                            </div>
                        @endif
                        <a class="3" href="{{ route('event.index')}}"><button type="button" class="btn btn-outline-secondary" style="width: 20rem">Home</button></a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sucesso</h5>
                    </div>
                    <div class="modal-body">
                        Participação confirmada!!
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('event.index') }}"><button type="button" class="btn btn-primary">Home</button></a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {
                    backdrop: 'static', 
                    keyboard: false 
                });

                confirmationModal.show();
            });
            
        </script>
    @endif
@endsection