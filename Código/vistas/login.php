<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../sass/custom.css">
</head>

<body>
  <!--Cabecera-->
  <header class="row bg-dark d-flex justify-content-center">
    <img src="../../Imagenes/logo1.png" id="logo_header">

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fs-4 navbar-center ">

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login | </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="registro.php">Registro | </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="principal.php">Home |</a>
          </li>

          <!--Solo usuarios registrados-->
          <li class="nav-item">
            <a class="nav-link" href="tickets_usuario.php">Ver mis tickets |</a>
          </li>

          <!--Solo usuarios registrados-->
          <li class="nav-item">
            <a class="nav-link" href="login.php">Cerrar sesión</a>
          </li>

          <!----------------Administración-------------------
          <li class="nav-item">
            <a class="nav-link" href="login.php">Panel administrador</a>
          </li>
          ---------------------------------------------------->

        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">

    <form class="border w-25 bg-light text-center fs-5" style="position: absolute; top:35%">

      <!-- Cabecera login-->
      <div class="container bg-dark w-100 p-1 mb-3">
        <p class="text-success text-center"><b>LOGIN</b></p>
      </div>
      <!--Email-->
      <div class="form-group p-2">
        <label class="mb-3"><b>EMAIL</b></label>
        <input type="email" class="form-control p-2" id="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
        <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con nadie mas.</small>
      </div>
      <!--Contraseña-->
      <div class="form-group mb-3 p-2">
        <label class="mb-3"><b>CONTRASEÑA</b></label>
        <input type="password" class="form-control p-2" id="contrasenya" placeholder="Contraseña">
      </div>
      <!--Boton-->
      <div class="form-group mb-3 p-2">
        <button type="submit" class="btn btn-dark mb-3 w-100"><b class="text-success">Iniciar sesión</b></button>
        <p>¿No tienes cuenta? Registrate <a href="registro.php">aqui</a></p>
      </div>
    </form>
  </div>

</body>

</html>