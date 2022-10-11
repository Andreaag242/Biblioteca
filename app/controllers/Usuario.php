<?php

class Usuario extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->usuarioModel =  $this->loadModel('UsuarioModel');
        
    }

    //funcion mostrar el inicio
    public function index($currentPage=1)
    {
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

    //funcion mostrar el formulario agregar o editar editoriales
    public function formAdd(){
        $data = $this->usuarioModel->roles();
        $this->renderView('Usuario/UsuarioForm', $data);
    }

    // funcion para agregar editoriales
    public function agregarUsuario(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'idUsuario' => $_POST['idUsuario'],
                'nombre1Usuario' => $_POST['nombre1Usuario'],
                'nombre2Usuario' => $_POST['nombre2Usuario'],
                'apellido1Usuario' => $_POST['apellido1Usuario'],
                'apellido2Usuario' => $_POST['apellido2Usuario'],
                'fechaNaceUsuario' => $_POST['fechaNaceUsuario'],
                'telefonoUsuario' => $_POST['telefonoUsuario'],
                'direccionUsuario' => $_POST['direccionUsuario'],
                'usuario' => $_POST['usuario'],
                'passUsuario' => $_POST['passUsuario'],
                'rolUsuario' => $_POST['rolUsuario']
            ];
            $resultado = $this->usuarioModel->addUsuario($data);
            if ($resultado) {
                echo json_encode('Exito: Usuario Creado !.');
            } else {
                echo json_encode('Error: No se puede crear el Usuario !.');
            }
        } else {
            echo 'Atención! los datos no fueron enviados de un formulario';
        }   
    }

    // funcion para editar las editoriales
    public function editarUsuario($id)
    {
            $usuario = $this->usuarioModel->getOne($id);
            $roles = $this->usuarioModel->roles();
            $data = [
                'idUsuario' => $id,
                'nombre1Usuario' => $usuario->nombre1,
                'nombre2Usuario' => $usuario->nombre2,
                'apellido1Usuario' => $usuario->apellido1,
                'apellido2Usuario' => $usuario->apellido2,
                'fechaNaceUsuario' => $usuario->fechaNacimiento,
                'telefonoUsuario' => $usuario->telefono,
                'direccionUsuario' => $usuario->direccion,
                'usuario' => $usuario->usuario,
                'passUsuario' => $usuario->passwordUsuario,
                'rolUsuario' => $usuario->rol_idRol,
                'roles' => $roles
            ];
            
            $this->renderView('Usuario/UsuarioEditar', $data);
        
    }

    public function actualizarUsuario(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'idUsuario' => $_POST['idUsuario'],
                'nombre1Usuario' => $_POST['nombre1Usuario'],
                'nombre2Usuario' => $_POST['nombre2Usuario'],
                'apellido1Usuario' => $_POST['apellido1Usuario'],
                'apellido2Usuario' => $_POST['apellido2Usuario'],
                'fechaNaceUsuario' => $_POST['fechaNaceUsuario'],
                'telefonoUsuario' => $_POST['telefonoUsuario'],
                'direccionUsuario' => $_POST['direccionUsuario'],
                'usuario' => $_POST['usuario'],
                'passUsuario' => $_POST['passUsuario'],
                'rolUsuario' => $_POST['rolUsuario']
            ];
            $resultado=$this->usuarioModel->editUsuario($data);
            print($resultado);
            if ($resultado) {
                echo json_encode('Exito: Usuario Editado!.');
            } else {
                echo json_encode('Error: No se puede Editar el Usuario!.');
            }
            
        } else {
            echo 'Atención! los datos no fueron enviados de un formulario';
        }  
        
    }
       

    public function eliminarUsuario($id)
    {
        $data = [
            'idUsuario' => $id
        ];
        $resultado =$this->usuarioModel->elimUsuario($data);
            if ($resultado) {
                echo json_encode('Exito: Usuario Eliminado !.');
            } else {
                echo json_encode('Error: No se puede Eliminar el Usuario !.');
            }
    }

    public function buscarUsuario($currentPage = 1)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $datos = [
                'nombreUsuario' => $_POST['nombreUsuario']
            ];
            $perPage = 15;
            $totalCount = $this->usuarioModel->totalUsuario();
            $pagination = new Paginator($currentPage, $perPage, $totalCount);
            $offset = $pagination->offset();
            $usuarios = $this->usuarioModel->buscUsuario($perPage, $offset, $datos);
            $data = [
                'usuario' => $usuarios,
                'previous' => $pagination->previous(),
                'next' => $pagination->next(),
                'total' => $pagination->totalPages(),
                'currentPage' => $currentPage

            ];
            if ($usuarios) {
                $this->renderView('Usuario/UsuarioInicio', $data);
            } else {
                $this->index();
            }
        } else {
            $this->index();
        }
    }

    public function ImprimirListado()
    {
        $data = $this->usuarioModel->verUsuarios();
        //$data = [];
        $this->renderView('Usuario/rptListadoUsuario', $data);
    }

}
