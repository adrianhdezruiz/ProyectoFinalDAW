<?php

include '../../config/dbconnection.php';
require_once '../../Modelos/usuario.php';
require_once '../../Modelos/marca.php';

session_start();


$idMarca = $_GET['id'];

$marca = new Marca();
$marcaActual = $marca->obtenerMarca("idMarca", $idMarca, $conn);

$user = new Usuario();

if (isset($_SESSION['userId'])) {
    $id = $_SESSION['userId'];
    $currentUser = $user->obtenerUsuario("idUsuario", $id, $conn);

    if ($currentUser['idRol'] == 1) {

        //Si el usuario es administrador comprobar que la cuenta este verificada
        if ($currentUser['confirmado'] == 0) {
            header("Location: ../Account/confirmar_registro.php");
        }
    } else {
        //Usuario no autorizado para acceder a administración
        header('HTTP/1.0 403 Forbidden');
        die("<h1>403 Acceso denegado</h1><br><p style='font-size: 1.5rem;'>No tienes permiso para acceder a este recurso.</p><hr>");
    }
} else {
    header("Location: ../Account/login.php");
}
?>
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
                    <?php if (!isset($_SESSION['userId'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../Account/login.php">Login | </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Account/registro.php">Registro | </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../Home/principal.php">Home |</a>
                    </li>

                    <?php if (isset($_SESSION['userId'])) { ?>
                        <!--Solo usuarios registrados-->
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/perfil_usuario.php">Mi perfil |</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Home/tickets_usuario.php">Mis tickets |</a>
                        </li>
                    <?php } ?>


                    <!----------------Administración------------------->
                    <?php if (isset($_SESSION['userId']) && $currentUser['idRol'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_index.php">Administración</a>
                        </li>
                    <?php } ?>

                </ul>
                <!--Solo usuarios registrados-->
                <?php if (isset($_SESSION['userId'])) { ?>
                    <ul class="navbar-nav ms-auto ">

                        <li class="nav-item p-1">
                            <a class="nav-link " href="#"><?= $currentUser['email'] ?> |</a>
                        </li>
                        <li class="nav-item  d-flex align-items-center ">
                            <form action="../../Controladores/AccountController.php" method="POST">
                                <input type="submit" name="logoutSubmit" value="Cerrar sesión" class="bg-light nav-link" style="border: none;">
                            </form>
                        </li>
                    </ul>
                <?php } ?>

            </div>
        </nav>
    </header>
    <main class="w-75" style="margin:auto">
        <h1 class="text-success fw-bold text-center m-4">
            <?php echo $marcaActual["nombre"] ?>
        </h1>


        <!--Panel que se mostrara cuando el administrador pulse en añadir modelo-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red">.</div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-lg-9 border col-sm-12" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce el nombre del modelo"></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Descripcion</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10">Introduce una descripción</textarea></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Introduce el precio por hora"></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12border bg-success text-dark p-2">Imagen</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="file" class="form-control p-3" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce apellido"></div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="AÑADIR MODELO"></div>
                </div>


            </div>

        </div>
        <!--Panel que se mostrara cuando el administrador pulse en añadir patin-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> .</div>

                </div>


                <div class="row">
                    <div class="col-lg-3 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-lg-9 border" style="background-color:white">
                        <select class="form-select fs-4" style="border:none" aria-label="Default select example">
                            <option value="1">Modelo1</option>
                            <option value="2">Modelo2</option>

                        </select>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="AÑADIR PATIN"></div>
                </div>


            </div>

        </div>

        <!--MODELOS-->

        <div class="row d-flex text-center p-2 mt-5  bg-success" style="border-bottom: 3px outset grey; " id="modelos">
            <div class="col-4 p-1"><a href="">+Añadir modelo</a></div>
            <div class="col-4 fs-4 ">MODELOS</div>
            <div class="col-4"></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">1</div>
            <div class="col-4">Modelo</div>
            <div class="col-4">
                <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">2</div>
            <div class="col-4">Modelo</div>
            <div class="col-4">
                <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">3</div>
            <div class="col-4">Modelo</div>
            <div class="col-4">
                <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">4</div>
            <div class="col-4">Modelo</div>
            <div class="col-4">
                <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">5</div>
            <div class="col-4">Modelo</div>
            <div class="col-4">
                <a href="" id="ver" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>




        <!--Panel que se mostrara cuando el administrador pulse en editar modelo-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce el nuevo nombre del modelo"></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Descripcion</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10">Introduce una nueva descripción</textarea></div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
                    <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Introduce el nuevo precio por hora"></div>
                </div>


                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="CONFIRMAR EDICION"></div>
                </div>


            </div>

        </div>

        <!--Panel que se mostrara cuando el administrador pulse en ver modelo-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-lg-9 col-sm-12">
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Id</div>
                            <div class="col-lg-9  col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" readonly placeholder="Id"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" readonly placeholder="Modelo"></div>
                        </div>

                        <div class="row">
                            <div class="col-3-lg col-sm-12 border bg-success text-dark p-2">Descripcion</div>
                            <div class="col-9-lg col-sm-12  border p-3" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10" readonly>Descripcion</textarea></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" readonly value="5"></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Fecha registro</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Fecha" readonly></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 bg-secondary">
                        <img src="../../../Imagenes/567213_00_1.jpg" width="100%" height="100%">
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 border bg-secondary"> .</div>
                </div>


            </div>

        </div>



        <!--PATINES-->
        <!--Order by Modelo-->

        <div class="row d-flex text-center p-2  bg-success mt-5" style="border-bottom: 3px outset grey; " id="modelos">
            <div class="col-4 p-1"><a href="">+Añadir patin</a></div>
            <div class="col-4 fs-4 ">PATINES</div>
            <div class="col-4"></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">1</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">2</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">3</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">4</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">5</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>

        <div class="row d-flex text-center p-2 bg-light" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">6</div>
            <div class="col-4">Modelo</div>
            <div class="col-4"><a href="">Eliminar</a></div>
        </div>





    </main>
</body>