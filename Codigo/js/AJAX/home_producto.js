$('#form').submit(function(e){
 
    var horaInicio = $('#horaInicio').val();
    var horaFin =$('#horaFin').val();

    if (horaInicio > horaFin) {
        e.preventDefault();
        $('#error').html('La hora de inicio no puede ser mayor que la hora de fin');
    }
})