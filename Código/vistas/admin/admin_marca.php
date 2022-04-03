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

    <main class="w-50 mt-5" style="margin: auto;">
        <h1 class="text-success fw-bold text-center m-3">MARCAS</h1>
        <div class="row">

            <div class="col-4 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 1</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Nº de modelos: 3</h5>
                        <h5 class="card-title">Nº de patines: 5</h5>
                        <p class="card-text text-center"><a href="admin_modelos.php">Administrar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-4 fs-4 mt-4">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 2</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Nº de modelos: 3</h5>
                        <h5 class="card-title">Nº de patines: 5</h5>
                        <p class="card-text text-center"><a href="admin_modelos.php">Administrar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-4 fs-4 mt-4">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 3</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Nº de modelos: 2</h5>
                        <h5 class="card-title">Nº de patines: 4</h5>
                        <p class="card-text text-center"><a href="admin_modelos.php">Administrar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-4 fs-4 mt-4">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 4</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Nº de modelos: 2</h5>
                        <h5 class="card-title">Nº de patines: 1</h5>
                        <p class="card-text text-center"><a href="admin_modelos.php">Administrar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-4 fs-4 mt-4">
                <div class="card border-secondary border border-5 mb-3 mt-4" style="max-width: 18rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 5</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">Nº de modelos: 4</h5>
                        <h5 class="card-title">Nº de patines: 7</h5>
                        <p class="card-text text-center"><a href="admin_modelos.php">Administrar</a></p>
                    </div>
                </div>
            </div>
        </div>



    </main>

</body>