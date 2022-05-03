$(document).ready(function(){


    $.get('http://localhost/Codigo/Controladores/marcaAdminControllerGET.php',function(response){


        var data = JSON.parse(response);

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
                        <a href="admin_modelos.php?id=${data["marcas"][i].idMarca}">Administrar | </a>
                        <a class="editar" id="${data["marcas"][i].idMarca}">Editar | </a>
                        <a class="eliminar" id="${data["marcas"][i].idMarca}">Eliminar</a>
                    </p>
                </div>
                <div id="editarMarca${data["marcas"][i].idMarca}">
                
                    
                </div>
            </div>
          
         `
            
        $('#marcas').append(html); 
        }
    })


})

//AÑADIR MARCA

$('#addMarcaLink').click(function(e){


    e.preventDefault();
    $('#addMarcaPanel').empty();

    var html = `
    <div class="col-10">
        <input type="text" class="form-control mt-2" id="addMarca" placeholder="Crea una nueva marca" style="height: 3rem;" maxlength="100" required>
    </div>
    <div class="col-2">
        <input type="button" id="addMarcaBtn" class="btn btn-success form-inline mt-1" value="Añadir" style="height: 3rem;">
        <button id="cerrarAddMarcaBtn" class="btn btn-danger form-inline mt-1 text-white" style="height: 3rem;width:4rem">X</button>
    </div>`

    $('#addMarcaPanel').append(html);


$(document).on('click','#cerrarAddMarcaBtn',function(){

    $('#addMarcaPanel').empty();
})    

$(document).on('click','#addMarcaBtn',function(){


    const data = {

        idAccion:1,
        nombre: $('#addMarca').val(),
    }

    $.post('http://localhost/Codigo/Controladores/marcaAdminControllerPOST.php',data,function(response){

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
})


//EDITAR

$(document).on('click','.editar',function(e){

    var id = e.currentTarget.id;

    var html = ` <div id="editarMarca">
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
                <input type="text" class="form-control" id="editarMarcaValue${id}" maxlength="100"/>
            </div>
            <input type="button" value="Confirmar edicion" class="btn btn-success form-control mt-3" id="editarMarcaBtn${id}">
        </div>
    </div>`

    
    $(document).on('click','#cerrarPanel',function(){
        $('#editarMarca'+e.currentTarget.id).empty();
    })

    $('#editarMarca'+e.currentTarget.id).empty();
    setTimeout(function(){$('#editarMarca'+e.currentTarget.id).append(html)},1);

    $(document).on('click','#editarMarcaBtn'+id,function(){

        const data = {
            idAccion:2,
            idMarca:id,
            nuevoNombre:$('#editarMarcaValue'+id).val(),
        }

        $.post('http://localhost/Codigo/Controladores/marcaAdminControllerPOST.php',data,function(response){

            if (response == 0) {
           
                var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL EDITAR LA MARCA</div>`;
                $('#result').append(html);
                setTimeout(function(){$('#result').empty()}, 5000);
            }else{
                
                var html = `<div class="p-2 fs-4 bg-success">MARCA EDITADA CON EXITO</div>`;
                $('#result').append(html);
                $('#addMarca').val('');
                setTimeout(function(){$('#result').empty()},1000);
                setTimeout(function(){location.reload()}, 2000);
                
            }
        })
       
    })
    
   
})


//ELIMINAR 

$(document).on('click','.eliminar',function(e){


    var id = e.currentTarget.id;

    const data = {
        idAccion:3,
        idMarca:id,
    }

   if(window.confirm("¿Estas seguro de que quieres eliminar esta marca?")){

    $.post('http://localhost/Codigo/Controladores/marcaAdminControllerPOST.php',data,function(response){

        if (response == 0) {
           
            var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL ELIMINAR LA MARCA</div>`;
            $('#result').append(html);
            setTimeout(function(){$('#result').empty()}, 5000);
        }else{
            
            var html = `<div class="p-2 fs-4 bg-success">MARCA ELIMINADA CON EXITO</div>`;
            $('#result').append(html);
            $('#addMarca').val('');
            setTimeout(function(){$('#result').empty()},1000);
            setTimeout(function(){location.reload()}, 2000);
            
        }

    })

   } 

 
})



