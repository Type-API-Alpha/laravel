
@extends('layout')
@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center" id="login-section">
        <form class="position-relative w-100 h-75 p-5 d-flex flex-column gap-3 justify-content-center shadow rounded"  style="max-width: 450px; max-height: 400px" action="{{ route('login.auth') }}" method="POST">
            @csrf
            @method('POST')
            <h3 class="fw-medium text-body text-center">login</h3>
            <div class="mb-1 w-100">
                <label for="input-email" class="form-label">Email:</label>
                <div id="container-input-email">
                    <input value="{{ old('email') }}" id="input-email" type="email" placeholder="example@gmail.com" name="email" class="form-control rounded-pill">
                </div>
                @error('email')
                    <div class="alert position-absolute top-100 alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-1 w-100">
                <label for="input-password" class="form-label">Senha:</label>
                <div id="container-input-pass">
                    <input id="input-password" type="password" name="password" class="form-control  rounded-pill">
                </div>
                @error('password')
                    <div class="alert position-absolute top-100 alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <a href="{{ route('register') }}" style="text-decoration: none; color: black"><span>registre-se</span></a>
            <button type="submit" class="btn btn-primary w-50 m-auto">Login</button>

            @if ($errors ->has('invalidCredentials'))
                <div class="alert position-absolute top-100 alert-danger" role="alert">
                    {{ $errors ->first('invalidCredentials') }}
                </div>
            @endif
            @if (session('storageSuccess'))
                <div class="alert position-absolute top-100 alert-primary" role="alert">
                    {{ session('storageSuccess') }}
                </div>
            @endif
        </form>

    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const errSpans = document.querySelectorAll('.alert');
                errSpans.forEach((errSpan) => {
                    errSpan.remove();
                });
            }, 3000);
        });
    </script>
@endsection
