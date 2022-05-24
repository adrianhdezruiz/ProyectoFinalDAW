$(document).ready(function(){


    const data ={
        idMarca:$('#idMarca').val(),
    }

    $.get('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/modeloAdminControllerGET.php',data,function(response){

            var modelos = JSON.parse(response);
            
           for (let i = 0; i < modelos.length; i++) {
               
            var html =`    <div class="row d-flex text-center p-2 bg-light fs-5" style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">${modelos[i]["idModelo"]}</div>
            <div class="col-4">${modelos[i]["nombre"]}</div>
            <div class="col-4">
                <a href="" class="ver" id="${modelos[i]["idModelo"]}"  style="text-decoration: none;">Ver |</a>
                <a href="" class="editar" id="${modelos[i]["idModelo"]}"  style="text-decoration: none;">Editar |</a>
                <a href="" class="eliminar" id="${modelos[i]["idModelo"]}" style="text-decoration: none;">Eliminar</a>
            </div>
        </div>`

            $('#modelos').append(html);
           }

           $(document).on('click','#modelos a',function(e){

            e.preventDefault();
            $('#display').empty();

            switch (e.currentTarget.className) {
                case "ver":
                var selectedModel = modelos.find(i => i.idModelo === e.currentTarget.id);
                var html =`    <div class="row ">
                <div class="col-12 border text-success fs-4">
                    <div class="row">
                        <!--Icono cerrar-->
                        <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>
    
                    </div>
    
                    <div class="row">
                        <div class="col-lg-9 col-sm-12">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Id</div>
                                <div class="col-lg-9  col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedModel.idModelo}" readonly placeholder="Id"></div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedModel.nombre}" readonly placeholder="Modelo"></div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Descripcion</div>
                                <div class="col-lg-9 col-sm-12  border p-3" style="background-color:white"> <textarea class="form-control" name="" id="" cols="30" rows="10" readonly>${selectedModel.descripcion}</textarea></div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " step="0.1" min="0" readonly value="${selectedModel.precioHora}"></div>
                            </div>
    
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Fecha registro</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedModel.fechaRegistro}" step="0.1" min="0" placeholder="Fecha" readonly></div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12 bg-secondary d-flex justify-content-center">
                            <img src="../../../Imagenes/Modelos/${selectedModel.imagen}" style="width:21rem; heigth:12rem">
                        </div>
                    </div>
                    <div class="row">
    
                        <div class="col-12 border bg-secondary"> .</div>
                    </div>
    
    
                </div>
    
            </div>`;

                $('#display').append(html);
                    $(document).on('click','#cerrarPanel',function(){
                    $('#display').empty();

                })
                    break;
                case "editar":

                    $('#display').empty();

                    var selectedModel = modelos.find(i => i.idModelo === e.currentTarget.id);

                    var html = `     <div class="row ">
                    <div class="col-12 border text-success fs-4">
                        <div class="row">
                            <!--Icono cerrar-->
                            <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>
        
                        </div>
        
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="nombreModeloEditar" value="${selectedModel.nombre}"></div>
                        </div>
        
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Descripcion</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <textarea class="form-control" name="" id="descripcionModeloEditar" cols="30" rows="10">${selectedModel.descripcion}</textarea></div>
                        </div>
        
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
                            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="precioModeloEditar" step="0.1" min="0" value="${selectedModel.precioHora}"></div>
                        </div>
        
        
                        <div class="row">
        
                            <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="editarModeloSubmit" value="CONFIRMAR EDICION"></div>
                        </div>
                    </div>
                </div>`;

                $('#display').append(html);

                $(document).on('click','#cerrarPanel',function(){
                $('#display').empty();
                })

                $(document).on('click','#editarModeloSubmit',function(){
                    const data = {
                        idAccion:2,
                        idModelo: e.currentTarget.id,
                        nombre:$('#nombreModeloEditar').val(),
                        descripcion:$('#descripcionModeloEditar').val(),
                        precioHora:$('#precioModeloEditar').val(),
                    }

                    $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/modeloAdminControllerPOST.php',data,function(response){

                    console.log(response);
                        if (response == 0) {
           
                            var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL EDITAR EL MODELO</div>`;
                            $('#result').append(html);
                            setTimeout(function(){$('#result').empty()}, 5000);
                        }else{
                            
                            var html = `<div class="p-2 fs-4 bg-success">MODELO EDITADO CON EXITO</div>`;
                            $('#result').append(html);
                            setTimeout(function(){$('#result').empty()},1000);
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    })
                })
                    break;
                case "eliminar":


                    if (window.confirm("¿Estas seguro de que quieres eliminar este modelo?")) {
                        const data = {
                            idAccion:3,
                            idModelo:e.currentTarget.id,
                        }

                        $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/modeloAdminControllerPOST.php',data,function(response){

                            if (response == 0) {
                              
                                var html = ` <div class="p-2 fs-4 bg-danger">NO SE PUEDO ELIMINAR EL MODELO</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()}, 5000);
                            }else{
                             
                                var html = `<div class="p-2 fs-4 bg-success">MODELO ELIMINADO CON EXITO</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()},1000);
                                setTimeout(function(){location.reload()}, 2000);
                                
                            }
                        })
                    }
                    break;
                default:
                    break;
            }
           })    
    })

    $.get('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/patinAdminControllerGET.php',data,function(response){

            var patin = JSON.parse(response);

            //OPCIONES SELECT

            for (let i = 0; i < patin["select"].length; i++) {
                var option = `<option value="${patin["select"][i]["idModelo"]}">${patin["select"][i]["nombre"]}</option>`;
                $('#selectPatin').append(option);
            }

            //MOSTRAR PATINES EN LA TABLA CON EL NOMBRE DEL MODELO

            for (let i = 0; i < patin["patines"].length; i++) {
                var html = ` <div class="row d-flex text-center p-2 bg-light fs-5" style="border-bottom: 2px outset grey; ">
                <div class="col-4 p-1">${patin["patines"][i]["idPatin"]}</div>
                <div class="col-4">${patin["patines"][i]["nombreModelo"]}</div>
                <div class="col-4" >
                    <a href="" id="${patin["patines"][i]["idPatin"]}" class="eliminar" style="text-decoration: none;">Eliminar</a>
                </div>`;
                $('#patines').append(html);
            }

            //AÑADIR PATIN

                $('#addPatin').click(function(e){
                    e.preventDefault();
                    $('#displayPatin').empty();
                    
                    var html = `
                    <div class="row">
                        <div class="col-12 border text-success fs-4">
                            <div class="row">
                                <!--Icono cerrar-->
                                <div class="col-12 border bg-secondary" style="text-align:end; color:red"><img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>
            
                            </div>
            
                            <div class="row">
                                <div class="col-lg-3 border bg-success text-dark p-2">Modelo</div>
                                <div class="col-lg-9 border" style="background-color:white">
                                    <select class="form-select fs-4" style="border:none" id="selectPatinAdd">
                                       
                                    </select>
                                </div>
                            </div>
            
                            <div class="row">
            
                                <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="patinAddSubmit" value="AÑADIR PATIN"></div>
                            </div>
            
                        </div>
                    </div>  `;


                    //OPCIONES SELECT

                    $('#displayPatin').append(html)
                    for (let i = 0; i < patin["select"].length; i++) {
                        var option = `<option value="${patin["select"][i]["idModelo"]}">${patin["select"][i]["nombre"]}</option>`;
                        $('#selectPatinAdd').append(option);
                    }

                    $(document).on('click','#cerrarPanel',function(){
                        $('#displayPatin').empty();
                    })

                    //AÑADIR PATIN

                    $(document).on('click','#patinAddSubmit',function(){

                        const data = {
                            idAccion:1,
                            idMarca:$('#idMarca').val(),
                            idModelo: $('#selectPatinAdd').val(),
                        }

                        $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/patinAdminControllerPOST.php',data,function(response){

                            if (response == 0) {
           
                                var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL CREAR EL PATIN</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()}, 5000);
                            }else{
                                
                                var html = `<div class="p-2 fs-4 bg-success">PATIN CREADO CON EXITO</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()},1000);
                                setTimeout(function(){location.reload()}, 2000);
                                
                            }
                        })
                    })
                    
                })

            /*ELIMINAR PATIN*/

            $(document).on('click','#patines .eliminar',function(e){
                e.preventDefault();
                
                if (window.confirm("¿Estas seguro de que quieres eliminar este patin?")) {
                    const data = {
                        idAccion:2,
                        idPatin: e.currentTarget.id,
                    }

                    
    
                    $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/patinAdminControllerPOST.php',data,function(response){
    
                        if (response == 0) {
    
                            var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL ELIMINAR EL PATIN</div>`;
                            $('#result').append(html);
                            setTimeout(function(){$('#result').empty()}, 5000);
                        }else{
                            
                            var html = `<div class="p-2 fs-4 bg-success">PATIN ELIMINADO CON EXITO</div>`;
                            $('#result').append(html);
                            setTimeout(function(){$('#result').empty()},1000);
                            setTimeout(function(){location.reload()}, 2000);
                            
                        }
                    })
                }
            })

            /*BUSCAR POR MODELO*/

            $('#search').click(function(e){
                e.preventDefault();
                $('#patines').empty();
                const data = {
                    idAccion:3,
                    idModelo:$('#selectPatin').val(),
                }
                    $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/patinAdminControllerPOST.php',data,function(response){
                        var search = JSON.parse(response)

                        for (let i = 0; i < search.length; i++) {

                            //OBTENER NOMBRES MODELOS
                            var idModeloPatin =  `${search[i]["idModelo"]}`;
                            var selectedModel = patin["patines"].find(i=>i.idModelo = idModeloPatin);
                            
                            var html = ` <div class="row d-flex text-center p-2 bg-light fs-5" style="border-bottom: 2px outset grey; ">
                            <div class="col-4 p-1">${search[i]["idPatin"]}</div>
                            <div class="col-4">${selectedModel["nombreModelo"]}</div>
                            <div class="col-4" >
                                <a href="" id="${search[i]["idPatin"]}" class="eliminar" style="text-decoration: none;">Eliminar</a>
                            </div>`;
                            $('#patines').append(html);
                        }
                    })
            })

    })
})

//1 AÑADIR MODELO

$('#anadirModeloEnlace').click(function(e){

    $('#display').empty();
    e.preventDefault();

    var html = ` 
    <div class="row">
    <form method="POST" enctype="multipart/form-data" id="anadirModeloForm">
    <div class="col-12 border text-success fs-4">
        <div class="row">
            <!--Icono cerrar-->
            <div class="col-12 border bg-secondary" style="text-align:end; color:red"><img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Modelo</div>
            <div class="col-lg-9 border col-sm-12" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="nombreModelo" placeholder="Introduce el nombre del modelo" maxlength="100" required></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Descripcion</div>
            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <textarea class="form-control"  cols="30" rows="10" id="descripcionModelo" required>Introduce una descripción</textarea></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Precio / hora</div>
            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="number" style="width: 100%;height:100%; border:none " id="precioHoraModelo" step="0.1" min="0" placeholder="Introduce el precio por hora" required></div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-12border bg-success text-dark p-2">Imagen <span class="fs-5">*jpg,png</span></div>
            <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="file" class="form-control p-3" style="width: 100%;height:100%; border:none " id="imagenModelo" name="imagenModelo" placeholder="Introduce apellido"></div>
        </div>

        <div class="row">

            <div class="col-12 border bg-secondary"><input type="submit" style="width: 100%;height:100%; border:none" id="anadirModelo" value="AÑADIR MODELO"></div>
        </div>


    </div>
    </form>

</div>

`;

    $('#display').append(html);

    $(document).on('click','#cerrarPanel',function(){
        $('#display').empty();
    })

    /*ENVIAR DATOS MODELO*/

    $(document).on('submit','#anadirModeloForm',function(e){

        e.preventDefault();

        var fd = new FormData();

        var files = $('#imagenModelo')[0].files[0];
        var modelo = $('#nombreModelo').val();
        var descripcion = $('#descripcionModelo').val();
        var precio = $('#precioHoraModelo').val();
        var idMarca = $('#idMarca').val();

        fd.append('file',files);
        fd.append('idAccion',1);
        fd.append('modelo',modelo);
        fd.append('descripcion',descripcion);
        fd.append('precio',precio);
        fd.append('idMarca',idMarca);


        $.ajax({
            url : 'http://localhost/Codigo/Controladores/modeloAdminControllerPOST.php',
            type: "POST",
            data : fd,
            processData: false,
            contentType: false,
            success:function(response){

                console.log(response);
    
                if (response == 0) {
           
                    var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL CREAR EL MODELO</div>`;
                    $('#result').append(html);
                    setTimeout(function(){$('#result').empty()}, 5000);
                }else{
                    
                    var html = `<div class="p-2 fs-4 bg-success">MODELO CREADA CON EXITO</div>`;
                    $('#result').append(html);
                    setTimeout(function(){$('#result').empty()},1000);
                    setTimeout(function(){location.reload()}, 2000);
                    
                }

            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown); 
            }
        });
    })



})
