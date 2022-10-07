const URLROOT = "http://localhost:8000/biblioteca/";

let frmPrestamo = document.getElementById("frmPrestamo");
let contador = 0; //conteo de la las filas del detalle

//Carga Inicial de las interacciones
function init() {
  frmPrestamo.addEventListener("submit", function (e) {
    guardar(e);
  });
}

//=========================================================================================================

/**
 *
 * Definicion de las interacciones
 */

//Guardar el documento
function guardar(e) {
  e.preventDefault();
  let datos = new FormData(frmPrestamo);

  fetch("http://localhost:8000/biblioteca/Prestamo/guardar", {
    method: "POST",
    body: datos,
  })
    .then((response) => response.json())
    .then((data) => {
      Swal.fire({
        title: data,
        icon: "success",
        confirmButtonText: "Ok",
      });
    })
    .catch((error) => {
      console.log("hay un error :", error);
    });
}

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
        defaultContent: "<button type='button' class='btn btn-primary btn-sm shadow-sm' id='agregar'>Agregar +</button>",
      },
      { data: "idLibro" },
      { data: "nombreLibro" },
      { data: "idEditorial" },
    ],
  });

  $("#tblLibros tbody").on("click", "#agregar", function () {
    var data = table.row($(this).parents("tr")).data(); //captura la fila
    agregarDetalle(data.idLibro, data.nombreLibro, data.idEditorial);
    //alert(data.idItem + "'s salary is: " + data.descripcion);
  });
});

function agregarDetalle(idLibro, nombreLibro, idEditorial) {
  detalle = document.getElementById("detalle");
  fila = `
  <tr> 
  <td><input type="text" name="idLibro[]" value ="${idLibro}" class="form-control form-control-sm" readonly></td>
  <td><input type="text" name="nombreLibro[]" value ="${nombreLibro}" class="form-control form-control-sm" readonly></td>
  <td><input type="text" name="editorialLibro[]" value ="${idEditorial}" class="form-control form-control-sm" readonly></td>
  <td><input type="text" name="cantidad[]" class="form-control form-control-sm"></td>
  </tr>
  `;
  detalle.innerHTML += fila;
  //alert("id:" + idItem + "descripcion:" + descripcion);
}

init();