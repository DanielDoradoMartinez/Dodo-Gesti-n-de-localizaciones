var tEspacios;
var tReservas;
var tLocalizaciones;
var tUsers;
var datos;
var validadores= function(){
  $.validator.addMethod("comprobarH", function(value, element) {
    var nom=$("#nombreTextBoxAC").val()
    var bcda=false;
    if($("#HIH").val().split(":")[1]%15!=0){
      $("#HIH").val($("#HIH").val().split(":")[0]+":00")
    }
    if($("#HFH").val().split(":")[1]%15!=0){
      $("#HFH").val($("#HFH").val().split(":")[0]+":00")
    }


    $.ajaxSetup({
      async: false
      });
    console.log("http://217.217.36.156/comH/"+$("#HIH").val()+"/"+$("#HFH").val()+"/"+$("#idEsH").val()+"/"+$("#diaSH").val());
      $.get("http://217.217.36.156/comH/"+$("#HIH").val()+"/"+$("#HFH").val()+"/"+$("#idEsH").val()+"/"+$("#diaSH").val(), function (d) {
        
   
      if(d=="T")
      bcda=true;
    
    
      });
  
      $.ajaxSetup({
        async: true
        });
  
  return bcda;
  
  
   
  },"Este intervalo se pisa con otro");
  $.validator.addMethod("comprobarHIHF", function(value, element) {
    var horaInicio = moment($("#HIH").val(), "h:m");
var horaFin = moment($("#HFH").val(), "h:m");

  return horaInicio.isBefore(horaFin);
  
  
   
  },"La hora de fin no puede ser antes que la de inicio");
  $.validator.addMethod("comprobarIntervalo", function(value, element) {
    var horaInicio = moment($("#HIH").val(), "h:m");
var horaFin = moment($("#HFH").val(), "h:m");
console.log(horaFin.diff(horaInicio, 'm')%$("#duracionH").val()==0);
    if(horaFin.diff(horaInicio, 'm')%$("#duracionH").val()==0)

  return true;
  return false;
  
  
   
  },"La duracion de cada reserva debe ser divisible por la franja horaria");
  $.validator.addMethod("comprobarMultiplicidad", function(value, element) {
    var horaInicio = moment($("#HIH").val(), "h:m");
  var horaFin = moment($("#HFH").val(), "h:m");
  console.log(horaFin.diff(horaInicio, 'm')%$("#duracionH").val()==0);
  if($("#duracionH").val()==0)
  return false;
  
    if($("#duracionH").val()%15==0)
  
  return true;
  return false;
  
  
   
  },"La duracion de cada reserva debe ser multiplo de 15");
}

