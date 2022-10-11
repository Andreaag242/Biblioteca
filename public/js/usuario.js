const URLROOT = "http://localhost:8000/biblioteca/";

let frmUsuario = document.getElementById("frmUsuario");
let contador = 0; //conteo de la las filas del detalle

//Carga Inicial de las interacciones
function init() {
  frmUsuario.addEventListener("submit", function (e) {
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
  let datos = new FormData(frmUsuario);
  fetch("http://localhost:8000/biblioteca/Usuario/agregarUsuario", {
    method: "POST",
    body: datos,
  })
    .then((response) => response.json())
    .then((data) => {
      //console.log(data);
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

init();