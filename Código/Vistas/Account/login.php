<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../sass/custom.css">
</head>

<body>
  <!--Cabecera-->
  <header class="row bg-dark d-flex justify-content-center">
    <img src="../../../Imagenes/logo1.png" id="logo_header">

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
            <a class="nav-link" href="../Home/principal.php">Home |</a>
          </li>

          <!--Solo usuarios registrados-->
          <li class="nav-item">
            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets |</a>
          </li>

          <!--Solo usuarios registrados-->
          <li class="nav-item">
            <a class="nav-link" href="login.php">Cerrar sesión</a>
          </li>

          <!----------------Administración------------------->
          <li class="nav-item">
            <a class="nav-link" href="../Admin/admin_index.php">| Administración</a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">

    <form action="../../Controladores/AccountController.php" method="POST" class="needs-validation border w-25 bg-light text-center fs-5" style="position: absolute; top:35%" novalidate>

      <!-- Cabecera login-->
      <div class="container bg-dark w-100 p-1 mb-3">
        <p class="text-success text-center"><b>LOGIN</b></p>
      </div>
      <!--Email-->
      <div class="form-group p-2">
        <label class="mb-3"><b>EMAIL</b></label>
        <input type="email" class="form-control p-2" name="email" id="email" placeholder="Introduce tu email" maxlength="255" pattern="^[A-Za-z0-9áéíóúÁÉÍÓÚ_-\.]*@(gmail|outlook|yahoo)\.[a-z]{2,3}" required>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Introduce un email valido</div>

      </div>
      <!--Contraseña-->
      <div class="form-group mb-3 p-2">
        <label class="mb-3"><b>CONTRASEÑA</b></label>
        <input type="password" class="form-control p-2" name="contrasenya" id="contrasenya" placeholder="Contraseña" minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" required>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Introduce una contraseña valida</div>
      </div>
      <!--Boton-->
      <div class="form-group mb-3 p-2">
        <input type="submit" name="loginSubmit" class="btn btn-dark mb-3 w-100" value="Iniciar sesion"></input>
        <p>¿No tienes cuenta? Registrate <a href="registro.php">aqui</a></p>
      </div>
    </form>
  </div>

  <script src="../../js/validacion.js"></script>
</body>

</html>