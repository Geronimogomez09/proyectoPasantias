<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Panel') · Pasantías E.P.E.T. N°20</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('estilos')
</head>

<body>

    <nav class="barra">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between py-2 gap-3">

                <a href="{{ url('/producto/principal') }}" class="navbar-brand d-flex align-items-center gap-3 m-0">
                    <span class="marca-escudo">20</span>
                    <span>
                        Pasantías
                        <small>E.P.E.T. N°20 · Gestión de productos</small>
                    </span>
                </a>

                <ul class="nav d-none d-lg-flex align-items-center gap-1 m-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-productos')" href="{{ url('/producto/principal') }}">
                            <i class="bi bi-box-seam me-1"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-nuevo')" href="{{ url('/producto/principal/create') }}">
                            <i class="bi bi-plus-circle me-1"></i> Nuevo producto
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    <span class="chip-usuario d-none d-md-inline-flex">
                        <span class="inicial">{{ strtoupper(mb_substr(auth()->user()->nombre ?? 'U', 0, 1)) }}</span>
                        {{ auth()->user()->nombre ?? 'Usuario' }}
                    </span>

                    <form id="form-logout" action="{{ url('/usuarios/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <button type="submit" form="form-logout" class="btn btn-acento btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                    </button>
                </div>

            </div>
        </div>
    </nav>

    <main>
        @yield('contenido')
    </main>

    <footer class="pie">
        <div class="container-fluid px-4">
            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="marca-escudo">20</span>
                        <div>
                            <div class="fw-bold text-white">E.P.E.T. N°20</div>
                            <div style="font-size:.85rem">Proyecto de pasantías</div>
                        </div>
                    </div>
                    <p style="font-size:.93rem; max-width:40ch">
                        Sistema de gestión de productos desarrollado con Laravel como parte de la
                        práctica profesionalizante de la escuela.
                    </p>
                </div>

                <div class="col-6 col-lg-2">
                    <h5>Sistema</h5>
                    <ul>
                        <li><a href="{{ url('/producto/principal') }}">Lista de productos</a></li>
                        <li><a href="{{ url('/producto/principal/create') }}">Cargar producto</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h5>Cuenta</h5>
                    <ul>
                        <li><a href="{{ url('/usuarios/index') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/usuarios/registro') }}">Crear cuenta</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h5>Contacto</h5>
                    <ul>
                        <li><i class="bi bi-geo-alt me-2"></i>Neuquén, Argentina</li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
