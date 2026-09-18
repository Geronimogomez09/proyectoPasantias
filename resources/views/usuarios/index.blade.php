@extends('layouts.auth')

@section('titulo', 'Iniciar sesión')
@section('marca-titulo', 'Gestión de productos para la práctica profesionalizante.')
@section('marca-texto', 'Ingresá con tu cuenta para cargar, editar y controlar el catálogo del proyecto.')

@section('contenido')

<div class="card">

    <h1 class="h3 mb-1">Iniciar sesión</h1>
    <p class="text-muted mb-4">Usá el correo con el que te registraste.</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" role="alert" style="font-size:.92rem">
            <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/usuarios/index/login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email') }}" placeholder="nombre@epet20.edu.ar"
                   autocomplete="email" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>

            <div class="position-relative">
                <input type="password" class="form-control pe-5" id="password" name="password"
                       placeholder="••••••••" autocomplete="current-password" required>

                <button type="button" id="verClave"
                        class="btn btn-icono position-absolute border-0 bg-transparent"
                        style="right:.3rem; top:50%; transform:translateY(-50%)"
                        aria-label="Mostrar contraseña">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" id="remember" name="remember" value="1">
            <label class="form-check-label" for="remember" style="font-size:.93rem">
                Mantener la sesión iniciada
            </label>
        </div>

        <button type="submit" class="btn btn-acento w-100 py-2">
            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
        </button>

        <p class="text-center text-muted mt-4 mb-0" style="font-size:.93rem">
            ¿Todavía no tenés cuenta?
            <a href="{{ url('/usuarios/registro') }}" class="fw-bold" style="color:var(--acero-claro)">Registrate</a>
        </p>

    </form>

</div>

<script>
    const boton = document.getElementById('verClave');
    const campo = document.getElementById('password');

    boton.addEventListener('click', () => {
        const oculta = campo.type === 'password';
        campo.type = oculta ? 'text' : 'password';
        boton.querySelector('i').className = oculta ? 'bi bi-eye-slash' : 'bi bi-eye';
        boton.setAttribute('aria-label', oculta ? 'Ocultar contraseña' : 'Mostrar contraseña');
    });
</script>

@endsection
