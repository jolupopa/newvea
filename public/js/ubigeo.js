$(document).ready(function(){
    $("#depa").on('change', function(){
        var dep_id = $(this).val();
        $.ajax({
            url: "provincias/"+dep_id,
            type: "GET",
            dataType: "json",

            success: function(respuesta){
                //console.log(respuesta);
                    $("#prov").html('<option value="" selected="true"> Seleccione una opción </option>');
                    $("#dist").html('<option value="" selected="true"> Seleccione una opción </option>');
                         respuesta.forEach(element => {
                            $('#prov').append('<option value='+element.id+'> '+element.name+' </option>')
                            });
                },

            error: function(element){
                console.log('error');
                }
        });

    });

    $("#prov").on('change', function(){
        var pro_id = $(this).val();
        $.ajax({
            url: "distritos/"+pro_id,
            type: "GET",
            dataType: "json",

            success: function(respuesta){
                //console.log(respuesta);
                    $("#dist").html('<option value="" selected="true"> Seleccione una opción </option>');
                         respuesta.forEach(element => {
                            $('#dist').append('<option value='+element.id+'> '+element.name+' </option>')
                            });
                },

            error: function(element){
                console.log('error');
                }
        });

    });
        
        
});
 

