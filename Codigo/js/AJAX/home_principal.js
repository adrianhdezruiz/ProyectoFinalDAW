$(document).ready(function(){
    
    $.get('http://'+window.location.hostname+'/Codigo/Controladores/HomeControllerGET.php',function(response){


    //--------------PAGINACION------------------//

        //Obtener modelos 

        var result = JSON.parse(response);
    
        //Paginacion

        var paginaActual =1;

        var numIndices=3;
        var indiceActual=1;
        var modelosPagina=8;

        var totalModelos=result["modelos"].length;
      
        var numPaginas= Math.ceil(totalModelos/modelosPagina);

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

         for (let i = (paginaActual-1)*modelosPagina; i <= (paginaActual*modelosPagina)-1; i++) {
       
            var idMarca = `${result["modelos"][i].idMarca}`; 
          
            var Marca = result["listaMarcas"].find(i=>i.idMarca == idMarca);
       
            
            var html = ` <div class="col-12 col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card text-center shadow p-3 mb-5 bg-body rounded" style="width: 25rem;">
                <img src="../../../Imagenes/Modelos/${result["modelos"][i].imagen}" style="width:100%rem;height:25rem;" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title text-dark mb-3">${Marca["nombre"]}  ${result["modelos"][i].nombre}</h5>
                    <a href="producto.php?id=${result["modelos"][i].idModelo}" class="btn btn-dark w-100">Alquilar</a>
                </div>
            </div>
        </div>`;
        $('#modelos').append(html);
        }

     
        //Cargar select
        for (let i = 0; i < result["listaMarcas"].length; i++) {
            var html = `<option value="${result["listaMarcas"][i].idMarca}">${result["listaMarcas"][i].nombre}</option>`
            $('#selectMarca').append(html);
            
        }

         //Aplicar clase activo al indice

        $('#indice1li').addClass('page-item active');
        
         
        //Mostrar pagina anterior

        $(document).on('click','#prev',function(){

            $('#modelos').empty();

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

            for (let i = (paginaActual-1)*modelosPagina; i <= (paginaActual*modelosPagina)-1; i++) {
        
                var idMarca = `${result["modelos"][i].idMarca}`; 
          
                var Marca = result["listaMarcas"].find(i=>i.idMarca == idMarca);
           
                
                var html = ` <div class="col-12 col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
                <div class="card text-center shadow p-3 mb-5 bg-body rounded" style="width: 24rem;">
                    <img src="../../../Imagenes/Modelos/${result["modelos"][i].imagen}" style="width:100%rem;height:25rem;" class="card-img-top" alt="...">
                    <div class="card-body">
    
                        <h5 class="card-title text-dark mb-3">${Marca["nombre"]}  ${result["modelos"][i].nombre}</h5>
                        <a href="producto.php?id=${result["modelos"][i].idModelo}" class="btn btn-dark w-100">Alquilar</a>
                    </div>
                </div>
            </div>`;
            $('#modelos').append(html);
            }

                //Modificar clase indice

                $("#indice"+indiceActual+"li").addClass('page-item active');
                $("#indice"+parseInt(indiceActual+1)+"li").removeClass('page-item active');
                //console.log(indiceActual);
            
        })

        //Mostrar pagina siguiente

        $(document).on('click','#next',function(){

            $('#modelos').empty();

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
              
              
                for (let i = (paginaActual-1)*modelosPagina; i <= (paginaActual*modelosPagina)-1; i++) {
                  
            var idMarca = `${result["modelos"][i].idMarca}`; 
          
            var Marca = result["listaMarcas"].find(i=>i.idMarca == idMarca);
       
            
            var html = ` <div class="col-12 col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card text-center shadow p-3 mb-5 bg-body rounded" style="width: 24rem;">
                <img src="../../../Imagenes/Modelos/${result["modelos"][i].imagen}" style="width:100%rem;height:25rem;" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title text-dark mb-3">${Marca["nombre"]}  ${result["modelos"][i].nombre}</h5>
                    <a href="producto.php?id=${result["modelos"][i].idModelo}" class="btn btn-dark w-100">Alquilar</a>
                </div>
            </div>
        </div>`;
            $('#modelos').append(html);
            }
        })

        
    })
})


$('#buscarMarca').click(function(){

    const data = {
        idAccion:1,
        idMarca: $('#selectMarca').val(),
    }

    $.post('http://'+window.location.hostname+'/Codigo/Controladores/HomeController.php',data,function(response){

        var selected = JSON.parse(response);
        $('#modelos').empty();

        for (let i = 0; i <= selected["modelosMarca"].length; i++) {
                  
            var html = ` <div class="col-12 col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card text-center shadow p-3 mb-5 bg-body rounded" style="width: 24rem;">
                <img src="../../../Imagenes/Modelos/${selected["modelosMarca"][i].imagen}" style="width:100%rem;height:25rem;" class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title text-dark mb-3">${selected["nombreMarca"]} ${selected["modelosMarca"][i].nombre}</h5>
                    <a href="producto.php?id=${selected["modelosMarca"][i].idModelo}" class="btn btn-dark w-100">Alquilar</a>
                </div>
            </div>
        </div>`;
            $('#modelos').append(html);
            }


    })
})


$('#buscarModelo').keyup(function(){

    $('#modelos').empty();

    const data = {
        idAccion:2,
        searchVal: $('#buscarModelo').val(),
    }

    $.post('http://'+window.location.hostname+'/Codigo/Controladores/HomeController.php',data,function(response){

        //console.log(response);
        var result = JSON.parse(response);


        for (let i = 0; i <= result["modelos"].length; i++) {
                  
            var html = ` <div class="col-12 col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center">
            <div class="card text-center shadow p-3 mb-5 bg-body rounded" style="width: 24rem;">
                <img src="../../../Imagenes/Modelos/${result["modelos"][i].imagen}" style="width:100%rem;height:25rem;"class="card-img-top" alt="...">
                <div class="card-body">

                    <h5 class="card-title text-dark mb-3">${result["listaMarcas"][i]} ${result["modelos"][i].nombre}</h5>
                    <a href="producto.php?id=${result["modelos"][i].idModelo}" class="btn btn-dark w-100">Alquilar</a>
                </div>
            </div>
        </div>`;
            $('#modelos').append(html);
            }

    })
})