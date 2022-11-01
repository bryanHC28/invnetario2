@extends('layouts.auth')
@section('title', 'Inicia sesión')

@section('content')
<div class="card shadow-lg p-4">
    <div class="text-left">
        <b class="fs-3">@yield('title')</b>
    </div>
    <hr style="height: 2px">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mt-2">
            <label for="email">Correo electrónico: <span class="text-danger">*</span></label>
            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" required>
            @error('email') <span class="text-danger fst-italic">{{ $message }}</span> @enderror
        </div>
        <div class="mt-3">
            <label for="password">Contraseña: <span class="text-danger">*</span></label>
            <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa su contraseña" required>
            @error('password') <span class="text-danger fst-italic">{{ $message }}</span> @enderror
        </div>
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" {{ old('remember')
                ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Recordar sesión
            </label>
        </div>
        @if (config('app.debug') == false)
        <div class="mt-3">
            <div class="google-recaptcha">
                {!! htmlFormSnippet() !!}
            </div>
            @error('g-recaptcha-response') <span class="text-danger fst-italic">{{ $message }}</span> @enderror
        </div>
        @endif

        <div class="text-end">
            @if (Route::has('web.auth.reset_password.view'))
            <div class="mt-2">
                <a href="{{ route('web.auth.reset_password.view') }}" class="btn btn-link">Reestablecer contraseña</a>
            </div>
            @endif
            <div class="mt-2">
                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Acceder</button>
            </div>
        </div>
    </form>
</div>
@endsection
