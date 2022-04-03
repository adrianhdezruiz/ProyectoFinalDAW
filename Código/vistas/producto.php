<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../sass/custom.css">
</head>

<body class="bg-success">
    <div class="container-fluid bg-success " style="height: 950px;">

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
                            <a class="nav-link" href="admin/admin_index.php">| Administracion</a>
                        </li>


                    </ul>
                </div>
            </nav>
        </header>

        <!--Main-->
        <main class="row w-75 mt-5 mb-5 border border-5 " style="margin: auto; ">

            <!--Main Izqda -->
            <div class="col-12 col-lg-5 col-md-12 col-sm-12 bg-dark text-success d-flex justify-content-center p-3 ">
                <div class="card" style="width: 45em;">
                    <img class="card-img-top" id="img" src="../../Imagenes/567213_00_1.jpg" style="height: 100%;" data-zoom-image="../../Imagenes/567213_00_1.jpg">

                </div>
            </div>

            <!--Main Derecha-->
            <div class="col-12 col-lg-7  col-md-12 col-sm-12 bg-ligth  bg-light text-center">
                <!--Header-->
                <div class="row bg-dark ">
                    <h1 class="text-success">MODELO</h1>
                </div>

                <div class="row mt-3 fs-4">

                    <div class="col-12  fs-4 mb-3">

                        <h2 class="fw-bolder ">Descripcion</h2>
                        <hr>
                        <p class="blockquote fs-4 mb-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores vero culpa perferendis possimus obcaecati quasi ratione harum optio error, explicabo molestias dolor. Commodi nemo quibusdam ipsum voluptates consectetur pariatur temporibus.ç
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt earum soluta sit suscipit nulla vero maiores deleniti veniam sunt facere quos voluptatum aut reiciendis sapiente error, exercitationem harum odit. Fugit.
                        </p>
                        <hr>
                        <h2 class="fw-bolder mb-4">Precio / hora: </h2>
                        <input type="text" class="mb-4" name="" id="" readonly value="5.00€ " style="border:inset; text-align:center">
                    </div>

                    <div class="row bg-dark mb-4 ms-0">
                        <h1 class="text-success">DATOS ALQUILER</h1>
                    </div>

                    <form action="ticket.php">
                        <div>
                            <label for="exampleInputEmail1" class="form-label fw-bold">Fecha</label>
                            <input type="date" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <hr>
                        <div class="col-12 ">
                            <div class="row ">
                                <div class="col-6 b">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Hora inicio</label>
                                        <input type="time" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-6">

                                    <label for=" exampleInputEmail1" class="form-label fw-bold">Hora fin</label>
                                    <input type="time" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Ir a pagar" class="btn btn-dark text-success m-3 fs-4">
                    </form>
                </div>

            </div>
        </main>
    </div>

</body>

</html>