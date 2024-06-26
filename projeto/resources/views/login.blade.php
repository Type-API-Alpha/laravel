

<form action="{{ route('login.auth')}}" method="POST">
    @csrf
    @method('POST')
    <div>
        <label for="input-email">Email:</label>
        <input id="input-email" type="text" placeholder="example@gmail.com" name="email">
        @error('email')
            <span class="span-err">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="input-password">Password:</label>
        <input id="input-password" type="password" name="password">
        @error('password')
            <span class="span-err">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">login</button>
</form>
@if ($errors->has('login'))
    <span class="span-err">{{ $errors->first('login') }}</span>
@endif
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(() => {
                const errSpans = document.querySelectorAll('.span-err');
                errSpans.forEach((errSpan) => {
                    errSpan.remove();
                });
            }, 3000);
    });
</script>