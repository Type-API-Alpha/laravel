<header class="d-flex justify-content-between align-items-center p-3 text-primary-emphasis mb-5">
    <h3 id="home-title" class="fw-normal">Event<span class="text-info">Sphere</span></h3>
    @auth
    <nav>
        <ul class="d-flex gap-2" style="list-style: none; margin: 0">
            <li id="li-event"><a  class="shadow-sm btn btn-info fw-bold text-white" href="{{ route('user.events') }}">Meus Eventos</a></li>
            <li id="li-home"><a  class="shadow-sm btn btn-info fw-bold text-white" href="{{ route('event.index') }}">Página Inicial</a></li>
        </ul>
    </nav>
    @endauth
    @guest
    <nav >
        <ul class="d-flex gap-2" style="list-style: none; margin: 0">
            <li><a href="{{ route('register') }}" class="shadow-sm btn btn-info fw-bold text-white" style="text-decoration: none" href="">cadastro</a></li>
            <li><a href="{{ route('login') }}" class="shadow-sm btn btn-outline-info fw-bold" style="text-decoration: none" href="">login</a></li>
        </ul>
    </nav>
    @endguest
</header>