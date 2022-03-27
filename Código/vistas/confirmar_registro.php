<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../sass/custom.css">
</head>

<body class="container-fluid bg-success">

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
                        <a class="nav-link" href="tickets_usuario.php">Mis tickets |</a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Cerrar sesión</a>
                    </li>

                    <!----------------Administración------------------->
                    <li class="nav-item">
                        <a class="nav-link" href="admin/admin_index.php">| Administración</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!--REDIRECCIONAR A MAIN-->

    <div class="container-fluid border d-flex justify-content-center align-items-center vh-100 bg-success">

        <form class="border w-25 bg-light text-center fs-5" style="position: absolute; top:35%">

            <div class="container bg-dark w-100 p-1 mb-3">
                <p class="text-success text-center"><b>CONFIRMAR REGISTRO</b></p>
            </div>

            <div class="form-group p-2">
                <label class="mb-3"><b>CODIGO</b></label>
                <input type="text" class="form-control p-2" id="email" aria-describedby="emailHelp" placeholder="Introduce el código enviado a tu correo">
                <span id="error"></span>

                <!--Boton-->
                <div class="form-group mb-3 mt-3 p-2">
                    <button type="submit" class="btn btn-dark mb-3 w-100"><b class="text-success">Enviar</b></button>

                </div>
        </form>
    </div>

</body>

</html>