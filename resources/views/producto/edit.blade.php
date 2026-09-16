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
          class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
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
          <div class="col-md-3 text-end me-4">
            <button type="button" class="btn btn-primary ">logout</button>
          </div>
        </header>

    <form action="{{ url('/producto/principal/'.$productos->id.'/update') }}" method="post">
            {{ csrf_field() }}
            
            <div class="col-sm-5">
                @if ( $errors->any() )
                <div class="alert alert-danger" align="left">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
</div>
<div class="col-sm-5">
    <div class="form-group label-floating">
        <label class="control-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{ $productos->nombre }}">
    </div>
</div>

<div class="col-sm-4">
    <div class="form-group label-floating">
        <label class="control-label">Descripcion</label>
        <input type="text" class="form-control" name="descripcion" value="{{ $productos->descripcion }}">
    </div>
</div>

<div class="col-sm-4">
    <div class="form-group label-floating">
        <label class="control-label">Descripcion Larga</label>
        <input type="text" class="form-control" name="descripcion_larga" value="{{ $productos->descripcion_larga }}">
    </div>
</div>

<div class="col-sm-4">
    <div class="form-group label-floating">
        <label class="control-label">Precio</label>
        <input type="number" class="form-control" name="precio" value="{{ $productos->precio }}">
    </div>
</div>

<div class="col-sm-4">
    <div class="form-group label-floating">
        <label class="control-label">Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ $productos->stock }}">
    </div>
</div>

<a href="{{ url('/producto/principal') }}" align="left" rel="tooltip" type="button" title="Cancelar y Volver menu anterior" class="btn btn-black btn-simple btn-xs">
    <buttom type="submit"> Cancelar </buttom>
</a>

                            <button class="btn btn-primary" color="black" type="submit">Actualizar Producto</button>

                        </div>
                    </form>
                </div>
         </div>
</div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>