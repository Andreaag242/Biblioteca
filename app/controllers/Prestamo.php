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
    public function index()
    {
        $data = $this->prestamoModel->prestamosPendientes();
        $this->renderView('Prestamo/PrestamoInicio', $data);
    }

    public function formAdd()
    {

        $libros = $this->librosModel->verLibros();
        $cliente = $this->clienteModel->verClientes();

        $data = [
            "libros" => $libros,
            "clientes" =>$cliente
        ];
        $this->renderView('Prestamo/PrestamoForm', $data);
    }

<<<<<<< HEAD
    
=======
    public function formAddLibro()
    {   $data = [];
        $this->renderView('Prestamo/PrestamoLibro', $data);
    }

    public function formVerifLibro(){
        $libros = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $select = $_POST["libros"];
            $libros = $this->librosModel->verLibros();
            $edit = $this->librosModel->editoriales();
            $data = [
                'Libros' => $libros,
                'editoriales' => $edit,
                'seleccion' => $select
            ];
            $this->renderView('Prestamo/PrestamoLibro', $data);
        }else {
            $this->index();
        }
    }
>>>>>>> eac8a0e690ac5092b67a82f7c137c9ba8c7cf940

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

    public function agregarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'nombreLibro' => $_POST['nombreLibro'],
                'autorLibro' => $_POST['autor'],
                'disponibleLibro' => $_POST['disponible'],
                'cantidadTotalLibro' => $_POST['cantidadTotal'],
                'editorialLibro' => $_POST['editorialLibro']
            ];
            $resultado = $this->librosModel->addLibro($data);
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
    public function editarLibro($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idLibro' => $_POST['idLibro'],
                'nombreLibro' => $_POST['nombreLibro'],
                'autorLibro' => $_POST['autorLibro'],
                'disponibleLibro' => $_POST['disponibleLibro'],
                'cantidadTotalLibro' => $_POST['cantidadTotalLibro'],
                'editorialLibro' => $_POST['editorialLibro']
            ];

            if ($this->librosModel->editLibro($data)) {
                $data = [];
                $this->index();
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
            $libros = $this->librosModel->getOne($id);
            $edit = $this->librosModel->editoriales();
            $data = [
                'idLibro' => $id,
                'nombreLibro' => $libros->nombreLibro,
                'autorLibro' => $libros->autor,
                'disponibleLibro' => $libros->disponible,
                'cantidadTotalLibro' => $libros->cantidadTotal,
                'editorialLibro' => $libros->editorial_idEditorial,
                'editoriales' => $edit

            ];
            $this->renderView('Libros/LibrosEditar', $data);
        }
    }
    public function eliminarLibro($id)
    {
        $data = [
            'idLibro' => $id
        ];
        if ($this->librosModel->elimLibro($data)) {
            $this->index();
        } else {
            $this->index();
        };
    }
}
