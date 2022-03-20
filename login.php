<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sass/custom.css">
</head>
<body>
  <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">
  <form class="border w-25  bg-light text-center">

    <!-- Cabecera login-->
  <div class="container bg-dark w-100 p-1 mb-3">
    <p class="text-success text-center"><b>LOGIN</b></p>
  </div>
  <!--Email-->
  <div class="form-group p-2">
    <label class="mb-3"><b>EMAIL</b></label>
    <input type="email" class="form-control p-2" id="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <!--Contraseña-->
  <div class="form-group mb-3 p-2">
    <label class="mb-3"><b>CONTRASEÑA</b></label>
    <input type="password" class="form-control p-2" id="contrasenya" placeholder="Contraseña">
  </div>
  <!--Boton-->
  <div class="form-group mb-3 p-2">
  <button type="submit" class="btn btn-dark mb-3 w-100"><b class="text-success">Iniciar sesión</b></button>
  <p>¿No tienes cuenta? Registrate <span><a href="#">aqui</a></span></p>
  </div>
</form>
    </div>
</body>
</html>