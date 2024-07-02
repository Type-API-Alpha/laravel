@extends('layout')
@section('title', 'Página de Cadastro')

@section('content')

    <section class="vh-100 d-flex justify-content-center align-items-center flex-column" id="login-section">
        <form class="position-relative w-100 p-5 d-flex flex-column gap-3 justify-content-center align-items-center shadow rounded"  style="max-width: 450px; max-height: fit-content" method="POST" action="{{ route('register') }}">
            @csrf
            <h3 class="fw-medium .text-body">Novo usuário</h3>
            <div class="mb-1 w-100">
                <label for="input-name" class="form-label">Nome</label>
                <div id="container-input-name">
                    <input id="input-name" type="text" name="name" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-email" class="form-label">Email</label>
                <div id="container">
                    <input id="input-email" type="email" name="email" class="form-control rounded-pill" required>
                </div>
            </div>
            <div class="mb-1 w-100">
                <label for="input-password" class="form-label">Senha</label>
                <div id="container">
                    <input id="input-password" type="password" name="password" class="form-control  rounded-pill" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-4">Cadastrar</button>
            <div>
                @if ( $errors->any() )
                    <div class="alert alert-danger mt-5">
                        <ul style="list-style: none; margin: 0; padding: 0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        const errorContainer = document.querySelector('.alert');
                        setTimeout(() => {
                            errorContainer.remove();
                        }, 6000);
                    </script>
                @endif
            </div>
        </form>

    </section>

    {{-- <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
        <form class="container p-3 rounded text-center bg-secondary w-25 position-relative" method="POST" action="{{ route('register') }}">
            @csrf
            <legend class="text-light">Cadastro</legend>
            <div class="mb-3">
                <input class="form-control" name="name" type="text" placeholder="Nome" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="email" type="email" placeholder="E-mail" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="password" type="password" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            @if ( $errors->any() )
                <div class="alert alert-danger position-absolute top-100">
                    <ul style="list-style: none; margin: 0; padding: 0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <script>
                    const errorContainer = document.querySelector('.alert');
                    setTimeout(() => {
                        errorContainer.remove();
                    }, 4000);
                </script>
            @endif
        </form>

    </div> --}}

@endsection
