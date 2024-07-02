@extends('layout')

@section('content')
    <div class="container mt-5 align-items-center">
        <h1 class="mb-5 container text-center">Lista de participantes do evento: {{ $event->title }}</h1>
        <ul class="list-group" id="participantList">
            @foreach ($participants as $participant)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $participant->name }}
                    <form action="{{ route('event.removeParticipant', ['event' => $event->id, 'user' => $participant->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remover do evento</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <div class="container d-flex justify-content-center">
            <a href="{{ route('event.detail', ['event' => $event->id, 'context' => 'owner']) }}" class="btn btn-primary mt-5">Voltar</a>
        </div>
    </div>

    @if (session('remove_participant_success'))
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Usuário removido com sucesso!</h5>
                    </div>
                    <div class="modal-body">
                        <h5> Participante {{ session('removedUser')->name }} removido com sucesso deste evento! </h5>
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

@endsection
