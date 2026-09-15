<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f8;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .table th {
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .descripcion {
            max-width: 220px;
        }

        .descripcion-larga {
            max-width: 280px;
        }

        .acciones {
            white-space: nowrap;
        }

        .titulo {
            font-weight: 600;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-dark shadow-sm mb-4">
        <div class="container-fluid px-4">

            <span class="navbar-brand fw-bold">
                Panel de Administración
            </span>

            <div class="d-flex align-items-center gap-3">
                <span class="text-white">
                    Productos
                </span>

                <a href="{{ url('/admin/productos/create') }}"
                   class="btn btn-success">
                    + Nuevo producto
                </a>
            </div>

        </div>
    </nav>


    <div class="container-fluid px-4">

        <!-- ENCABEZADO -->
        <div class="d-flex flex-column flex-md-row justify-content-between
                    align-items-md-center mb-4 gap-3">

            <div>
                <h2 class="titulo mb-1">
                    Productos
                </h2>

                <p class="text-muted mb-0">
                    Administración del catálogo de productos
                </p>
            </div>

            <div>
                <span class="badge text-bg-primary fs-6">
                    {{ count($productos) }} productos
                </span>
            </div>

        </div>


        <!-- TARJETAS DE INFORMACIÓN -->
        <div class="row g-3 mb-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">

                            <div>
                                <h6 class="text-muted mb-1">
                                    Total de productos
                                </h6>

                                <h3 class="mb-0">
                                    {{ count($productos) }}
                                </h3>
                            </div>

                            <div class="fs-2">
                                📦
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>
                                <h6 class="text-muted mb-1">
                                    Stock total
                                </h6>

                                <h3 class="mb-0">
                                    {{ $productos->sum('stock') }}
                                </h3>
                            </div>

                            <div class="fs-2">
                                🏷️
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">

                            <div>
                                <h6 class="text-muted mb-1">
                                    Productos sin stock
                                </h6>

                                <h3 class="mb-0">
                                    {{ $productos->where('stock', 0)->count() }}
                                </h3>
                            </div>

                            <div class="fs-2">
                                ⚠️
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- TABLA -->
        <div class="card shadow-sm">

            <!-- HEADER DE LA TABLA -->
            <div class="card-header bg-white border-0 p-4">

                <div class="row align-items-center g-3">

                    <div class="col-md-6">
                        <h5 class="mb-0">
                            Lista de productos
                        </h5>

                        <small class="text-muted">
                            Productos registrados en el sistema
                        </small>
                    </div>



                    </div>

                </div>

            </div>


            <!-- TABLA RESPONSIVE -->
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>

                            <th class="text-center">
                                #
                            </th>

                            <th>
                                Producto
                            </th>

                            <th>
                                Descripción
                            </th>

                            <th>
                                Descripción larga
                            </th>

                            <th class="text-end">
                                Precio
                            </th>

                            <th class="text-center">
                                Stock
                            </th>

                            <th class="text-center">
                                Acciones
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($productos as $producto)

                        <tr>

                            <!-- ID -->
                            <td class="text-center text-muted">
                                {{ $producto->id }}
                            </td>


                            <!-- NOMBRE -->
                            <td>
                                <strong>
                                    {{ $producto->nombre }}
                                </strong>
                            </td>


                            <!-- DESCRIPCIÓN -->
                            <td class="descripcion">
                                <span class="text-muted">
                                    {{ $producto->descripcion }}
                                </span>
                            </td>


                            <!-- DESCRIPCIÓN LARGA -->
                            <td class="descripcion-larga">

                                <small class="text-muted">
                                    {{ $producto->descripcion_larga }}
                                </small>

                            </td>


                            <!-- PRECIO -->
                            <td class="text-end">

                                <strong class="text-success">
                                    $ {{ number_format($producto->precio, 2, ',', '.') }}
                                </strong>

                            </td>


                            <!-- STOCK -->
                            <td class="text-center">

                                @if ($producto->stock > 10)

                                    <span class="badge text-bg-success">
                                        {{ $producto->stock }}
                                    </span>

                                @elseif ($producto->stock > 0)

                                    <span class="badge text-bg-warning">
                                        {{ $producto->stock }}
                                    </span>

                                @else

                                    <span class="badge text-bg-danger">
                                        0
                                    </span>

                                @endif


                            <!-- ACCIONES -->
                            <td class="text-center acciones">

                                <!-- VER -->
                                <a href="{{ url('/admin/productos/' . $producto->id) }}"
                                   class="btn btn-sm btn-info text-white"
                                   title="Ver producto">

                                    👁

                                </a>


                                <!-- EDITAR -->
                                <a href="{{ url('/admin/productos/' . $producto->id . '/edit') }}"
                                   class="btn btn-sm btn-warning"
                                   title="Editar producto">

                                    ✏️

                                </a>


                                <!-- ELIMINAR -->
                                <form method="POST"
                                      action="{{ url('/admin/productos/' . $producto->id) }}"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Eliminar producto">

                                        🗑️

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <!-- FOOTER -->
            <div class="card-footer bg-white border-0 p-3">

                <div class="d-flex justify-content-between align-items-center">

                    <small class="text-muted">
                        Mostrando {{ count($productos) }} productos
                    </small>

                    <a href="{{ url('/admin/productos/create') }}"
                       class="btn btn-primary">

                        + Agregar producto

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
