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
  <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">
  <form class="border w-50  bg-light text-center">

  <!-- Cabecera login-->
  <div class="container bg-dark w-100 p-1 mb-3">
    <p class="text-success text-center"><b>REGISTRO</b></p>
  </div>
  <!-- Formulario -->
   <div class="row">
       <!--Izqda-->
    <div class="col-6 ">
        <!--Nombre-->
        <div class="form-group p-2 ms-3">
            <label class="mb-3"><b>NOMBRE</b></label>
            <input type="text" class="form-control p-2" id="nombreRegistro" placeholder="Introduce tu nombre">
        </div>
         <!--Telefono-->
         <div class="form-group p-2 ms-3">
            <label class="mb-3"><b>TELEFONO</b></label>
            <input type="text" class="form-control p-2" id="telefonoRegistro"  placeholder="Introduce tu telefono">
        </div>
         <!--Contraseña-->
         <div class="form-group p-2 ms-3">
            <label class="mb-3"><b>CONTRASEÑA</b></label>
            <input type="password" class="form-control p-2" id="contrasenyaRegistro"  placeholder="Introduce tu contraseña">
        </div>
    </div>
       <!--Derecha-->
       <div class="col-6 ">
            <!--Apellidos-->
         <div class="form-group p-2 me-3">
            <label class="mb-3"><b>APELLIDOS</b></label>
            <input type="text" class="form-control p-2" id="apellidosRegistro"  placeholder="Introduce tus apellidos">
        </div>
         <!--Correo electrónico-->
         <div class="form-group p-2 me-3">
            <label class="mb-3"><b>EMAIL</b></label>
            <input type="email" class="form-control p-2" id="emailRegistro"  placeholder="Introduce tu email">
        </div>
         <!--Repetir contraseña-->
         <div class="form-group p-2 me-3">
            <label class="mb-3"><b>REPETIR CONTRASEÑA</b></label>
            <input type="password" class="form-control p-2" id="rcontrasenyaRegistro"  placeholder="Repite tu contraseña">
        </div>
         
       </div>
   </div> 
  <!--Boton-->
  <div class="form-group mb-3 mt-3 p-3">
  <button type="submit" class="btn btn-dark mb-3 w-100"><b class="text-success">Registrarse</b></button>
  <p>¿Ya tienes cuenta? <a href="../login.php">Inicia sesión</a></p>
  </div>
</form>
    </div>
    
</body>
</html>