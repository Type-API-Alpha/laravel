@extends('layout')
@section('title', 'Eventos do usuário')
@section('content')
{{-- <button>Criar evento</button> --}}
<section>
    @include('components.header')
    <div class="container mt-5 pt-5">
        <h2 class="text-center @auth mt-5 mb-2 @endauth">Meus eventos</h2>

        <a href="{{ route('create.event') }}">
            <button type="button" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-square-dotted" style="font-size: 1rem;"></i>
                Criar evento
            </button>
        </a>
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
                                <a href="{{ route('event.detail', ['event' => $event->id, 'context' => 'owner']) }}" class="btn-detail btn btn-primary w-50 ">Exibir Detalhes</a>
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

    <div class="container">
        <h2 class="text-center">Eventos que faço parte</h2>
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
                                <div class="d-flex gap-3">
                                    <a href="{{ route('event.detail', ['event' => $event->id, 'context' => 'participant']) }}" class="btn-detail btn btn-primary flex-grow-1">Visualizar Evento</a>
                                    <form action="{{ route('leave.event', $event->id) }}" method="POST" style="display: inline;" class="flex-grow-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-detail btn btn-danger w-100">Sair do evento</button>
                                    </form>
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

    @if (session('event_delete_success'))
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sucesso</h5>
                    </div>
                    <div class="modal-body">
                        Evento excluido com sucesso!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="closeModalButton">Fechar</button>
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

                document.getElementById('closeModalButton').addEventListener('click', function () {
                    confirmationModal.hide();
                });
            });

        </script>
    @endif

    @if (session('leave_success'))
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sucesso</h5>
                    </div>
                    <div class="modal-body">
                        Você não faz mais parte deste evento!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="closeModalButton">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
</section>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'), {
                    backdrop: 'static',
                    keyboard: false
                });

                confirmationModal.show();

                document.getElementById('closeModalButton').addEventListener('click', function () {
                    confirmationModal.hide();
                });
            });

        </script>
    @endif
@endsection
