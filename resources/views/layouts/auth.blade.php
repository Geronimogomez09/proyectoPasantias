<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo', 'Acceso') · Pasantías E.P.E.T. N°20</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@500;600;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="acceso">

        <section class="acceso-marca">

            <div class="d-flex align-items-center gap-3">
                <span class="marca-escudo">20</span>
                <div>
                    <div class="fw-bold" style="font-family:'Archivo',sans-serif">E.P.E.T. N°20</div>
                    <div style="font-size:.85rem; color:rgba(255,255,255,.55)">Proyecto de pasantías</div>
                </div>
            </div>

            <div class="my-5">
                <h2>@yield('marca-titulo', 'Gestión de productos para la práctica profesionalizante.')</h2>
                <p class="mt-3">
                    @yield('marca-texto', 'Cargá, actualizá y controlá el stock del catálogo desde un solo lugar.')
                </p>
            </div>

        </section>

        <section class="acceso-form">
            <div class="caja entra">
                @yield('contenido')
            </div>
        </section>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
