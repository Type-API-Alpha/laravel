<section id="main-sidebar" class="min-vh-100">
    <ul class="d-flex flex-column gap-2 mt-5 p-4">
        <a href="{{ route('event.index') }}"><li id="li-home" class="link-page ps-5 fw-medium fs-5 {{ request()->is('home') ? 'page' : '' }}">Home</li></a>
        <a href="{{ route('user.events') }}"><li id="li-event" class="link-page ps-5 fw-medium fs-5 {{ request()->is('event_user') ? 'page' : '' }}">Meus Eventos</li></a>
        <a href="{{ route('form.create.event') }}"><li id="li-create-event" class="link-page ps-5 fw-medium fs-5 {{ request()->is('create_event') ? 'page' : '' }}">Criar Evento</li></a>
    </ul>
</section>
