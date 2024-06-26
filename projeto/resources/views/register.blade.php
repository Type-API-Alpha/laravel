@extends('layout')
@section('title', 'Página de Cadastro')
@section('content')

    <div>
        <form method="POST" action="./register">
            @csrf

            <input name="name" type="text" placeholder="Nome" required><br>
            <input name="email" type="email" placeholder="E-mail" required><br>
            <input name="password" type="password" placeholder="Senha" required><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

@endsection
