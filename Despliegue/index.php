<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Codigo/sass/custom.css">
</head>

<body class="bg-secondary">
    <!--Cabecera-->
    <header class="row bg-dark d-flex justify-content-center">
        <img src="../Imagenes/logo1.png" id="logo_header" alt="logo">
    </header>
    <div style="margin:auto;border:1px solid black" class="w-50 p-3 mt-5">
        <h1>INSTALADOR</h1>
        <form method="POST" action="instalador.php">

            <div class="mb-3">
                <label for="bbdd" style="font-weight:bold;" class="text-center">Nombre base de datos</label>
                <input type="text" id="bbdd" readonly value="bdd" class="form-control">
            </div>
            <div class="mb-3">
                <label for="bbdd" style="font-weight:bold;" class="text-center">Usuario BBDD</label>
                <input type="text" id="bbdd" readonly value="debianDB" class="form-control">
            </div>
            <div class="mb-3">
                <label for="bbdd" style="font-weight:bold;" class="text-center">Contraseña BBDD</label>
                <input type="text" id="bbdd" readonly value="debianDB" class="form-control">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked readonly>
                <label class="form-check-label" for="flexCheckChecked">
                    Seed
                </label>
            </div>
            <input type="submit" value="Instalar" name="instalar" class="bg-dark text-light btn btn-dark mt-3">
        </form>

    </div>

</body>


</html>