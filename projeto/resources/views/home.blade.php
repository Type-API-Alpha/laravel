@extends('layout')
@section('content')
<section id="home" @auth style="margin-left: 21rem" @endauth>
        @guest
            <header class="d-flex justify-content-between align-items-center p-3 text-primary-emphasis mb-5">
                <h3 id="home-title" class="fw-normal">Event<span class="text-info">Sphere</span></h3>
                <nav>
                    <ul class="d-flex gap-2" style="list-style: none; margin: 0">
                        <li><a class="shadow-sm btn btn-info fw-bold text-white" style="text-decoration: none" href="">cadastro</a></li>
                        <li><a class="shadow-sm btn btn-outline-info fw-bold" style="text-decoration: none" href="">login</a></li>
                    </ul>
                </nav>
            </header>
            <div class="container mt-5 pt-5">
                <div class="row pt-5">
                    <div id="container-content" class="col-md-6 col-sm-12 text-body-emphasis">
                        <h2 class="mb-4">Sua Plataforma Completa para <span class="text-info">Descobrir, Cadastrar e Participar</span> de Eventos Incríveis</h2>
                        <p class="fs-5 lh-sm">Junte-se à nossa vibrante comunidade! Descubra eventos emocionantes, 
                        os seus próprios e participe de experiências únicas que vão transformar sua rotina.
                        Seja parte de uma <span style="color: #DC3545">rede que conecta pessoas e eventos em um só lugar</span>.</p>
                        <button class="btn btn-danger mt-4 w-50">cadastrar</button>
                    </div>
                    <div class="col-md-6 col-sm-12 position-relative">
                        <img id="image-home" src="{{ asset('assets/icons/main-image.svg') }}" alt="">
                    </div>
                </div>
            </div>
        @endguest
        @auth
            @include('components/sidebar')
        @endauth
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
                                <a  href="{{ route('event.detail', ['event' => $event->id, 'context' => 'user']) }}" class="btn-detail btn btn-primary w-50 ">ver mais</a>
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
