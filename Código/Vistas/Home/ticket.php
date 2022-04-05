<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../sass/custom.css">
</head>

<body class="container-fluid bg-success">

    <!--Cabecera-->
    <header class="row bg-dark d-flex justify-content-center">
        <img src="../../../Imagenes/logo1.png" id="logo_header">

        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fs-4 navbar-center ">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="../Account/login.php">Login | </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../Account/registro.php">Registro | </a>
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
                        <a class="nav-link" href="../Account/login.php">Cerrar sesión</a>
                    </li>

                    <!----------------Administración------------------->
                    <li class="nav-item">
                        <a class="nav-link" href="../Admin/admin_index.php">| Administración</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main class="row w-50 fs-4 " style="margin: auto;position:absolute; top:30%; left:25%">

        <div class="col-12 bg-dark text-success p-1 text-center">TICKET</div>
        <a href="#" class="list-group-item list-group-item-action  " aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 fw-bolder">1234567890ABCDE</h5>
                <small><i>04/04/2022 | 12:00 - 13:00</i></small>
            </div>
            <p class="mb-1">user@gmail.com</p>
            <small>Marca1 Modelo1</small>
            <hr>
            <small class="blockquote-footer">TOTAL: X.XX €</small>
            <hr>
            <small class="d-flex justify-content-center"><input type="button" class="btn btn-primary rounded rounded-pill fs-4" value="Pagar con PayPal"></small>
        </a>

    </main>

</body>

</html>