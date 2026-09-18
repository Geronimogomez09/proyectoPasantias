@extends('layouts.auth')

@section('titulo', 'Crear cuenta')
@section('marca-titulo', 'Creá tu cuenta y empezá a cargar el catálogo.')
@section('marca-texto', 'Cada usuario accede con su propio correo y contraseña al sistema de productos.')

@section('contenido')

<div class="card">

    <h1 class="h3 mb-1">Crear cuenta</h1>
    <p class="text-muted mb-4">Tres datos y ya podés usar el sistema.</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 mb-3" role="alert" style="font-size:.92rem">
            <div class="fw-bold mb-1">
                <i class="bi bi-exclamation-circle me-1"></i> Revisá los datos
            </div>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/usuarios/registro/store') }}">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre y apellido</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                   id="nombre" name="nombre" value="{{ old('nombre') }}"
                   placeholder="Juan Pérez" autocomplete="name" required autofocus>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" name="email" value="{{ old('email') }}"
                   placeholder="nombre@epet20.edu.ar" autocomplete="email" required>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Contraseña</label>

            <div class="position-relative">
                <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror"
                       id="password" name="password" placeholder="Mínimo 8 caracteres"
                       autocomplete="new-password" minlength="8" required>

                <button type="button" id="verClave"
                        class="btn btn-icono position-absolute border-0 bg-transparent"
                        style="right:.3rem; top:50%; transform:translateY(-50%)"
                        aria-label="Mostrar contraseña">
                    <i class="bi bi-eye"></i>
                </button>
            </div>

            <div class="form-text">Combiná letras y números para que sea más segura.</div>
        </div>

        <button type="submit" class="btn btn-acento w-100 py-2">
            <i class="bi bi-person-plus me-1"></i> Crear cuenta
        </button>

        <p class="text-center text-muted mt-4 mb-0" style="font-size:.93rem">
            ¿Ya tenés una cuenta?
            <a href="{{ url('/usuarios/index') }}" class="fw-bold" style="color:var(--acero-claro)">Iniciá sesión</a>
        </p>

    </form>

</div>

<p class="text-center text-muted mt-3 mb-0" style="font-size:.82rem">
    Al registrarte aceptás las condiciones de uso del sistema escolar.
</p>

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
