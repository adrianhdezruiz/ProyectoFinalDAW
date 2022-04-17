$(document).ready(function(){


    $.get('http://localhost/Codigo/Controladores/marcaAdminControllerGET.php',function(response){


        var data = JSON.parse(response);

        console.log(data["marcas"][1].nombre);

        for (let i = 0; i < data["marcas"].length; i++) {
            var html = `      <div class="col-lg-4 col-md-6 col-sm-12 fs-4 mt-4 ">
            <div class="card border-secondary border border-5 mb-3  mt-4" style="max-width: 24rem;">
                <div class="card-header text-center fw-bold bg-success">${data["marcas"][i].nombre}</div>
                <div class="card-body text-dark">
                    <ul>
                        <li class="card-title">Nº de modelos: ${data["count"][i].numModelos}</li>
                        <li class="card-title">Nº de patines: ${data["count"][i].numPatines}</li>
                    </ul>
                    <p class="card-text text-center fs-5">
                        <a href="admin_modelos.php">Administrar | </a>
                        <a class="editar" id="$(data["marcas"][i].idMarca)">Editar | </a>
                        <a class="eliminar" id="(data["marcas"][i].idMarca)">Eliminar</a>
                    </p>
                </div>
            </div>
        </div>   `
            
        $('#marcas').append(html);
        }
    })


})

//AÑADIR MARCA

$('#addMarcaBtn').click(function(response){


    const data = {

        idAccion:1,
        nombre: $('#addMarca').val(),
    }

    $.post('http://localhost/Codigo/Controladores/marcaAdminControllerPOST.php',data,function(response){

    console.log(response);

    console.log(response);

        if (response == 0) {
           
            var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL CREAR LA MARCA</div>`;
            $('#result').append(html);
            setTimeout(function(){$('#result').empty()}, 5000);
        }else{
            
            var html = `<div class="p-2 fs-4 bg-success">MARCA CREADA CON EXITO</div>`;
            $('#result').append(html);
            $('#addMarca').val('');
            setTimeout(function(){$('#result').empty()},1000);
            setTimeout(function(){location.reload()}, 2000);
            
        }
    })
})

