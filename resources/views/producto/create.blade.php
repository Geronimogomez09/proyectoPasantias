<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .titulo {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white px-4">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><h1>Nuevo Producto</h1></li>
        </ul>
        <div class="col-md-3 text-end me-4">
            <button type="button" class="btn btn-outline-primary">Logout</button>
        </div>
    </header>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <!-- Tarjeta contenedora del formulario -->
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        
                        <h2 class="card-title text-center titulo mb-4">Registrar nuevo producto</h2>

                        <!-- Alertas de error de validación -->
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulario de Registro -->
                        <form action="/producto/principal/store" method="post">
                            {{ csrf_field() }}

                            <!-- Nombre -->
                            <div class="mb-3">
                                <label for="nombre" class="form-label font-weight-bold">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Camiseta de Algodón" required>
                            </div>

                            <!-- Descripción -->
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción Corta</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" placeholder="Ej: Camiseta talle M negra">
                            </div>

                            <!-- Descripción Larga -->
                            <div class="mb-3">
                                <label for="descripcion_larga" class="form-label">Descripción Larga</label>
                                <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="3" placeholder="Detalles completos del producto...">{{ old('descripcion_larga') }}</textarea>
                            </div>

                            <!-- Precio y Stock en 2 columnas -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label for="precio" class="form-label">Precio ($)</label>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" placeholder="0.00" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" placeholder="0" required>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="d-flex justify-content-between align-items-center pt-2">
                                <a href="{{ url('/producto/principal') }}" class="btn btn-outline-secondary">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    Registrar Producto
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>