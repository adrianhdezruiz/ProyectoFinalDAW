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
            <img src="../../Imagenes/logo1.png" id="logo_header" >
            <a href="../vistas/principal.php" class="fs-2">Volver</a>
        </header>

          <!--Main-->
          <main class="row w-100 mt-5 mb-5 border border-5" style="margin: auto; ">
          
          <!--Main Izqda -->
            <div class="col-12 col-lg-3 col-md-12 bg-dark text-success d-flex justify-content-center p-3 ">
                <div class="card" style="width: 40rem;">
                    <img class="card-img-top" src="../../Imagenes/567213_00_1.jpg" alt="Card image cap" style="height: 100%;">
                       
                </div>
            </div>
            
            <!--Main Derecha-->
            <div class="col-12 col-lg-9  col-md-12 bg-ligth  bg-light text-center">
                <!--Header-->
                <div class="row bg-dark ">
                    <h1 class="text-success">MODELO</h1>
                </div>

                <div class="row mt-3 fs-4">
                    
                    <div class="col-12  fs-4 mb-3">
                        
                        <h2 class="fw-bolder ">Descripcion</h2>
                        <hr>
                        <p class="blockquote fs-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores vero culpa perferendis possimus obcaecati quasi ratione harum optio error, explicabo molestias dolor. Commodi nemo quibusdam ipsum voluptates consectetur pariatur temporibus.ç
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt earum soluta sit suscipit nulla vero maiores deleniti veniam sunt facere quos voluptatum aut reiciendis sapiente error, exercitationem harum odit. Fugit.
                        </p>
                        <hr>
                        <h2 class="fw-bolder mb-4">Precio / hora: </h2>
                        <input type="text" class="mb-4" name="" id="" readonly value="5.00€ " style="border:inset; text-align:center">
                    </div>

                    <div class="row bg-dark mb-4 ms-0">
                    <h1 class="text-success">FECHA ALQUILER</h1>
                    </div>
                    
                    <div class="col-12 ">
                      <div class="row ">
                        <div class="col-6 b">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hora inicio</label>
                                <input type="time" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>

                        <div class="col-6 >
                        <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hora fin</label>
                                <input type="time" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                      </div>
                      <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fecha</label>
                                <input type="date" class="form-control text-center w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                </div>
                
            </div>
            </main>
        </div>
          

    </div>
</body>
</html>