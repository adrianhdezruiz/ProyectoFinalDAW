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
                        <a class="nav-link" href="../Account/login.php">Login | </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../Account/registro.php">Registro | </a>
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
                        <a class="nav-link" href="../Account/login.php">Cerrar sesión</a>
                    </li>

                    <!----------------Administración------------------->
                    <li class="nav-item">
                        <a class="nav-link" href="admin_index.php">| Administración</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <main class=" w-75 " style="margin: auto;">
        <h1 class="text-success fw-bold text-center m-4">USUARIOS</h1>

        <div class="row fs-5">
            <div class="col-12 border bg-light">

                <div class="row d-flex text-center p-2 " style="border-bottom: 3px outset grey; ">
                    <div class="col-lg-3 p-1">
                        <a href="">+ Añadir usuario</a>
                    </div>
                    <div class="col-lg-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center align-items-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Siguiente</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3  fs-5">
                        <input type="text" class="p-1 rounded rounded-3" style="width: 80%; position:relative;top:7%" placeholder="Buscar usuario por correo">
                        <button class="btn btn-success">Buscar</button>

                    </div>
                </div>



                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">1</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>

                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">2</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>


                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">3</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>


                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">4</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>

                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">5</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>

                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">6</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>

                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">7</div>
                    <div class="col-4">user@gmail.com</div>
                    <div class="col-4">
                        <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                        <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                        <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
                    </div>
                </div>



            </div>

        </div>

        <!--Panel que se mostrará cuando el administrador seleccione Añadir usuario-->
        <!-- Los usuarios creados por el administrador no requieren de confirmación-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce nombre"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce apellido"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce telefono"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce email"></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white">
                        <select class="form-select fs-4" style="border:none" aria-label="Default select example">
                            <option value="1">Admin</option>
                            <option value="2">Usuario</option>

                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Contraseña</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce contraseña"></div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="AÑADIR USUARIO"></div>
                </div>


            </div>

        </div>


        <!--Panel que se mostrará cuando el administrador seleccione Editar-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2 fw-bold">Id</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Id" readonly></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce nuevo nombre"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce nuevo apellido"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce nuevo telefono"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce nuevo email"></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white">
                        <select class="form-select fs-4" style="border:none" aria-label="Default select example">
                            <option value="1">Admin</option>
                            <option value="2">Usuario</option>

                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="CONFIRMAR EDICION"></div>
                </div>


            </div>

        </div>

        <!--Panel que se mostrará cuando el administrador seleccione Ver-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2 fw-bold">Id</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Id" readonly></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Nombre" readonly></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Apellido" readonly></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Telefono" readonly></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Email"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Fecha Registro</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Fecha registro"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Rol"></div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> .</div>
                </div>


            </div>

        </div>

    </main>


</body>

</html>