$(document).ready(function(){

    const data = {
        idUsuario:$('#idUsuario').val(),
        emailUsuario:$('#emailUsuario').val(),
    }

    $.get('http://localhost/Codigo/Controladores/ticketHomeControllerGET.php',data,function(response){

        var ticketsUsuario = JSON.parse(response);

        if (ticketsUsuario["ticketsUsuario"].length>0) {
            html = `<div class="col-12 bg-dark text-success p-1 text-center">MIS TICKETS</div>`
            $('#ticketsUsuario').append(html);
            for (let i = 0; i < ticketsUsuario["ticketsUsuario"].length; i++) {

                var fechaRegistro =`${ticketsUsuario["ticketsUsuario"][i]["fechaRegistro"]}`;
                var fechaRegistroFormato = fechaRegistro.split(" ");
            
                var html = `   <a href="#" class="list-group-item list-group-item-action  " aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 fw-bolder">${ticketsUsuario["ticketsUsuario"][i]["idServicio"]}</h5>
                    <small><i>${fechaRegistroFormato[0]} | ${ticketsUsuario["ticketsUsuario"][i]["horaInicio"]} - ${ticketsUsuario["ticketsUsuario"][i]["horaFinal"]}</i></small>
                </div>
                <p class="mb-1">${ticketsUsuario["emailUsuario"]}</p>
                <small>${ticketsUsuario["infoPatin"][i]["nombreMarca"]} ${ticketsUsuario["infoPatin"][i]["nombreModelo"]}</small>
                <hr>
                <small class="blockquote-footer">TOTAL:${ticketsUsuario["ticketsUsuario"][i]["totalPrecio"]} €</small>
            </a>`;
                $('#ticketsUsuario').append(html);
            }
        }else{
            var html =`  <div class="bg-light p-3 text-center">No tienes ningún ticket actualmente.</div>`;
            $('#ticketsUsuario').append(html);
        }
  
    })
})