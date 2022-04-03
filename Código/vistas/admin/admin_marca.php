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
        <div class="row bg-dark ">
            <div class="col-10">
                <input type="text" class="form-control mt-2" placeholder="Crea una nueva marca" style="height: 3rem;">
            </div>
            <div class="col-2"><input type="button" class="btn btn-success form-control mt-2" value="Añadir" style="height: 3rem;"></div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 1</div>
                    <div class="card-body text-dark">
                        <ul>
                            <li class="card-title">Nº de modelos: 3</li>
                            <li class="card-title">Nº de patines: 5</li>
                        </ul>
                        <p class="card-text text-center fs-5">
                            <a href="admin_modelos.php">Administrar | </a>
                            <a href="#">Editar | </a>
                            <a href="#">Eliminar</a>
                        </p>
                    </div>

                    <!--Se desplegará cuando el usuario pulse en editar-->

                    <div id="editarMarca">
                        <div class="card-header text-center fw-bold bg-success d-flext justify-content-center text-success">
                            .
                            <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="10%" height="80%" style="float:right;">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5" style="font-size: 1rem;">
                                    Nuevo nombre marca:
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control">
                                </div>
                                <input type="button" value="Confirmar edicion" class="btn btn-success form-control mt-3">
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------->
                </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 2</div>
                    <div class="card-body text-dark">
                        <ul>
                            <li class="card-title">Nº de modelos: 3</li>
                            <li class="card-title">Nº de patines: 5</li>
                        </ul>
                        <p class="card-text text-center fs-5">
                            <a href="admin_modelos.php">Administrar | </a>
                            <a href="#">Editar | </a>
                            <a href="#">Eliminar</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 3</div>
                    <div class="card-body text-dark">
                        <ul>
                            <li class="card-title">Nº de modelos: 3</li>
                            <li class="card-title">Nº de patines: 5</li>
                        </ul>
                        <p class="card-text text-center fs-5">
                            <a href="admin_modelos.php">Administrar | </a>
                            <a href="#">Editar | </a>
                            <a href="#">Eliminar</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 4</div>
                    <div class="card-body text-dark">
                        <ul>
                            <li class="card-title">Nº de modelos: 3</li>
                            <li class="card-title">Nº de patines: 5</li>
                        </ul>
                        <p class="card-text text-center fs-5">
                            <a href="admin_modelos.php">Administrar | </a>
                            <a href="#">Editar | </a>
                            <a href="#">Eliminar</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
                <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                    <div class="card-header text-center fw-bold bg-success">Marca 5</div>
                    <div class="card-body text-dark">
                        <ul>
                            <li class="card-title">Nº de modelos: 3</li>
                            <li class="card-title">Nº de patines: 5</li>
                        </ul>
                        <p class="card-text text-center fs-5">
                            <a href="admin_modelos.php">Administrar | </a>
                            <a href="#">Editar | </a>
                            <a href="#">Eliminar</a>
                        </p>
                    </div>
                </div>
            </div>



        </div>
    </main>

</body>