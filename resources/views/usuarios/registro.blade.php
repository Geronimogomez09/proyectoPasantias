<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="b-example-divider"></div>
      <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">
              Por favor Registrate para comenzar a utilizar el CRUD.
            </h1>
          </div>
          <div class="col-md-10 mx-auto col-lg-5">
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="post" action="/usuarios/registro/store">
                    {{ csrf_field()}}
              <div class="col-sm-5">
                        @if ($errors->any())
                        <div class="Alert alert-danger" align="left">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                <div class="form-floating mb-3">
                    <input
                     type="text"
                     class="form-control"
                     id="floatingInput"
                     placeholder="Nombre"
                     name="nombre" value="{{ old('nombre')}}"
                     >
                     <label for="floatingInput">Nombre</label>
                </div>
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control"
                  id="floatingInput"
                  placeholder="User1234"
                  name="email" value="{{ old('email')}}"
                />
                <label for="floatingInput">Correo electrónico</label>
              </div>
              <div class="form-floating mb-3">
                <input
                  type="password"
                  class="form-control"
                  id="floatingPassword"
                  placeholder="Password"
                  name="password" value="{{ old('password')}}"
                />
                <label for="floatingPassword">Contraseña</label>
              </div>
              <div class="checkbox mb-3">
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">
                Registrarse
              </button>
              <p class="mt-4">ya tienes cuenta? <a href="{{ "/usuarios/index/" }}">iniciar sesión</a></p>
              <hr class="my-4" />
            </form>
          </div>
        </div>
      </div>
</body>
</html>