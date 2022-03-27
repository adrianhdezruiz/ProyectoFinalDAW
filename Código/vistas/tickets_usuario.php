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

    <main class="row w-100 fs-4 " style="margin: auto;position:absolute; top:25%; ">

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12">
            <li class="list-group-item bg-dark text-success text-center">TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12 ">
            <li class="list-group-item bg-dark text-success text-center">TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12">
            <li class="list-group-item bg-dark text-success text-center">TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12">
            <li class="list-group-item bg-dark text-success text-center"> TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12">
            <li class="list-group-item bg-dark text-success text-center">TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>

        <ul class="list-group mb-4 col-lg-4 col-md-6 col-sm-12">
            <li class="list-group-item bg-dark text-success text-center">TICKET</li>
            <li class="list-group-item p-3 border border-0">ID TICKET:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">FECHA:</li>
            <li class="list-group-item  p-3 border border-0">HORA INICIO:</li>
            <li class="list-group-item bg-secondary  p-3 border border-0">HORA FIN:</li>
            <li class="list-group-item  p-3 border border-0">MARCA: </li>
            <li class="list-group-item p-3 border bg-secondary  border-0">MODELO: </li>
            <li class="list-group-item p-3 border border-0">PRECIO FINAL: </li>
        </ul>



    </main>

</body>

</html>