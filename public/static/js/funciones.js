$(document).ready(function(){
        
  

   $("#juridica").change(function () {
      if($("#juridica").val() == "0"){
          $('#cuit').removeAttr("required");
          $('#divcuit').fadeOut(1);
          $('#dni').attr("required","required");
          $('#divdni').fadeIn(1);
      }else{
          $('#dni').removeAttr("required");
          $('#divdni').fadeOut('slow');
          $('#cuit').attr("required","required");
          $('#divcuit').fadeIn('slow');
      }
    });
   $("#cliente_id").change(function(){
      
      if($("#cliente_id").val() != ""){
          var miselect=$("#equipo");
          
         $.get("/orden/getEquipoCliente/"+$("#cliente_id").val(), function(data){
            
            miselect.empty();
             if(data.length > 0){
                for (var i=0; i<data.length; i++) {
                    miselect.append('<option value="' + data[i].id + '">' + data[i].descripcion_equipo + '</option>');
                    miselect.removeAttr("disabled");
                    $("#nuevo").fadeOut();
                }
             }else{
                 miselect.find('option').remove().end().append('<option value="">No hay equipos para este cliente</option>').val('');
                 miselect.attr('disabled', 'disabled');
                 $("#nuevo").fadeIn();
                 $("#guardar").attr("disabled","disabled");
             }
         },"json");
      }else{
                 var miselect=$("#equipo");
                 miselect.find('option').remove().end().append('<option value="">Seleccione un cliente</option>');
                 miselect.attr('disabled', 'disabled');
                 $("#nuevo").fadeOut();
                 $("#guardar").attr("disabled","disabled");
      }
   });
   $("#equipo").change(function(){
       $("#guardar").removeAttr("disabled");
   });
   
});

function validaRemito(){
  if($('#remito').val()==''){
    alert('Debe Ingresar el numero de Remito de entrega.');
    return false;
  }
  $('#remito2').val($('#remito').val());
  
  return true;
}
function seguimiento(){
  $('#orden').val('');
  $('#seguimiento').fadeIn();
  window.location.href = "#seguimiento";
}

function porOrden(){
  
  $("#resultados tr").each(function(){
    $(this).remove();
  });
  tabla = $("#resultados");
  if($("#orden").val()!==""){
    $.get("/seguimiento/"+$("#orden").val(),function(data){
        if(data.length>0){
          for(var i=0;i<data.length;i++){
            tabla.append("<tr><td>"+data[i].orden_trabajo_id+"</td><td>"+data[i].movimiento+"</td><td>"+data[i].created_at+"</td></tr>");   
          }
        }else{
          tabla.append("<tr><td colspan='3'>No existen datos de la orden solicitada</td></tr>"); 
        }
    },"json");
  }else{
      $("#divorden").append("<div class='alert alert-dismissable alert-danger'>"+
                            "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+
				"<h4>Debe indicar el numero de orden</h4></div>");
      $("#orden").focus();
  }
}
