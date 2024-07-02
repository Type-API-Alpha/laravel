@extends('layout')

@section('content')
    <section id="event-detail" class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="h-80 d-flex shadow w-75 position-relative row bg-light-subtle rounded" style="height: 700px">
            <div  class="col-lg-6 p-0" style="max-height: 100%">
                <img class="rounded-start w-100 h-100" src="{{ asset('storage/' . $event->event_image) }}">
            </div>
            <div id="container-event-infos" class="p-4 d-flex flex-column justify-content-center gap-2 col-lg-6">
                <h2 class="w-75">{{ $event->title }}</h2>
                <p class="w-75 fs-5">{{ $event->description }}</p>
                <div class="position-absolute end-0 top-0 p-3">
                    @php
                        $explodedInitDate = explode('-', $event->init_date);
                        $initDate = "$explodedInitDate[2]/$explodedInitDate[1]";

                        $explodedEndDate = explode('-', $event->end_date);
                        $endDate = "$explodedEndDate[2]/$explodedEndDate[1]";
                    @endphp
                    <span class="d-block fs-4">início {{ $initDate }}</span>
                    <span class="fs-4">final {{ $endDate }}</span>
                </div>
                <span class="d-block fs-4">Entrada: R$ {{ number_format($event->entry_price, 2, ',', '.') }}</span>

                @php
                    $context = request()->get('context');
                @endphp

                @if ($context === 'public')
                    <div class="d-flex flex-column justify-content-end mt-5 gap-3">
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
                        <a class="3" href="{{ route('event.index') }}"><button type="button" class="btn btn-outline-secondary" style="width: 20rem">Home</button></a>
                    </div>
                @elseif ($context === 'participant')
                    <div class="d-flex flex-column justify-content-end mt-5 gap-3 align-items-center">
                        <a class="3" href="{{ route('user.events') }}"><button type="button" class="btn btn-outline-secondary" style="width: 20rem">Voltar</button></a>
                    </div>
                @elseif ($context === 'owner')
                    <div class="d-flex flex-column justify-content-end mt-5 gap-3">
                        <a class="3 mt-5" href="{{ route('form.edit.event', $event->id)}}"><button type="submit" class="btn btn-primary" style="width: 20rem">Editar Evento</button></a>
                        <a class="3 btn btn-success" href="{{ route('event.participants', $event)}}" style="width: 20rem">Exibir participantes</a>
                        <form  action="{{ route('delete.event', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="width: 20rem">Excluir Evento</button>
                        </form>
                        <button type="button" class="btn btn-warning" style="width: 20rem" data-bs-toggle="modal" data-bs-target="#form-add-photo">Adicionar foto</button>
                        <a class="3" href="{{ route('user.events')}}"><button type="button" class="btn btn-outline-secondary" style="width: 20rem">Voltar</button></a>

                        @if(session('error'))
                            <div id="error-container" class="alert alert-danger" style="position: absolute; bottom: -0.8rem">
                                {{ session('error') }}
                            </div>
                            <script>
                                const errorContainer = document.getElementById('error-container');
                                setTimeout(() => {
                                    errorContainer.remove();
                                }, 4000);
                            </script>
                        @endif
                        @if ($errors->has('error'))
                            <div class="alert alert-danger position-absolute top-100">
                                <span>{{ $errors->first('error') }}</span>
                            </div>
                        @endif
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            setTimeout(() => {
                                const errSpans = document.querySelectorAll('.alert');
                                errSpans.forEach((errSpan) => {
                                    errSpan.remove();
                                });
                            }, 3000);
                        });
                    </script>
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

    <section id="event-galery">
        <div id="form-add-photo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formAddPhotoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="max-width: 375px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formAddPhotoLabel">Adicionar Foto</h5>
                        <button type="button" class="close ms-4" data-bs-dismiss="modal" aria-label="Close" style="border: none; background-color: inherit; position: absolute; right: 0.5rem; top: 0.5rem">
                            <img src="{{ asset('/assets/icons/close.svg')}}" alt="botao de fechar">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('event.addPhoto', $event->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="input-photo">Adicionar Foto:</label>
                                <input class="form-control" name="image" id="input-photo" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 m-auto">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($eventPhotos->count() > 0)
            <section id="event-gallery">
                <h3 class="text-center pt-5 pb-5">Fotos do Evento</h3>
                <div class="row p-5">
                    @foreach ($eventPhotos as $eventPhoto)
                        <div class="col-lg-3 mb-4">
                            <img class="w-100 h-100 rounded" style="cursor: pointer" onclick="handleClickPhotos(event)" src="{{ asset('storage/' . $eventPhoto->event_photo_url) }}" alt="">
                        </div>
                    @endforeach
                </div>

                <div class="pt-5 pb-5" style="background-color: rgb(245, 245, 245);">
                    {{ $eventPhotos->links('custom.paginate') }}
                </div>
            </section>
         @endif
    <div class="modal" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered m-auto mt-1" role="document">
            <div class="modal-content position-relative" >
                <div class="modal-body p-0">
                    <button class="bg-light position-absolute end-0 p-3" type="button" class="close ms-4" data-bs-dismiss="modal" aria-label="Close" style="border: none; border-radius: 0 0 0 100% ">
                        <img class="position-absolute end-0 top-0" src="{{ asset('/assets/icons/close-2.svg')}}" alt="botao de fechar">
                    </button>
                    <img id="modalPhoto" class="w-100 h-100 rounded" src="" alt="" >
                </div>
            </div>
        </div>
    </div>
    <script>
        const handleClickPhotos = (e) => {
            const photoUrl = e.target.src;
            const modalPhoto = document.getElementById('modalPhoto');
            modalPhoto.src = photoUrl;
            const photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
            photoModal.show();
        }
    </script>
@endsection
