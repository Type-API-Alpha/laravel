@extends('layout')
@section('content')
<section id="home" class="pt-5 mt-5" style="min-height: 100vh">
        @include('components.header')
        @guest
            <div class="container mt-3 pt-3 border-bottom border-dark-subtle pb-5 mb-5 text-center" >
                <div class="row pt-5 pb-5">
                    <div class="col-md-3 col-sm-12 position-relative">
                        <img id="image-home-first" src="{{ asset('assets/icons/Halloween tickets-bro.svg') }}" alt="">
                    </div>
                    <div id="container-content" class="col-md-6 col-sm-12 d-flex flex-column justify-content-center text-body-emphasis">
                        <h2 class="mb-4 fw-bolder fs-1">Sua Plataforma Completa para <span class="text-info">Descobrir, Cadastrar e Participar</span> de Eventos Incríveis</h2>
                        <p class="fs-5 lh-sm">Junte-se à nossa vibrante comunidade! Descubra eventos emocionantes,
                        os seus próprios e participe de experiências únicas que vão transformar sua rotina.
                        Seja parte de uma <span style="color: #f56d1e">rede que conecta pessoas e eventos em um só lugar</span>.</p>
                        <a href="{{ route('register') }}"><button class="shadow btn mt-4 w-50 fw-bold fs-5" style="background-color: #f56d1e">Junte-se a nós</button></a>
                    </div>
                    <div class="col-md-3 col-sm-12 position-relative">
                        <img id="image-home" src="{{ asset('assets/icons/Halloween tickets-pana.svg') }}" alt="">
                    </div>
                </div>
            </div>
        @endguest
        <div class="container pt-5 pt-5">
            <h3 class="mb-5 @auth pt-5 mt-5 @endauth m-auto text-center " id="title-card-section">Eventos</h3>
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
                                <a  href="{{ route('event.detail', ['event' => $event->id, 'context' => 'public']) }}" class="btn-detail btn btn-primary w-50 ">ver mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="pt-5 pb-5" style="background-color: rgb(245, 245, 245);">
            {{ $events->links('custom.paginate') }}
        </div>
    </section>
@endsection
