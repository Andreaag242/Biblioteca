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

            $data = [];
            $data = $this->usuarioModel->validarUsuario($date);
            if ($data == "Vacio") {
                $this->renderView('Inicio', $data);
            } else {

                $this->crearSesionUsuario($data);
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
    }

    public function cerrarSesion()
    {
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        $data = [];
        $this->renderView('Inicio', $data);
    }
}
