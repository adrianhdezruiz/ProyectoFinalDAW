$(document).ready(function(){

    
    /*------------GET----------*/

    $.get('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/userAdminControllerGET.php',function(response){


        //Obtener usuarios 

        var usuarios = JSON.parse(response);
        $('#totalUsuarios').html(usuarios.length);

        //Paginacion

        var paginaActual =1;

        var numIndices=3;
        var indiceActual=1;

        var totalUsuarios=usuarios.length;

        //El numero de usuarios que se muestran por pagina se guarda en el almacenamiento local, si no existe su valor por
        //defecto es 5
 
        if (localStorage.getItem("usuariosPagina") === null) { 

            localStorage.setItem("usuariosPagina","5"); 
         }

        var usuariosPagina=localStorage.getItem("usuariosPagina");
        $('#usuariosPagina').val(usuariosPagina);

        //Cambiar numero de usuarios mostrado

        $('#submitUsuariosPagina').click(function(){
            localStorage.setItem("usuariosPagina",$('#usuariosPagina').val());
            location.reload(); 
        })
       
        var numPaginas= Math.ceil(totalUsuarios/usuariosPagina);

        /*----------------------------------------------------------------*/

        var html = ` <li class="page-item  "><a class="page-link" id="prev"  tabindex="-1" aria-disabled="true">Anterior</a></li>`
        $('#pag').append(html);

        //Numeros indice paginacion

        var i = 1;
        while (i <= numPaginas && i<=numIndices) {
            var html = `<li class="page-item" id="indice${i}li"><a class="page-link" id="indice${i}" >${i}</a></li>`;
            $('#pag').append(html);
            i++;
        }
      
        var html = ` <li class="page-item "><a class="page-link" id="next"  tabindex="-1" aria-disabled="true">Siguiente</a></li>`
        $('#pag').append(html);

         /*----------------------------------------------------------------*/

         //Cargar n primeros elementos 

         for (let i = (paginaActual-1)*usuariosPagina; i <= (paginaActual*usuariosPagina)-1; i++) {
            var html = `   
            <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
            <div class="col-4 p-1">${usuarios[i].idUsuario}</div>
            <div class="col-4">${usuarios[i].email}</div>
            <div class="col-4">
                <a href="" class="ver" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                <a href="" class="editar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                <a href="" class="eliminar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
            </div>
            </div>`;

            $('#usuarios').append(html);
        }
         //Aplicar clase activo al indice

        $('#indice1li').addClass('page-item active');
        
         
        //Mostrar pagina anterior

        $(document).on('click','#prev',function(){

            $('#usuarios').empty();

            if (paginaActual>1) {
                paginaActual -= 1;

               if (indiceActual>1) {
                indiceActual-=1;

               }else{
                   indiceActual=3;

                   $('#indice1').html(paginaActual-3+1);
                   $('#indice2').html(paginaActual-2+1);
                   $('#indice3').html(paginaActual-1+1);

                   $('#indice1li').removeClass('page-item active');
                   $('#indice3li').removeClass('page-item active');
               }
            }

            for (let i = (paginaActual-1)*usuariosPagina; i <= (paginaActual*usuariosPagina)-1; i++) {
                var html = `   
                <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                <div class="col-4 p-1">${usuarios[i].idUsuario}</div>
                <div class="col-4">${usuarios[i].email}</div>
                <div class="col-4">
                    <a href="" class="ver" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                    <a href="" class="editar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                    <a href="" class="eliminar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
                </div>
                </div>`;
    
                //Mostrar contenido

                $('#usuarios').append(html);
            }

                //Modificar clase indice

                $("#indice"+indiceActual+"li").addClass('page-item active');
                $("#indice"+parseInt(indiceActual+1)+"li").removeClass('page-item active');
                //console.log(indiceActual);
            
        })

        //Mostrar pagina siguiente

        $(document).on('click','#next',function(){

            $('#usuarios').empty();

            if (paginaActual<numPaginas) {
                paginaActual += 1;
                

                if (indiceActual>= numIndices) {
                    $("#indice3li").removeClass('page-item active');
                    indiceActual=1;
                    $('#indice1').html(paginaActual);
                    $('#indice2').html(paginaActual+1);
                    $('#indice3').html(paginaActual+2);

                }else{
                    indiceActual+=1;
                }
            }

                //Modificar clase indice

                $("#indice"+parseInt(indiceActual-1)+"li").removeClass('page-item active');
                $("#indice"+indiceActual+"li").addClass('page-item active');
                //console.log(indiceActual);
              
              
                for (let i = (paginaActual-1)*usuariosPagina; i <= (paginaActual*usuariosPagina)-1; i++) {
                    var html = `   
                    <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">${usuarios[i].idUsuario}</div>
                    <div class="col-4">${usuarios[i].email}</div>
                    <div class="col-4">
                    <a href="" class="ver"  id="${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                    <a href="" class="editar"  id="${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                    <a href="" class="eliminar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
                    </div>
                    </div>`;
    
                $('#usuarios').append(html);
            }
        })

        
        /*------------POST----------*/
        
        //CREAR  1

        $('#addUsersLink').click(function(e){ 


            $('#display').empty();
            e.preventDefault();


            var html = `        <div class="row mt-5">
            <div class="col-12 border text-success fs-4">
                <div class="row">

                    <div class="col-12 border bg-secondary" style="text-align:end; "><img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>

                </div>
                <form method="POST" id="adminAddUser">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce nombre" id="adminNombre" maxlength="50" required pattern="[A-Za-zñÑÁÉÍÓÚáéíóú'-]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce apellidos" id="adminApellidos" maxlength="200" required pattern="[ A-Za-zñÑÁÉÍÓÚáéíóú'-]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " placeholder="Introduce telefono" id="adminTelefono" minlength="9" maxlength="9" required pattern="[0-9]*"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="email" style="width: 100%;height:100%; border:none " placeholder="Introduce email" id="adminEmail" maxlength="255" required></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white">
                            <select class="form-select fs-4" id="adminRol" style="border:none" aria-label="Default select example">
                                <option value="1">Admin</option>
                                <option value="2">Usuario</option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Contraseña</div>
                        <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="password" style="width: 100%;height:100%; border:none " placeholder="Introduce contraseña" id="adminContrasenya" minlength="8" maxlength="20" required  ></div>
                    </div>

                    <div class="row">

                        <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="adminAddUserSubmit" value="AÑADIR USUARIO"></div>
                    </div>
                </form>

            </div>

        </div>`

        $('#display').append(html); 

        $(document).on('click','#cerrarPanel',function(e){
            $('#display').empty();
        })

        $(document).on('submit','#adminAddUser',function(e){
            e.preventDefault();

            const data = {
                idAccion: 1,
                nombre: $('#adminNombre').val(),
                apellidos: $('#adminApellidos').val(),
                telefono: $('#adminTelefono').val(),
                email: $('#adminEmail').val(),
                rol: $('#adminRol').val(),
                contrasenya: $('#adminContrasenya').val(),
            }
            
                $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/userAdminControllerPOST.php',data,function (response){

                    if (response == 0) {
                        //console.log('Error al crear usuario');
                        var html = ` <div class="p-2 fs-4 bg-danger">ERROR AL REGISTRAR NUEVO USUARIO</div>`;
                        $('#result').append(html);
                        setTimeout(function(){$('#result').empty()}, 5000);
                    }else{
                        //console.log('Usuario creado con exito');
                        $('input').val('');
                        var html = `<div class="p-2 fs-4 bg-success">NUEVO USUARIO CREADO CON EXITO</div>`;
                        $('#result').append(html);
                        setTimeout(function(){$('#result').empty()},1000);
                        setTimeout(function(){location.reload()}, 2000);
                        
                    }
                })
        })

        })


        //EDITAR 2, VER 3, ELIMINAR 4

        $(document).on('click','#usuarios a',function(e){
            e.preventDefault();
            
            switch (e.currentTarget.className) {
                    //EDITAR
                case "editar":

                    $('#display').empty();
                    var selectedUser = usuarios.find(i => i.idUsuario === e.currentTarget.id);

                    var html = `
                    <div class="row ">
                        <div class="col-12 border text-success fs-4">
                            <div class="row">
                                <!--Icono cerrar-->
                                <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>
            
                            </div>
                            <form method="POST" id="adminEditUser">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2 fw-bold">Id</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none" id="adminIdEdit"  value="${selectedUser.idUsuario}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="adminNombreEdit" maxlength="50" required pattern="[A-Za-zñÑÁÉÍÓÚáéíóú'-]*" value="${selectedUser.nombre}"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="adminApellidosEdit" maxlength="200" required pattern="[ A-Za-zñÑÁÉÍÓÚáéíóú'-]*" value="${selectedUser.apellidos}"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " id="adminTelefonoEdit" minlength="9" maxlength="9" required pattern="[0-9]*" value="${selectedUser.telefono}"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="email" style="width: 100%;height:100%; border:none " id="adminEmailEdit" maxlength="255" required value="${selectedUser.email}"></div>
                            </div>
            
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white">
                                    <select class="form-select fs-4" style="border:none" aria-label="Default select example" id="adminRolEdit">
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Usuario</option>
                                    </select>
                                </div>
                            </div>
            
                            <div class="row">
            
                                <div class="col-12 border bg-secondary"> <input type="submit" style="width: 100%;height:100%; border:none" id="exampleInputEmail1" value="CONFIRMAR EDICION"></div>
                            </div>
                            </form>
            
                        </div>
            
                    </div>
                    `;
                    $('#display').append(html);

                    $(document).on('click','#cerrarPanel',function(e){
                        $('#display').empty();
                    })

                    $(document).on('submit','#adminEditUser',function(e){
                        e.preventDefault();

                        const data = {
                            idAccion:2,
                            id:$('#adminIdEdit').val(),
                            nombre: $('#adminNombreEdit').val(),
                            apellidos:$('#adminApellidosEdit').val(),
                            telefono:$('#adminTelefonoEdit').val(),
                            email:$('#adminEmailEdit').val(),
                            rol:$('#adminRolEdit').val(),
                        }
                        
                        $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/userAdminControllerPOST.php',data,function(response){

                            if (response == 0) {
                                //console.log('Error al crear usuario');
                                var html = ` <div class="p-2 fs-4 bg-danger">SE PRODUJO UN ERROR DURANTE LA EDICION</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()}, 5000);
                            }else{
                                //console.log('Usuario creado con exito');
                                var html = `<div class="p-2 fs-4 bg-success">USUARIO EDITADO CON EXITO</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()},1000);
                                setTimeout(function(){location.reload()}, 2000);
                                
                            }
                        })
                        
                    })
                    break;

                    //VER 
                case "ver":
                    $('#display').empty();
                    var selectedUser = usuarios.find(i => i.idUsuario === e.currentTarget.id);
                 
                        var html = `        <div class="row ">
                        <div class="col-12 border text-success fs-4">
                            <div class="row">
                                <!--Icono cerrar-->
                                <div class="col-12 border bg-secondary" style="text-align:end; color:red"> <img src="../../../Imagenes//cerrar-modified.png" id="cerrarPanel" width="2%" height="80%"></div>
            
                            </div>
                    
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2 fw-bold">Id</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.idUsuario}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Nombre</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none "  value="${selectedUser.nombre}"  readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Apellidos</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.apellidos}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Telefono</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.telefono}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Email</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none "  value="${selectedUser.email}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Fecha Registro</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.fechaRegistro}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Rol</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.idRol}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-12 border bg-success text-dark p-2">Confirmado</div>
                                <div class="col-lg-9 col-sm-12 border" style="background-color:white"> <input type="text" style="width: 100%;height:100%; border:none " value="${selectedUser.confirmado}" readonly></div>
                            </div>
            
                            <div class="row">
            
                                <div class="col-12 border bg-secondary"> .</div>
                            </div>
            
            
                        </div>
            
                    </div>`;

                        $('#display').append(html);

                        $(document).on('click','#cerrarPanel',function(e){
                            $('#display').empty();
                        })
                    break; 

                    //ELIMINAR
                case "eliminar":
                    
                    if (window.confirm("¿Estas seguro de que quieres eliminar este usuario?")) {
                        const data = {
                            idAccion:4,
                            id:e.currentTarget.id,
                        }

                        $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/userAdminControllerPOST.php',data,function(response){

                            if (response == 0) {
                                //console.log('Error al crear usuario');
                                var html = ` <div class="p-2 fs-4 bg-danger">NO SE PUEDO ELIMINAR EL USUARIO</div>`;
                                $('#result').append(html);
                                setTimeout(function(){$('#result').empty()}, 5000);
                            }else{
                                //console.log('Usuario creado con exito');
                                var html = `<div class="p-2 fs-4 bg-success">USUARIO ELIMINADO CON EXITO</div>`;
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

        //BUSCAR USUARIO 5

        $('#searchInput').keyup(function(){
            

            const data = {
                idAccion: 5,
                searchValue: $('#searchInput').val(),
            }

            $.post('http://'+window.location.hostname+'/ProyectoFinalDAW/Codigo/Controladores/userAdminControllerPOST.php',data,function(response){

            
                var usuarios = JSON.parse(response);

               if (response != 0) {
                   $('#usuarios').empty();
                   $('#searchError').html('');

                   for (let i = 0; i <= usuarios.length; i++) {
                    var html = `   
                    <div class="row d-flex text-center p-2 " style="border-bottom: 2px outset grey; ">
                    <div class="col-4 p-1">${usuarios[i].idUsuario}</div>
                    <div class="col-4">${usuarios[i].email}</div>
                    <div class="col-4">
                    <a href="" class="ver"  id="${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                    <a href="" class="editar"  id="${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                    <a href="" class="eliminar" id="${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
                    </div>
                    </div>`;
    
                $('#usuarios').append(html);
                 }       
               }else{
                   $('#searchError').html('No se encontraron resultados.');
               }

            })
        })
    })
  
})


