<?php

class Inicio extends Controller
{

    public function __construct()
    {
        $this->usuarioModel =  $this->loadModel('UsuarioModel');
    }
    public function index()
    {
        $data = [];  //temporal porque no hay
        $this->renderView('Inicio', $data);
    }
    public function abrirMenu(){
        $data = [];
        $data=$this->usuarioModel->validarUsuario();
        if($data=="Vacio"){
            $this->renderView('Inicio', $data);  
        }else{

            session_start();
            $_SESSION['usuario'] = $data->usuario;
            $data = $this->usuarioModel->verUsuarios();
            $this->renderView('Usuario/UsuarioInicio',$data);
        }
    }
}