function agregarFila() {
  let grid = document.getElementById("grid");

  let fila = `
  <input type="text" value =
  '.<?php  
  echo $data["libros"]->nombreLibro
  ;?>>
  
  </input><br>
  `;
  grid.innerHTML += fila;
}
