const URLROOT = "http://localhost:8000/biblioteca/";

function agregarDetalle() {
  let detalle = document.getElementById("detalle");
  let valorOption = document.getElementById("valorOption");
  let valor = valorOption.options[valorOption.selectedIndex].value;
  console.log(valor);
  fetch(URLROOT + " Libros/getOne", {
    method: "post",
    body: valor //cors
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Exito :", data);
    })
    .catch((error) => {
      console.log("hay un error :", error);
    });
  
}

function leerItem() {
  fetch(URLROOT + "Item/getALL")
    .then((response) => response.json())
    .then((data) => {
      let valorOption = document.getElementById("valorOption");
      for (let i = 0; i <= data.length; i++) {
        valorOption.options[i] = new Option(data[i].descripcion);
      }
    })
    //Then con el error generado...
    .catch((error) => {
      console.error("Error:", error);
    });
}
function llenarMedico() {
  fetch(URLROOT + "Medico/getALL")
    .then((response) => response.json())
    .then((data) => {
      let medico = document.getElementById("medico");
      for (let i = 0; i <= data.length; i++) {
        medico.options[i] = new Option(
          data[i].nombreMedico + " " + data[i].apellidosMedico
        );
      }
    })
    //Then con el error generado...
    .catch((error) => {
      console.error("Error:", error);
    });
}


/* window.addEventListener(
  "load",
  function () {
    // do something here ...
  },
  false
);
 */
