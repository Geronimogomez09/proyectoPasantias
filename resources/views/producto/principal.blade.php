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
            background-color: #1263b4;
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

    <header
          class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"
        >
          <div class="col-md-3 mb-2 mb-md-0">
            <a
              href="/"
              class="d-inline-flex link-body-emphasis text-decoration-none"
            >
              <svg
                class="bi"
                width="40"
                height="32"
                role="img"
                aria-label="Bootstrap"
              >
                <use xlink:href="#bootstrap"></use>
              </svg>
            </a>
          </div>
          <ul
            class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"
          >
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Features</a></li>
            <li><a href="#" class="nav-link px-2">Pricing</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
          </ul>
          <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">
              Login
            </button>
            <button type="button" class="btn btn-primary">Sign-up</button>
          </div>
        </header>
      </div>
      <div class="b-example-divider"></div>
    <div class="container-fluid px-4">

        <!-- TABLA -->
        <div class="card shadow-sm">

            <!-- HEADER DE LA TABLA -->
            <div class="card-header bg-white border-0 p-4">

                <div class="row align-items-center g-3">

                    <div class="col-md-6">
                        <h2 class="mb-0">
                            Lista de productos
                        </h2>

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
                                      action="{{ url('/producto/principal/' . $producto->id) }}"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                    
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