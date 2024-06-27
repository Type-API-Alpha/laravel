@extends('layout')
@section('content')
    <section>
        <div class="container">
            <h4 class="mt-4 mb-3">Eventos</h4>
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                        <div class="card" style="min-height: 250px">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex gap-2">
                                    <div class="mb-3">
                                        <span class="fw-medium">Início:</span> {{ $event->init_date }}
                                    </div>
                                    <div class="mb-3">
                                        <span class="fw-medium">Final:</span> {{ $event->end_date }}
                                    </div>
                                </div>
                                <h6 class="card-title">{{ Str::limit($event->title, 30) }}</h6>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <a  href="{{ route('event.detail', $event->id) }}" class="btn-detail btn btn-primary w-50 ">ver mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
        <div class="mt-5">
            {{ $events->links('custom.paginate') }}
        </div>
@endsection