$("#formularioH").validate({
  rules: {
          HF: {
                  required: true,
                
                  comprobarH:true,
                  comprobarHIHF:true,
             
                  
          },
          duracion:{
            required: true,
            comprobarMultiplicidad:true,
            comprobarIntervalo:true,
          }
         
    
  },
  messages: {
    HF: {
                  required: "*Nombre requerido",
                  
                  
          },
          duracion:{
            required: "*Duración requerido",
            
          }
        
  },
  submitHandler: function(form){
   
  $.ajax({
    url: "http://217.217.36.156/añadirHorario",
    type: 'get',
    data: $("#formularioH").serialize(),
    cache: false,
    async: false,
    dataType: 'json',
    contentType: "application/json",
    success: function (response) {
      alert('datos guardados');
    },
    error: function (response) {
      console.log(arguments);

    }
    

  });
  cargaVDES($("#idEsH").val());
  $("#modalHorarios").modal("toggle");


}

});
var loadTReservas = function () {
  tReservas = $('#tablaReservas').DataTable({
    ajax: {
      url: "http://217.217.36.156/getReservasT",

      type: "GET"
    },
    ordering: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "<<",
        sLast: ">>",
        sNext: ">",
        sPrevious: "<",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columns: [
      {
        data: 'id', "render":
          function (data, type, row) {

            return (row["estado"] != "Cancelado") ?"<h2><i  class='far fa-times-circle primary' id='br-"+  data + "'></i></h2>" : "";

          }
      },
      { data: 'fecha' },
      { data: 'hora' },
      { data: 'duracion' },
      { data: 'idEspacios' },
      { data: 'idUsers' },
      { data: 'estado',"render":
      function (data, type, row) {

        return (row["estado"] != "Cancelado") ?"<h3><span class='badge badge-success'>"+data+"</span> </h3>":"<h3><span class='badge badge-danger'>"+data+"</span> </h3>";

      }
  },

    ],
  });
}
var loadTUsers = function () {
  tUsers = $('#tablaUsuarios').DataTable({
    ajax: {
      url: "http://217.217.36.156/getUsers",

      type: "GET"
    },
    ordering: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "<<",
        sLast: ">>",
        sNext: ">",
        sPrevious: "<",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columns: [
      {
        data: 'id', "render":
          function (data, type, row) {

            return (row["admin"] != 1) ?"<h2><i  class='far fa-times-circle primary' id='bu-"+  data + "'></i></h2>" : "";

          }
      }, 
      { data: 'usuario' },
       
      { data: 'nombre', "render":
      function (data, type, row) {

        return data+" "+row["apellido1"]+" "+row["apellido2"];

      }
  },
  { data: 'email' },
    
      
  

    ],
  });
}
var loadTLocalizaciones = function () {
  tLocalizaciones = $('#tablaLocalizaciones').DataTable({
    ajax: {
      url: "http://217.217.36.156/getLocT",

      type: "GET"
    },
    ordering: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "<<",
        sLast: ">>",
        sNext: ">",
        sPrevious: "<",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columns: [
      {
        data: 'id', "render":
          function (data, type, row) {
            return "<h2><i  class='far fa-times-circle primary' id='bl-" + data + "'></i></h2>"

          }
      },
      { data: 'nombre' },
      { data: 'direccion' },


    ],
  });
}
var loadTEspacios = function () {
  tEspacios =$('#tablaEspacios').DataTable({
    ajax: {
      url: "http://217.217.36.156/getEsT",

      type: "GET"
    },
    ordering: false,
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
      infoEmpty: "",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "<<",
        sLast: ">>",
        sNext: ">",
        sPrevious: "<",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
    columns: [
      {
        data: 'id', "render":
          function (data, type, row) {
            return "<h2><i  class='far fa-times-circle primary' id='br-" + data + "'></i>" +"&nbsp &nbsp"+ "<i class='far fa-file-alt' id='mr-" + data + "'></i></h2>";

          }
      },
      { data: 'nombre' },
      { data: 'descripcion' },
      { data: 'aforo' },
      { data: 'idLocalizaciones' },


    ],
  });
}

$(document).ready(function () {
  loadTReservas();
  loadTLocalizaciones();
  loadTEspacios();
  loadTUsers();
  validadores();

 
});

 $("#tablaReservas").on('draw.dt', function () {
  

    $("#tablaReservas tbody td:nth-child(1) i").each(function () {
      cargarEventosIconBR($(this).attr("id"));





    });
  });
  $("#tablaEspacios").on('draw.dt', function () {
   

    $("#tablaEspacios tbody td:nth-child(1) i").each(function () {
      cargarEventosIconBE($(this).attr("id"));





    });
  });
  $("#tablaUsuarios").on('draw.dt', function () {
   

    $("#tablaUsuarios tbody td:nth-child(1) i").each(function () {
      cargarEventosIconBU($(this).attr("id"));





    });
  });
  $("#tablaLocalizaciones").on('draw.dt', function () {
  

    $("#tablaLocalizaciones tbody td:nth-child(1) i").each(function () {
      cargarEventosIconBL($(this).attr("id"));





    });
  });
  $("#btnAHor").on("click",function(){
    var aux= $("#idEsH").val();
    $("#formularioH")[0].reset();
    $("#idEsH").val(aux);
    $("#modalHorarios").modal("show");
  });
$("#btnALoc").on("click",function(){
  mostrarFLoc();
});

