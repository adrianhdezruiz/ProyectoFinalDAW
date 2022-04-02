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
    <main class="w-75" style="margin:auto">
        <h1 class="text-success fw-bold text-center m-4">MARCA 1</h1>

        <!--MODELOS-->

        <div class="row d-flex text-center p-2  bg-success" style="border-bottom: 3px outset grey; " id="modelos">
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



        <!--Panel que se mostrara cuando el administrador pulse en añadir modelo-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce el nombre del modelo"></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Descripcion</div>
                    <div class="col-9 border" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10">Introduce una descripción</textarea></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Precio / hora</div>
                    <div class="col-9 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Introduce el precio por hora"></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Imagen</div>
                    <div class="col-9 border" style="background-color:white"> <input type="file" class="form-control p-3" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce apellido"></div>
                </div>

                <div class="row">

                    <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="AÑADIR MODELO"></div>
                </div>


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
                    <div class="col-3 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce el nuevo nombre del modelo"></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Descripcion</div>
                    <div class="col-9 border" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10">Introduce una nueva descripción</textarea></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Precio / hora</div>
                    <div class="col-9 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Introduce el nuevo precio por hora"></div>
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
                    <div class="col-9">
                        <div class="row">
                            <div class="col-3 border bg-success text-dark p-2">Id</div>
                            <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" readonly placeholder="Id"></div>
                        </div>

                        <div class="row">
                            <div class="col-3 border bg-success text-dark p-2">Modelo</div>
                            <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" readonly placeholder="Modelo"></div>
                        </div>

                        <div class="row">
                            <div class="col-3 border bg-success text-dark p-2">Descripcion</div>
                            <div class="col-9 border p-3" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10" readonly>Descripcion</textarea></div>
                        </div>

                        <div class="row">
                            <div class="col-3 border bg-success text-dark p-2">Precio / hora</div>
                            <div class="col-9 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" readonly value="5"></div>
                        </div>

                        <div class="row">
                            <div class="col-3 border bg-success text-dark p-2">Fecha registro</div>
                            <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" step="0.1" min="0" placeholder="Fecha" readonly></div>
                        </div>
                    </div>
                    <div class="col-3 bg-secondary">
                        <img src="../../../Imagenes/567213_00_1.jpg" width="100%" height="100%">
                    </div>
                </div>
                <div class="row">

                    <div class="col-12 border bg-secondary"> .</div>
                </div>


            </div>

        </div>

        <!--Panel que se mostrara cuando el administrador pulse en añadir patin-->

        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">
                    <!--Icono cerrar-->
                    <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Nº de serie</div>
                    <div class="col-9 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="exampleInputEmail1" placeholder="Introduce el numero de serie"></div>
                </div>

                <div class="row">
                    <div class="col-3 border bg-success text-dark p-2">Modelo</div>
                    <div class="col-9 border" style="background-color:white">
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