@extends('layouts.app')

@section('titulo', 'Editar producto')
@section('nav-productos', 'activo')

@section('contenido')

<div class="container-fluid px-4">

    <header class="encabezado entra">
        <div class="ruta">
            <a href="{{ url('/producto/principal') }}">Productos</a>
            <span class="mx-1">/</span> {{ $productos->nombre }}
            <span class="mx-1">/</span> Editar
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
            <div>
                <h1>Editar producto</h1>
                <p>Modificá lo que necesites y guardá los cambios.</p>
            </div>

        </div>
    </header>

    <div class="row g-4 pb-4">

        <div class="col-lg-8">
            <div class="card panel entra entra-2">
                <div class="card-body p-4 p-md-5">

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4" role="alert">
                            <div class="fw-bold mb-1">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                Revisá estos campos antes de guardar
                            </div>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/producto/principal/' . $productos->id . '/update') }}" method="POST">
                        @csrf

                        <h2 class="h6 mb-3">Identificación</h2>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del producto</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                   id="nombre" name="nombre"
                                   value="{{ old('nombre', $productos->nombre) }}" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripción corta</label>
                            <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                   id="descripcion" name="descripcion" maxlength="120"
                                   value="{{ old('descripcion', $productos->descripcion) }}">
                        </div>

                        <hr class="my-4" style="border-color:var(--niebla-2); opacity:1">

                        <h2 class="h6 mb-3">Detalle</h2>

                        <div class="mb-4">
                            <label for="descripcion_larga" class="form-label">Descripción completa</label>
                            <textarea class="form-control @error('descripcion_larga') is-invalid @enderror"
                                      id="descripcion_larga" name="descripcion_larga"
                                      rows="4">{{ old('descripcion_larga', $productos->descripcion_larga) }}</textarea>
                        </div>

                        <hr class="my-4" style="border-color:var(--niebla-2); opacity:1">

                        <h2 class="h6 mb-3">Precio y disponibilidad</h2>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="precio" class="form-label">Precio</label>
                                <div class="grupo-precio">
                                    <span class="simbolo">$</span>
                                    <input type="number" step="0.01" min="0"
                                           class="form-control @error('precio') is-invalid @enderror"
                                           id="precio" name="precio"
                                           value="{{ old('precio', $productos->precio) }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" min="0"
                                       class="form-control @error('stock') is-invalid @enderror"
                                       id="stock" name="stock"
                                       value="{{ old('stock', $productos->stock) }}" required>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap justify-content-end gap-2 pt-2">
                            <a href="{{ url('/producto/principal') }}" class="btn btn-neutro">Cancelar</a>
                            <button type="submit" class="btn btn-acento">
                                <i class="bi bi-check2 me-1"></i> Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