$("#btnAEs").on("click",function(){
  mostrarFEs();
});
$("#btnGClave").on("click",function(){
 
  $.get("http://217.217.36.156/keygen", { }, function (d) {
    Swal.fire('Clave->  '+d);
  
      });
      
});
$("#formularioLoc").validate({
  rules:{
    nombre: {
      required: true,
      minlength: 3,
      maxlength: 40,
    },
    direccion: {
      required: true,
      minlength: 3,
      maxlength: 40,
    }
  },
  messages:{
    nombre: {
      required: "*Nombre requerido",
      minlength: "*Min 3",
      maxlength: "*Max 40",
      
      
    },
    direccion: {
      required: "*Direccion requerido",
      minlength: "*Min 3",
      maxlength: "*Max 40",
      
      
    }
  },
  submitHandler: function(form){
  
    $.ajax({
      url: "http://217.217.36.156/insertLoc",
      type: 'get',
      data: $("#formularioLoc").serialize(),
      cache: false,
      async: false,
      dataType: 'json',
      contentType: "application/json",
      success: function (response) {
      
      },
      error: function (response) {
      

      }
     
    })
   
    tLocalizaciones.ajax.reload();
    $("#modalLoc").modal("toggle");



}

});
$("#formularioEs").validate({
  rules:{
    nombre: {
      required: true,
      minlength: 3,
      maxlength: 40,
    },
    descripcion: {
      required: true,
      minlength: 3,
      maxlength: 40,
    },
    aforo: {
      required: true,
      number: true,
      min:1,
    },
    idLocalizaciones: {
      required: true,
      
    },
  
  },
  messages:{
    nombre: {
      required: "*Nombre requerido",
      minlength: "*Min 3",
      maxlength: "*Max 40",
      
      
    },
    descripcion: {
      required: "*Direccion requerido",
      minlength: "*Min 3",
      maxlength: "*Max 60",
      
      
    },
    aforo: {
      required: "Aforo requerido",
      number: "Debe ser un valor numerico",
      min:"El valor mínimo del aforo debe ser 1",
    },
    idLocalizaciones: {
      required: "*Localizacion requerido",
     
      
      
    },
  },
  submitHandler: function(form){
  
    $.ajax({
      url: "http://217.217.36.156/insertEs",
      type: 'get',
      data: $("#formularioEs").serialize(),
      cache: false,
      async: false,
      dataType: 'json',
      contentType: "application/json",
      success: function (response) {
      
      },
      error: function (response) {
      

      }
     
    })
   
    tEspacios.ajax.reload();
    $("#modalEs").modal("toggle");



}

});

