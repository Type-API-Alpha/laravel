
@extends('layout')
@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center" id="login-section">
        <form class="w-100 h-75 p-5 d-flex flex-column gap-3 justify-content-center align-items-center shadow rounded"  style="max-width: 450px; max-height: 400px" action="{{ route('login.auth') }}" method="POST">
            @csrf
            @method('POST')
            <h3 class="fw-medium .text-body">login</h3>
            <div class="mb-1 w-100">
                <label for="input-email" class="form-label">Email:</label>
                <div id="container-input-email">
                    <input id="input-email" type="email" placeholder="example@gmail.com" name="email" class="form-control rounded-pill">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-1 w-100">
                <label for="input-password" class="form-label">Senha:</label>
                <div id="container-input-pass">
                    <input id="input-password" type="password" name="password" class="form-control  rounded-pill">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-50 mt-4">Login</button>
        </form>
        @if ($errors->has('login'))
            <span class="text-danger">{{ $errors->first('login') }}</span>
        @endif
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const errSpans = document.querySelectorAll('.text-danger');
                errSpans.forEach((errSpan) => {
                    errSpan.remove();
                });
            }, 3000);
        });
    </script>
@endsection
