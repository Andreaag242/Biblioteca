<?php

class Editorial extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->editorialModel =  $this->loadModel('EditorialModel');
    }
    public function index()
    {
        $data = $this->editorialModel->verEditorial();
        $this->renderView('Editorial/EditorialInicio', $data);
    }
    public function formAdd()
    {
        $data = [];
        $this->renderView('Editorial/EditorialForm', $data);
    }

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
}
