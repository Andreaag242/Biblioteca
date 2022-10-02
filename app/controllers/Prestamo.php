<?php

class Prestamo extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->librosModel =  $this->loadModel('LibrosModel');
        $this->clienteModel =  $this->loadModel('ClienteModel');
        $this->prestamoModel =  $this->loadModel('PrestamoModel');
    }

    //funcion mostrar el inicio
    public function index()
    {
        $data = $this->prestamoModel->prestamosPendientes();
        $this->renderView('Prestamo/PrestamoInicio', $data);
    }

    //funcion mostrar el formulario agregar o editar prestamo
    public function formAdd()
    {
        $cliente = $this->clienteModel->verClientes();
        $data = [
            "clientes" =>$cliente
        ];
        $this->renderView('Prestamo/PrestamoForm', $data);
    }

    //función para ver clientes
    public function verClientes()
    {
        $cliente = $this->clienteModel->verClientes();
        $cliente = json_encode($cliente);
        echo $cliente;
    }

    //función buscar prestamo
    public function buscarPrestamos()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $datos = [
                'idCliente' => $_POST['idCliente']
            ];
            $resultado = $this->prestamoModel->buscPrestamo($datos);
            if ($resultado) {
                $this->renderView('Prestamo/PrestamoInicio', $resultado);
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

}