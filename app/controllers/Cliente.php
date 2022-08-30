<?php

class Cliente extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->clienteModel =  $this->loadModel('ClienteModel');
    }

    //funcion mostrar el inicio
    public function index($currentPage = 1)
    {
        $perPage = 15;
        $totalCount = $this->clienteModel->totalClientes();
        $pagination = new Paginator($currentPage, $perPage, $totalCount);
        $offset = $pagination->offset();
        $clientes = $this->clienteModel->totalPages($perPage, $offset);

        $data = [
            'cliente' => $clientes,
            'previous' => $pagination->previous(),
            'next' => $pagination->next(),
            'total' => $pagination->totalPages(),
            'currentPage' => $currentPage

        ];

        $this->renderView('Cliente/ClienteInicio', $data);
    }

    //funcion mostrar el formulario agregar o editar Clientes
    public function formAdd()
    {
        $data = [];
        $this->renderView('Cliente/ClienteForm', $data);
    }

    // funcion para agregar Clientes
    public function agregarCliente()
    {
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

    // funcion para editar las Clientes
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

    // funcion para eliminar Clientes de forma lógica
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

    //funcion buscar Cliente
    public function buscarCliente($currentPage = 1)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $datos = [
                'nombreCliente' => $_POST['nombreCliente']
            ];
            $perPage = 15;
            $totalCount = $this->clienteModel->totalClientes();
            $pagination = new Paginator($currentPage, $perPage, $totalCount);
            $offset = $pagination->offset();
            $clientes = $this->clienteModel->buscCliente($perPage, $offset, $datos);

            $data = [
                'cliente' => $clientes,
                'previous' => $pagination->previous(),
                'next' => $pagination->next(),
                'total' => $pagination->totalPages(),
                'currentPage' => $currentPage

            ];
            if ($clientes) {
                $this->renderView('Cliente/ClienteInicio', $data);
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    // Imprimir reportes de clientes
    public function ImprimirListado()
    {
        $data = $this->clienteModel->verClientes();
        //$data = [];
        $this->renderView('Cliente/rptListadoClientes', $data);
    }
}
