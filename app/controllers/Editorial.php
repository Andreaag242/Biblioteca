<?php

class Editorial extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->editorialModel =  $this->loadModel('EditorialModel');
    }

    //funcion mostrar el inicio
    public function index($currentPage = 1)
    {
        $perPage = 15;
        $totalCount = $this->editorialModel->totalEditorial();
        $pagination = new Paginator($currentPage, $perPage, $totalCount);
        $offset = $pagination->offset();
        $editorial = $this->editorialModel->totalPages($perPage, $offset);
        $data = [
            'editorial' => $editorial,
            'previous' => $pagination->previous(),
            'next' => $pagination->next(),
            'total' => $pagination->totalPages(),
            'currentPage' => $currentPage

        ];

        $this->renderView('Editorial/EditorialInicio', $data);
    }

    //funcion mostrar el formulario agregar o editar editoriales
    public function formAdd()
    {
        $data = [];
        $this->renderView('Editorial/EditorialForm', $data);
    }

    // funcion para agregar editoriales
    public function agregarEditorial()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'nombreEditorial' => $_POST['nombreEditorial']
            ];
            $resultado = $this->editorialModel->addEditorial($data);
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
    // funcion para editar las editoriales
    public function editarEditorial($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idEditorial' => $_POST['idEditorial'],
                'nombreEditorial' => $_POST['nombreEditorial']
            ];

            if ($this->editorialModel->editEditorial($data)) {
                $data = [];
                $this->index();
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
            $editorial = $this->editorialModel->getOne($id);
            $data = [
                'idEditorial' => $id,
                'nombreEditorial' => $editorial->nombreEditorial
            ];
            $this->renderView('Editorial/EditorialEditar', $data);
        }
    }

    // funcion para eliminar editoriales de forma lógica
    public function eliminarEditorial($id)
    {
        $data = [
            'idEditorial' => $id
        ];
        if ($this->editorialModel->elimEditorial($data)) {
            $this->index();
        } else {
            $this->index();
        };
    }

    // Imprimir reportes de Editoriales
    public function ImprimirListado()
    {
        $data = $this->editorialModel->verEditorial();
        //$data = [];
        $this->renderView('Editorial/rptListadoEditorial', $data);
    }
}
