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
    public function abrirMenu($currentPage = 1)
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
            $this->crearSesionUsuario($user);
            if ($user==false){
                $this->renderView('Inicio', $user);
            } else {

                $perPage = 15;
                $totalCount = $this->usuarioModel->totalUsuario();
                $pagination = new Paginator($currentPage, $perPage, $totalCount);
                $offset = $pagination->offset();
                $usuario = $this->usuarioModel->totalPages($perPage, $offset);

                $data = [
                    'usuario' => $usuario,
                    'previous' => $pagination->previous(),
                    'next' => $pagination->next(),
                    'total' => $pagination->totalPages(),
                    'currentPage' => $currentPage

                ];
                $this->renderView('Usuario/UsuarioInicio', $data);
            }
        }if(isset($_SESSION['usuario'])){
            $perPage = 15;
                $totalCount = $this->usuarioModel->totalUsuario();
                $pagination = new Paginator($currentPage, $perPage, $totalCount);
                $offset = $pagination->offset();
                $usuario = $this->usuarioModel->totalPages($perPage, $offset);

                $data = [
                    'usuario' => $usuario,
                    'previous' => $pagination->previous(),
                    'next' => $pagination->next(),
                    'total' => $pagination->totalPages(),
                    'currentPage' => $currentPage

                ];
                $this->renderView('Usuario/UsuarioInicio', $data);
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
    }

    public function cerrarSesion()
    {
        error_reporting(0);
        unset($_SESSION['usuario']);
        session_destroy();
        $this->renderView('Inicio');
    }
}
