<?php
 /*

*clase base que arma las rutas abreviadas del mvc 
*controlador/metodo/parametro 
*p.ej: medico/crearFormulaMedica/$id 

 */

class Core {

//setear  los controladores,metodos y parametros iniciales del MVC
protected $defaultController = 'Inicio';
protected $defaulMethod= 'index';
protected $parameters= [];    

public function __construct()
{
 
  $url = $this-> geturl();  //construye la clase  y setea la url del mvc
  //paso numero 1  verificamos si existe el controlador y lo llamamos
  if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')) //vereficamos si existe el controlador el ucwords cambia la primera letra en mayuscula para evitar inconvenientes
  {
        $this-> defaultController=ucwords($url[0]); //seteamos como controlador el invocado de la url 
        unset($url[0]);
  }
  //invocamos el controlador 

  require_once '../app/controllers/'. $this->defaultController.'.php';
  $this-> defaultController = new $this->defaultController;

  //2.0 invocamos el metodo correspondiente 

  if (isset($url[1])){

    if (method_exists($this->defaultController,$url[1])){
        $this-> defaulMethod = $url[1];
        unset($url[1]);
    }
  }
 //3.0 invocamor los parametros que pasemos por la url 
 
 $this-> parameters = $url ? array_values($url): []; //si existen parametros terniarios

 call_user_func_array([$this-> defaultController,$this->defaulMethod], $this->parameters); //asignaa los parametros usando la funcion callback 
}
/*
*toma la ruta de la url , la vuelve un arreglo 
*posteriomente en una ruta abreviada 
*@return $url
*/

public function geturl()

{
    $url= ""; // para almacenar la ruta abreviada
    // isset = si esta seteada 
    if (isset($_GET['url'])){
        $url = rtrim($_GET['url'],'/'); // SEPARA LA RUTA POR PORCIONES DE ACUERDO AL /
        $url =filter_var($url,FILTER_SANITIZE_URL); //SANITIZA  la ruta para asegurar la url
        $url = explode ('/', $url);
        return $url;
    }
   return ['Inicio'];

}
}