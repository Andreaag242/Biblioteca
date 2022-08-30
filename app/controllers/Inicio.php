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
        $data = [];
        $data = $this->usuarioModel->validarUsuario();
        if ($data == "Vacio") {
            $this->renderView('Inicio', $data);
        } else {

            session_start();
            $_SESSION['usuario'] = $data->usuario;
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
}
