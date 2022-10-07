<?php

class Prestamo extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->librosModel =  $this->loadModel('LibrosModel');
        $this->clienteModel =  $this->loadModel('ClienteModel');
        $this->prestamoModel =  $this->loadModel('PrestamoModel');
        $this->detallePrestamoModel = $this->loadModel('DetallePrestamoModel');
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
            "clientes" => $cliente
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

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idCliente' => $_POST['idCliente'],
                'usuario' => $_POST['usuario'],
                'fechaPrestamo' => $_POST["fechaPrestamo"],
                'idLibro' => $_POST["idLibro"],
                'nombreLibro' => $_POST["nombreLibro"],
                'editorialLibro' => $_POST["editorialLibro"],
                'cantidad' => $_POST["cantidad"]
            ];
            // die(var_dump($data));
            $resultado = $this->prestamoModel->add($data);

            if ($resultado) {
                $numPrestamo = $this->prestamoModel->getLast();
                $respuesta = $this->detallePrestamoModel->add($data, $numPrestamo);
            }
            if ($respuesta) {
                echo json_encode('Exito: Formula Creada !.');
            } else {
                echo json_encode('Error: No se puede crear la Formula !.');
            }
        }
    }
}
