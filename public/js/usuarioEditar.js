const URLROOT = "http://localhost:8000/biblioteca/";

let btnEditarUsuario = document.getElementById("editarUsuario");

btnEditarUsuario.addEventListener("click", function (e) {
  e.preventDefault();

  let formulario = new FormData(
    document.getElementById("frmUsuarioEditar")
  );

  console.log(...formulario);

  fetch(URLROOT + "Usuario/actualizarUsuario", {
    method: "post",
    body: formulario,
  })
    .then((Response) => Response.json())
    .then((data) => {
      Swal.fire({
        title: data,
        icon: "success",
        confirmButtonText: "Ok",
      });
      //window.location.assign(URLROOT + "usuarios");
    })
    .catch((error) => {
        console.log("hay un error :", error);
      });
});