function cargarEventosIconBR(id) {

  id = "#" + id;
  $(id).on("click", function (e) {
    Swal.fire({
      title: '¿Estas seguro?',
      text: "Será eliminado permanentemente",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        if (options.type.toLowerCase() === "post") {

          options.data = options.data || "";

          options.data += options.data ? "&" : "";

          options.data += "_token=" + encodeURIComponent(csrf_token);
        }
      });
      $.post("http://217.217.36.156/dReserva", { id: id.substr(4), estado: "Cancelado" }, function (d) {
    
      });
    }
      tReservas.ajax.reload();
    });

  });
  $(id).hover(function () {
    $(this).attr("class", 'fas fa-times-circle')
   
 
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });
}
function cargarEventosIconBE(id) {

  id = "#" + id;
  if(id[1]=="b"){
  $(id).on("click", function (e) {
    Swal.fire({
      title: '¿Estas seguro?',
      text: "Será eliminado permanentemente",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        if (options.type.toLowerCase() === "post") {

          options.data = options.data || "";

          options.data += options.data ? "&" : "";

          options.data += "_token=" + encodeURIComponent(csrf_token);
        }
      });
      $.post("http://217.217.36.156/dEspacio", { id: id.substr(4) }, function (d) {
  
      });
    
    }
    tEspacios.ajax.reload();
    tEspacios.ajax.reload();
    });

  
  });
  $(id).hover(function () {
    $(this).attr("class", 'fas fa-times-circle')
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });
}
else {
  $(id).on("click", function (e) {
    cargaVDES( id.substr(4) );
   
  });
  
  $(id).hover(function () {
    $(this).attr("class", 'fas fa-file-alt')
  }, function () {
    $(this).attr("class", 'far fa-file-alt')
  });

}
}
function cargarEventosIconBL(id) {

  id = "#" + id;
  $(id).on("click", function (e) {
    Swal.fire({
      title: '¿Estas seguro?',
      text: "Será eliminado permanentemente",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        if (options.type.toLowerCase() === "post") {

          options.data = options.data || "";

          options.data += options.data ? "&" : "";

          options.data += "_token=" + encodeURIComponent(csrf_token);
        }
      });
      $.post("http://217.217.36.156/dLocalizacion", { id: id.substr(4) }, function (d) {
  
      });
    
    }
    tLocalizaciones.ajax.reload();
    });

  
  });
  $(id).hover(function () {
    $(this).attr("class", 'fas fa-times-circle')
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });
}
function cargarEventosIconBU(id) {

  id = "#" + id;
  $(id).on("click", function (e) {
    Swal.fire({
      title: '¿Estas seguro?',
      text: "Será eliminado permanentemente",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        if (options.type.toLowerCase() === "post") {

          options.data = options.data || "";

          options.data += options.data ? "&" : "";

          options.data += "_token=" + encodeURIComponent(csrf_token);
        }
      });
      $.post("http://217.217.36.156/dUser", { id: id.substr(4) }, function (d) {
        tUsers.ajax.reload();
      });
    
    }
   
    tUsers.ajax.reload();
    tUsers.ajax.reload();
    });

  
  });
  $(id).hover(function () {
    $(this).attr("class", 'fas fa-times-circle')
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });
}
function mostrarFLoc(){
  $("#formularioLoc")[0].reset();
  $("#modalLoc").modal("show");
}
function redirect(ruta){
  window.location.replace(ruta);
}
function mostrarFEs(){
  $("#formularioEs")[0].reset();
  $.get("http://217.217.36.156/getLoc",{}, function (d) {
    var datos = JSON.parse(JSON.stringify(d));
    console.log(datos);

  
    $("#localizacionesFE").empty();
    $("#localizacionesFE").append(" <option value='' selected >--Seleccionar--</option>");
    for (var valor in datos) {
  
      $("#localizacionesFE").append("<option value= '" + datos[valor]["id"] + "'>" + datos[valor]["nombre"] + "</option>");
  
    }
  });
  $("#modalEs").modal("show");
}
function cargarBB($id,$bool){
  if($bool==true){
    $("#"+$id).on("click", function (e) {
      Swal.fire({
        title: '¿Estas seguro?',
        text: "Será eliminado permanentemente",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
      
       
        $.get("http://217.217.36.156/dHor", { idEs: $("#idEsH").val(),dSem:$id[2] }, function (d) {
          cargaVDES($("#idEsH").val());
    });
      }
      
      });
  
    });
     
   
  


  $("#"+$id).hover(function () {
    $(this).attr("class", 'fas fa-times-circle')
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });
}
else{
  $("#"+$id).on("click", function (e) {
  });
  $("#"+$id).hover(function () {
    $(this).attr("class", 'far fa-times-circle')
  }, function () {
    $(this).attr("class", 'far fa-times-circle')
  });

}

}
function cargaVDES(id){

 
  var data;
  $.get("http://217.217.36.156/getHEs/"+id,{}, function (d) {
    data = JSON.parse(JSON.stringify(d));
    $var=(data.Lunes)?true:false;    
    cargarBB("bbL",$var); 
    $var=(data.Martes)?true:false;  
    cargarBB("bbM",$var);
    $var=(data.Miércoles)?true:false;   
    cargarBB("bbX",$var);
    $var=(data.Jueves)?true:false;  
    cargarBB("bbJ",$var);
    $var=(data.Viernes)?true:false;  
    cargarBB("bbV",$var);
    $var=(data.Sábado)?true:false;  
    cargarBB("bbS",$var);
    $var=(data.Domingo)?true:false;  
    cargarBB("bbD",$var);
    $("#idEsH").attr("value",id);

 $("#hLunes").empty();
 $("#hLunes").append(data.Lunes);


 
   
 $("#hMartes").empty();
 $("#hMartes").append(data.Martes);
 $("#hMiercoles").empty();
 $("#hMiercoles").append(data.Miércoles);
 $("#hJueves").empty();
 $("#hJueves").append(data.Jueves);
 $("#hViernes").empty();
 $("#hViernes").append(data.Viernes);
 $("#hSabado").empty();
 $("#hSabado").append(data.Sábado);
 $("#hDomingo").empty();
 $("#hDomingo").append(data.Domingo);
 $("#modalHo").modal("show");





});


 

  


}
