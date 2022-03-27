<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../sass/custom.css">
</head>

<body class="bg-dark">
    <!--Cabecera-->
    <header class="row bg-success d-flex justify-content-center">
        <img src="../../../Imagenes/logo2-modified.png" id="logo_header_admin" class="m-3" style="width: 13%;height:13%;">

        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fs-4 navbar-center ">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="../login.php">Login | </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../registro.php">Registro | </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../principal.php">Home |</a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <li class="nav-item">
                        <a class="nav-link" href="../tickets_usuario.php">Mis tickets |</a>
                    </li>

                    <!--Solo usuarios registrados-->
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">Cerrar sesión</a>
                    </li>

                    <!----------------Administración------------------->
                    <li class="nav-item">
                        <a class="nav-link" href="admin_index.php">| Administración</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main class="row  w-50 text-success fs-3 " style="margin: auto; position:absolute; top:30%;left:25%">
        <h1 class="text-success text-center fw-bold">PANEL DE ADMINISTRACION</h1>
        <div class="col-12 mt-3">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex align-items-center text-center rounded-3" onclick="location.href=''" style="height: 10rem;">
                <img src="../../../Imagenes/icono2-modified.png" class="img-fluid me-3 ">
                USUARIOS
            </button>
        </div>

        <div class="col-12 ">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex align-items-center rounded-3" onclick="location.href=''" style="height: 10rem;">
                <img src="../../../Imagenes/icono4-modified.png" class="img-fluid me-3 rounded-3" style="height: 87px; width:83px">
                PATINES
            </button>
        </div>

        <div class="col-12 ">
            <button class="w-100 bg-success p-4 m-3 fw-bold d-flex  align-items-center rounded-3" onclick="location.href=''" style="height: 10rem;">
                <img src="../../../Imagenes/icono3-modified.png" class="img-fluid me-3 ">
                TICKETS
            </button>
        </div>

    </main>
</body>

</html>