@extends('layout')
@section('content')
<section id="home" @auth style="margin-left: 21rem" @endauth>
        @guest
            <header class="d-flex justify-content-between align-items-center p-3 text-primary-emphasis mb-5">
                <h3 id="home-title" class="fw-normal">Event<span class="text-info">Sphere</span></h3>
                <nav>
                    <ul class="d-flex gap-2" style="list-style: none; margin: 0">
                        <li><a href="{{ route('register') }}" class="shadow-sm btn btn-info fw-bold text-white" style="text-decoration: none" href="">cadastro</a></li>
                        <li><a href="{{ route('login') }}" class="shadow-sm btn btn-outline-info fw-bold" style="text-decoration: none" href="">login</a></li>
                    </ul>
                </nav>
            </header>
            <div class="container mt-5 pt-5 border-bottom pb-5 mb-5" >
                <div class="row pt-5">
                    <div id="container-content" class="col-md-6 col-sm-12 d-flex flex-column justify-content-center text-body-emphasis">
                        <h2 class="mb-4">Sua Plataforma Completa para <span class="text-info">Descobrir, Cadastrar e Participar</span> de Eventos Incríveis</h2>
                        <p class="fs-5 lh-sm">Junte-se à nossa vibrante comunidade! Descubra eventos emocionantes, 
                        os seus próprios e participe de experiências únicas que vão transformar sua rotina.
                        Seja parte de uma <span style="color: #f56d1e">rede que conecta pessoas e eventos em um só lugar</span>.</p>
                        <a href="{{ route('register') }}"><button class="shadow btn mt-4 w-50 fw-bold fs-5" style="background-color: #f56d1e">cadastrar</button></a>
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
                        <div class="card shadow-sm" style="min-height: 250px">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="position-relative">
                                    @php
                                        $explodedInitDate = explode('-', $event->init_date);
                                        $initDate = "$explodedInitDate[2]/$explodedInitDate[1]";
                                        
                                        $explodedEndDate = explode('-', $event->end_date);
                                        $endDate = "$explodedEndDate[2]/$explodedEndDate[1]";
                                    @endphp
                                    <div class="mb-3 position-absolute end-0 d-flex gap-2">
                                        <img src="{{ asset('assets/icons/calendar-icon.svg') }}" alt="">
                                        <div >
                                            <span class="fw-medium">{{ $initDate }}</span> 
                                        </div>
                                        <div>
                                            <span class="fw-medium">a {{ $endDate }}</span> 
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-title mt-3">{{ Str::limit($event->title, 30) }}</h6>
                                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                                <a class="fw-bold" style="text-decoration: none; color:#be3c00" href="{{ route('event.detail', $event->id) }}">ver mais<img class="ms-1" src="{{ asset('assets/icons/see-more.svg')}}" ></a>
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
