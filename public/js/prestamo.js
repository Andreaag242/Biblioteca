const URLROOT = "http://localhost:8000/biblioteca/";
/* function llenarMedico() {
  fetch(URLROOT + "Cliente/getALL")
    .then((response) => response.json())
    .then((data) => {
      let medico = document.getElementById("medico");
      for (let i = 0; i <= data.length; i++) {
        medico.options[i] = new Option(
          //  data[i].nombreMedico + " " + data[i].apellidosMedico 
          data[i].nombreMedico + "  " + data[i].apellidosMedico
        );
      }
    })
    //Then con el error generado...
    .catch((error) => {
      console.error("Error:", error);
    });
}
llenarMedico(); */

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