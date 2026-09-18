@extends('layouts.app')

@section('titulo', 'Productos')
@section('nav-productos', 'activo')

@section('contenido')

@php
    $coleccion   = collect($productos);
@endphp

<div class="container-fluid px-4">

    <header class="encabezado entra">
        <div class="ruta">
            <a href="{{ url('/producto/principal') }}">Inicio</a>
            <span class="mx-1">/</span> Productos
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
            <div>
                <h1>Productos</h1>
                <p>Todo lo que hay cargado en el sistema, con su precio y su stock actual.</p>
            </div>

            <a href="{{ url('/producto/principal/create') }}" class="btn btn-acento">
                <i class="bi bi-plus-lg me-1"></i> Cargar producto
            </a>
        </div>
    </header>

        @if (session('exito'))
            <div class="alert alert-success m-3 mb-0">
                <i class="bi bi-check-circle me-1"></i> {{ session('exito') }}
            </div>
        @endif

        @if ($coleccion->isEmpty())

            <div class="vacio">
                <div class="simbolo"><i class="bi bi-inboxes"></i></div>
                <h3 class="h5">Todavía no hay productos</h3>
                <p class="text-muted mb-4">Cargá el primero y va a aparecer acá con su precio y su stock.</p>
                <a href="{{ url('/producto/principal/create') }}" class="btn btn-acento">
                    <i class="bi bi-plus-lg me-1"></i> Cargar producto
                </a>
            </div>

        @else

            <div class="table-responsive">
                <table class="table table-hover tabla-productos">

                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Detalle</th>
                            <th class="text-end">Precio</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="cuerpo-tabla">
                        @foreach ($productos as $producto)
                            <tr data-busqueda="{{ mb_strtolower($producto->nombre . ' ' . $producto->descripcion . ' ' . $producto->descripcion_larga) }}">

                                <td class="text-center celda-id">{{ $producto->id }}</td>

                                <td class="celda-nombre">{{ $producto->nombre }}</td>

                                <td class="descripcion">
                                    <span class="recorte">{{ $producto->descripcion ?: '—' }}</span>
                                </td>

                                <td class="descripcion-larga">
                                    <span class="recorte">{{ $producto->descripcion_larga ?: '—' }}</span>
                                </td>

                                <td class="text-end celda-precio">
                                    $ {{ number_format($producto->precio, 2, ',', '.') }}
                                </td>

                                <td class="text-center">
                                    @if ($producto->stock > 10)
                                        <span class="stock stock-ok">
                                            <span class="punto"></span>{{ $producto->stock }}
                                        </span>
                                    @elseif ($producto->stock > 0)
                                        <span class="stock stock-medio" title="Quedan pocas unidades">
                                            <span class="punto"></span>{{ $producto->stock }}
                                        </span>
                                    @else
                                        <span class="stock stock-agotado" title="Sin stock">
                                            <span class="punto"></span>0
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center acciones">
                                    <a href="{{ url('/producto/principal/' . $producto->id . '/edit') }}"
                                       class="btn btn-icono" title="Editar producto" aria-label="Editar producto">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <button type="button"
                                            class="btn btn-icono peligro"
                                            title="Eliminar producto"
                                            aria-label="Eliminar producto"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEliminar"
                                            data-nombre="{{ $producto->nombre }}"
                                            data-url="{{ url('/producto/principal/' . $producto->id) }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

            <div class="card-footer">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <small class="text-muted">
                        Mostrando <strong id="contador">{{ $coleccion->count() }}</strong>
                        de {{ $coleccion->count() }} productos
                    </small>
                </div>
            </div>

        @endif

    </div>

</div>

<!-- Confirmación de borrado -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="tituloEliminar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:0; border-radius:var(--radio); box-shadow:var(--sombra-lg)">

            <div class="modal-body p-4 text-center">
                <div class="mx-auto mb-3 d-grid"
                     style="width:56px;height:56px;place-items:center;border-radius:16px;background:rgba(192,69,63,.10);color:var(--rojo);font-size:1.5rem">
                    <i class="bi bi-trash3"></i>
                </div>

                <h3 class="h5 mb-2" id="tituloEliminar">Eliminar producto</h3>
                <p class="text-muted mb-0">
                    Vas a borrar <strong id="nombreEliminar"></strong>. Esta acción no se puede deshacer.
                </p>
            </div>

            <div class="modal-footer border-0 pt-0 px-4 pb-4 d-flex gap-2">
                <button type="button" class="btn btn-neutro flex-fill" data-bs-dismiss="modal">Cancelar</button>

                <form id="formEliminar" method="POST" action="" class="flex-fill m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
    // Pasa el producto elegido al formulario del modal
    const modalEliminar = document.getElementById('modalEliminar');

    if (modalEliminar) {
        modalEliminar.addEventListener('show.bs.modal', (evento) => {
            const boton = evento.relatedTarget;
            document.getElementById('nombreEliminar').textContent = boton.dataset.nombre;
            document.getElementById('formEliminar').action = boton.dataset.url;
        });
    }
</script>
@endpush

@endsection
