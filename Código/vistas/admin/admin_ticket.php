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
    <main class="w-75 " style="position:absolute; left:15%">
        <h1 class="text-success fw-bold text-center m-5">TICKETS</h1>

        <div class="row">
            <div class="col-3 me-2 bg-success p-1 mb-1">
                <p class="text-center fs-3" style="line-height: 24px;">BUSCAR TICKET</p>
            </div>
            <div class="col-8 bg-success p-1 mb-1">
                <div class="row">
                    <div class="col-7">
                        <p class=" fs-3" style="line-height: 24px;display:inline; float:right">TICKETS ACTIVOS</p>
                    </div>
                    <div class="col-5 "><img src="../../../Imagenes/159657.png" id="actualizarTicketsActivos" class="m-2 me-3" width="5%" height="50%" style="float:right"></div>
                </div>
            </div>

        </div>

        <div class=" row">
            <div class="col-3 me-2 bg-dark p-1">
                <ul class="list-group  ">

                    <li class="list-group-item p-3 border border-0 bg-secondary">
                        <div class="row ">
                            <div class="col-9"><input type="text" class="form-control" placeholder="Introduce la ID del ticket ..."></div>

                            <div class="col-3"><input type="button" class="form-control" value="Buscar "></div>
                            <span></span>
                        </div>
                    </li>
                    <li class="list-group-item   p-3 border border-0">USUARIO:</li>
                    <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
                    <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
                    <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
                    <li class="list-group-item  p-3 border border-0">MARCA: </li>
                    <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
                    <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
                </ul>
            </div>
            <div class="col-8 bg-dark">
                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>
                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>

                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>

                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>

                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>

                <div class="row ">
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">ID</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Usuario</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Fecha</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Hora inicio - Hora fin</div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Precio </div>
                    <div class="col-2 bg-light p-3 text-center mt-1 mb-1">Patin <span class="me-2" style="float:right">🟢</span></div>
                </div>



            </div>

        </div>

    </main>
</body>

</html>