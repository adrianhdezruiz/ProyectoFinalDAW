
$(document).ready(function(){


    $.get('http://'+window.location.hostname+'/Codigo/Controladores/ticketAdminControllerGET.php',function(response){

        var ticketsActivos = JSON.parse(response);

        //console.log(ticketsActivos)
    
        for (let i = 0; i < ticketsActivos.length; i++) {
            
            var html = `     <div class="row ">
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].idServicio}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].idUsuario}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].fechaRegistro}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].horaInicio} - ${ticketsActivos[i].horaFinal}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].precio} €</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].patin} </div>
        </div>`;

        $('#ticketsActivos').append(html);
            
        }

       
    })


})


$('#actualizarTicketsActivos').click(function(){

    $('#ticketsActivos').empty();

    $.get('http://'+window.location.hostname+'/Codigo/Controladores/ticketAdminControllerGET.php',function(response){

        var ticketsActivos = JSON.parse(response);

        var html =`<div class="row ">
        <div class="col-2 bg-light p-3 text-center mb-1"><b>ID</b></div>
        <div class="col-2 bg-light p-3 text-center mb-1"><b>Usuario</b></div>
        <div class="col-2 bg-light p-3 text-center mb-1"><b>Fecha</b></div>
        <div class="col-2 bg-light p-3 text-center mb-1"><b>Hora inicio - Hora fin</b></div>
        <div class="col-2 bg-light p-3 text-center  mb-1"><b>Precio</b> </div>
        <div class="col-2 bg-light p-3 text-center  mb-1"><b>Patin</b> <span class="me-2" style="float:right">🟢</span></div>
        </div>`;

    $('#ticketsActivos').append(html);
    
        for (let i = 0; i < ticketsActivos.length; i++) {
            
            var html = `     <div class="row ">
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].idServicio}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].idUsuario}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].fechaRegistro}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].horaInicio} - ${ticketsActivos[i].horaFinal}</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].precio} €</div>
            <div class="col-2 bg-light p-3 text-center mb-1">${ticketsActivos[i].patin} </div>
        </div>`;

        $('#ticketsActivos').append(html);
            
        }
       
    })

});


$('#buscarTicket').click(function(){

    $('#usuarioTicket').html('');
    $('#fechaTicket').html('');
    $('#horaInicioTicket').html('');
    $('#horaFinalTicket').html('');
    $('#patinTicket').html('');
    $('#precioTicket').html('');
    $('#error').html('');

    const data ={
        idTicket :$('#valueTicket').val(),
    }
   
    $.post('http://'+window.location.hostname+'/Codigo/Controladores/ticketAdminControllerPOST.php',data,function(response){

        var searchedTicket = JSON.parse(response);

        if (searchedTicket!=0) {
            $('#usuarioTicket').html(searchedTicket.idUsuario)
            $('#fechaTicket').html(searchedTicket.fechaRegistro)
            $('#horaInicioTicket').html(searchedTicket.horaInicio)
            $('#horaFinalTicket').html(searchedTicket.horaFinal)
            $('#patinTicket').html(searchedTicket.patin)
            $('#precioTicket').html(searchedTicket.precio+" €")
           
        }else{
            $('#error').html('No se encontraron resultados');
        }

    })

})