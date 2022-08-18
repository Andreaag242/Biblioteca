const URLROOT = "http://localhost:8000/2278769/hospv2/";

function agregarDetalle(id) {
  let detalle = document.getElementById("detalle");
  let valorOption = document.getElementById("valorOption");
  let valor = valorOption.options[valorOption.selectedIndex].value;
  console.log(valor);
  let fila = `
    <tr>
    
      <td><input type="text" value ="hola" name="iditem[]"> </td>  
      <td><input type="text" name="descripcion[]" id="descripcion[]" value='valor'></td>
      <td><input type="text" name="posologia[]" id="posologia[]" value="'posologia'"></td>
      
    </tr>    
    `;
  detalle.innerHTML += fila;
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

leerItem();
llenarMedico();

/* window.addEventListener(
  "load",
  function () {
    // do something here ...
  },
  false
);
 */
