$(document).ready(function(){

    
    $.get('http://localhost/Codigo/Controladores/AdminController.php',function(response){


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

        var html = ` <li class="page-item "><a class="page-link" id="prev"  tabindex="-1" aria-disabled="true">Anterior</a></li>`
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
                <a href="" id="ver${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                <a href="" id="editar${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                <a href="" id="eliminar${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
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
                    <a href="" id="ver${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                    <a href="" id="editar${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                    <a href="" id="eliminar${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
                </div>
                </div>`;
    
                //Mostrar contenido

                $('#usuarios').append(html);
            }

                //Modificar clase indice

                $("#indice"+indiceActual+"li").addClass('page-item active');
                $("#indice"+parseInt(indiceActual+1)+"li").removeClass('page-item active');
                console.log(indiceActual);
            
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
                    <a href="" id="ver${usuarios[i].idUsuario}" style="text-decoration: none;">Ver |</a>
                    <a href="" id="editar${usuarios[i].idUsuario}" style="text-decoration: none;">Editar |</a>
                    <a href="" id="eliminar${usuarios[i].idUsuario}" style="text-decoration: none;">Eliminar</a>
                    </div>
                    </div>`;
    
                $('#usuarios').append(html);
            }

        })
        
    })
  
})