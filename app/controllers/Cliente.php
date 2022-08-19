<?php

class Cliente extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->clienteModel =  $this->loadModel('ClienteModel');
    }
    public function index()
    {
        $data = $this->clienteModel->verClientes();
        $this->renderView('Cliente/ClienteInicio', $data);

    }
    public function formAdd(){
        $data = [];
        $this->renderView('Cliente/ClienteForm', $data);
    }

    public function agregarCliente(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'idCliente' => $_POST['idCliente'],
                'nombre1Cliente' => $_POST['nombre1Cliente'],
                'nombre2Cliente' => $_POST['nombre2Cliente'],
                'apellido1Cliente' => $_POST['apellido1Cliente'],
                'apellido2Cliente' => $_POST['apellido2Cliente'],
                'fechaNaceCliente' => $_POST['fechaNaceCliente'],
                'telefonoCliente' => $_POST['telefonoCliente'],
                'direccionCliente' => $_POST['direccionCliente'],
            ];
            $resultado = $this->clienteModel->addCliente($data);
            if ($resultado) {
                $mensaje = [
                    'mensaje' => 'insercion exitosa',
                    'color' => 'alert alert-success'
                ];
                $this->formAdd($mensaje);
            } else {
                $mensaje = [
                    'mensaje' => 'error en la insercion',
                    'color' => 'alert alert-primary'
                ];
                $this->formAdd($mensaje);
            }
        } else {
            echo 'Atención! los datos no fueron enviados de un formulario';
        }   
    }
    public function editarCliente($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idCliente' => $id,
                'nombre1Cliente' => $_POST['nombre1Cliente'],
                'nombre2Cliente' => $_POST['nombre2Cliente'],
                'apellido1Cliente' => $_POST['apellido1Cliente'],
                'apellido2Cliente' => $_POST['apellido2Cliente'],
                'fechaNaceCliente' => $_POST['fechaNaceCliente'],
                'telefonoCliente' => $_POST['telefonoCliente'],
                'direccionCliente' => $_POST['direccionCliente']
            ];

            if ($this->clienteModel->editCliente($data)) {
                $data = [];
                $this->index();
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
            $cliente = $this->clienteModel->getOne($id);
            $data = [
                'idCliente' => $id,
                'nombre1Cliente' => $cliente->nombre1,
                'nombre2Cliente' => $cliente->nombre2,
                'apellido1Cliente' => $cliente->apellido1,
                'apellido2Cliente' => $cliente->apellido2,
                'fechaNaceCliente' => $cliente->fechaNacimiento,
                'telefonoCliente' => $cliente->telefono,
                'direccionCliente' => $cliente->direccion
            ];
            $this->renderView('Cliente/ClienteEditar', $data);
        }

        
    }
       

    public function eliminarCliente($id)
    {
        $data = [
            'idCliente' => $id
        ];
        if ($this->clienteModel->elimCliente($data)) {
            $this->index();
        } else {
            $this->index();
        };
    }
}
