const URLROOT = "http://localhost:8000/biblioteca/";

//modal busqueda de pacientes
let tblcliente = $("#tblCliente").DataTable({
  autoWidth: false,
  ajax: {
    url: URLROOT+"Prestamo/verClientes",
    dataSrc: "",
  },
  columns: [
    {
      data: null,
      defaultContent:
        "<button type='button' class='btn btn-primary btn-sm shadow-sm' id='agregarCliente'>+</button>",
    },
    { data: "idCliente" },
    { data: "nombre1" },
    { data: "nombre2" },
    { data: "apellido1" },
    { data: "apellido2" },
    { data: "fechaNacimiento" },
  ],
});
//selecciona el  item para agregarlo al detalle de la formula
$("#tblCliente tbody").on("click", "#agregarCliente", function () {
  var data = tblcliente.row($(this).parents("tr")).data(); //captura la fila
  agregarDataCliente(
    data.idCliente,
    data.nombre1,
    data.nombre2,
    data.apellido1,
    data.apellido2,
    data.fechaNacimiento,
  );
});

function agregarDataCliente(id, nombre1, nombre2, apellido1, apellido2, fecha) {
  let idCliente = document.getElementById("idCliente");
  let nombreCliente = document.getElementById("nombreCliente");
  let fechaNacimiento = document.getElementById("fechaNace");
  idCliente.value = id;
  nombreCliente.value = nombre1+" "+nombre2+" "+apellido1+" "+apellido2;
  fechaNacimiento.value = fecha;
}

$(document).ready(function () {
  var table = $("#tblLibros").DataTable({
    autoWidth: false,
    ajax: {
      url: "http://localhost:8000/biblioteca/Libros/getAll",
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        defaultContent:
          "<button type='button' class='btn btn-primary btn-sm shadow-sm' id='agregar'>Agregar +</button>",
      },
      { data: "idLibro" },
      { data: "nombreLibro" },
    ],
  });

  $("#tblLibros tbody").on("click", "#agregar", function () {
    var data = table.row($(this).parents("tr")).data(); //captura la fila
    agregarDetalle(data.idLibro, data.nombreLibro);
    //alert(data.idItem + "'s salary is: " + data.descripcion);
  });
});

function agregarDetalle(idLibro, nombreLibro) {
  detalle = document.getElementById("detalle");
  fila = `
  <tr> 
  <td><input type="text" name="idLibro[]" value ="${idLibro}" class="form-control form-control-sm" readonly></td>
  <td><input type="text" name="nombreLibro[]" value ="${nombreLibro}" class="form-control form-control-sm" readonly></td>
  </tr>
  `;
  detalle.innerHTML += fila;
  //alert("id:" + idItem + "descripcion:" + descripcion);
}