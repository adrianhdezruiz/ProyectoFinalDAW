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

    <main class="row  bg-success w-50 mt-5 d-flex justify-content-center" style="margin: auto;">
        <div class="col-12 w-75 bg-dark text-success text-center p-2 fs-4  ">CONFIRMAR REGISTRO</div>

        <form class="row w-75 border bg-light d-flex justify-content-center" action="../../Controladores/AccountController.php" method="POST">
            <div class="col-2"><input type="text" name="cod1" id="cod1" maxlength="1" class="text-center mb-4 mt-4 w-100  border border-4 fs-4" style="height: 5rem;"></div>
            <div class="col-2"><input type="text" name="cod2" id="cod2" maxlength="1" class="text-center mb-4 mt-4 w-100  border border-4 fs-4" style="height: 5rem;"></div>
            <div class="col-2"><input type="text" name="cod3" id="cod3" maxlength="1" class="text-center mb-4 mt-4 w-100  border border-4 fs-4" style="height: 5rem;"></div>
            <div class="col-2"><input type="text" name="cod4" id="cod4" maxlength="1" class="text-center mb-4 mt-4 w-100  border border-4 fs-4" style="height: 5rem;"></div>
            <div class="col-2"><input type="text" name="cod5" id="cod5" maxlength="1" class="text-center mb-4 mt-4  w-100  border border-4 fs-4" style="height: 5rem;"></div>
            <div class="col-2"><input type="text" name="cod6" id="cod6" maxlength="1" class="text-center mb-4 mt-4 w-100  border border-4 fs-4" style="height: 5rem;"></div>

            <input type="submit" value="Confirmar" name="confirmSubmit" class="form-control bg-dark text-success fs-5" style="border: none;">

        </form>

    </main>

    <div></div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {

            var i = 1;
            $('#cod1').focus();

            $('input').keypress(function() {
                i++;
                $('#cod' + i).focus();
                //e.target.id

            })
        })
    </script>

</body>

</html>