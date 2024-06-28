<section id="main-sidebar" class="min-vh-100">
    <ul class="d-flex flex-column gap-2 mt-5 p-4">
        <li id="li-home" class="link-page ps-5 fw-medium fs-5 {{ request()->is('home') ? 'page' : '' }}">Home</li>
        <li id="li-profile" class="link-page ps-5 fw-medium fs-5 ">Perfil</li>
        <li id="li-event" class="link-page ps-5 fw-medium fs-5 {{ request()->is('event_user') ? 'page' : '' }}">Meus Eventos</li>
    </ul>
</section>