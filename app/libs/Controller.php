<?php
/* 
Clase base controlador del MVC

*/


class Controller
{
// cargar el modelo correspondiente

public function loadModel($model)
{
    require_once '../app/models/'. $model .'.php';
    //instanciamos la clase modelo 
    return new $model();
}

//Cargamos la vista correspondiente o renderizamos 
public function renderView($view,$data=[])
{
    if (file_exists('../app/views/' .$view.'.php')){
        require_once '../app/views/'.$view.'.php';
    }
    else{
        die('no existe la vista invocada!!');
    }

}
}