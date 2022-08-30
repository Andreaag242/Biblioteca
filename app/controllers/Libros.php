<?php

class Libros extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->librosModel =  $this->loadModel('LibrosModel');
    }

    //funcion mostrar el inicio
    public function index()
    {
        $data = $this->librosModel->verLibros();
        $this->renderView('Libros/LibrosInicio', $data);

    }

    //funcion mostrar el formulario agregar o editar libros
    public function formAdd(){
        $data = $this->librosModel->editoriales();
        $this->renderView('Libros/LibrosForm', $data);
    }

    // funcion para agregar libros
    public function agregarLibro(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'nombreLibro' => $_POST['nombreLibro'],
                'autorLibro' => $_POST['autorLibro'],
                'disponibleLibro' => $_POST['disponibleLibro'],
                'cantidadTotalLibro' => $_POST['cantidadTotalLibro'],
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

    // funcion para editar los libros
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

    // funcion para eliminar libros de forma lógica
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

    //funcion traer un libro
    public function getOne()
    {
        $data = $this->librosModel->getOne($_POST["valorOption"]);
        $datos = json_encode($data);
        echo $datos;
    }

    // Imprimir reportes de libros
    public function ImprimirListado()
    {
        $data = $this->librosModel->verLibros();
        //$data = [];
        $this->renderView('Libros/rptListadoLibros', $data);
    }

    // funcion buscar libros
    public function buscarLibros()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $datos = [
                'nombreLibro' => $_POST['nombreLibro']
            ];
            $resultado = $this->librosModel->buscLibro($datos);
            if ($resultado) {
                $this->renderView('Libros/LibrosInicio', $resultado);
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }
       
}
