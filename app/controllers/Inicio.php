<?php

class Inicio extends Controller
{

    public function __construct()
    {
        $this->usuarioModel =  $this->loadModel('UsuarioModel');
    }

    //funcion mostrar el inicio
    public function index()
    {
        $data = [];  //temporal porque no hay
        $this->renderView('Inicio', $data);
    }

    // funcion abrir menu
    public function login($currentPage = 1)
    {
        // chequeamos si fue enviado por un formulario
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // sanitizamos los datos
            $_POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $date = [
                'user' => trim($_POST['usuario']),
                'pass' => trim($_POST['pass'])
            ];
            $user = $this->usuarioModel->validarUsuario($date);
            
            if ($user==false){
                $this->renderView('Inicio', $user);
            } else {
                $this->crearSesionUsuario($user);
                
            }
        }
        else {
            
            $data = [
                'user' => '',
                'password' => '',
                'error' => 'Atención ! la información no se envió desde un formulario.'
            ];
            $this->renderView('Inicio', $data);
        }
    }

    public function crearSesionUsuario($datos)
    {
        session_start();
        $_SESSION['usuario'] = $datos->usuario;
        $_SESSION['nombreUsuario'] = $datos->nombre1.' '.$datos->nombre2.' '.$datos->apellido1.' '.$datos->apellido2;
        $this->renderView('Dashboard/inicio', $datos);
    }

    public function cerrarSesion()
    {
        error_reporting(0);
        unset($_SESSION['usuario']);
        unset($_SESSION['nombreUsuario']);
        session_destroy();
        $data = [
            'user' => '',
            'password' => '',
            'error' => 'Atención ! la información no se envió desde un formulario.'
        ];
        $this->renderView('Inicio', $data);
    }
}
