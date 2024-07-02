@extends('layout')
@section('title', 'Página de Cadastro')

@section('content')

    <div class="vh-100 w-100 d-flex justify-content-center align-items-center">
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
        
    </div>

@endsection
