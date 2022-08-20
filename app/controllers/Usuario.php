<?php

class Usuario extends Controller
{
    public function __construct()
    {
        //Configuramos el modelo correspondiente a este controlador
        $this->usuarioModel =  $this->loadModel('UsuarioModel');
    }

    //funcion mostrar el inicio
    public function index()
    {
        $data = $this->usuarioModel->verUsuarios();
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
    public function editarUsuario($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idUsuario' => $id,
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

            if ($this->usuarioModel->editUsuario($data)) {
                $data = [];
                $this->index();
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
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
            /* $rol=[
                'idRol' => $roles->idRol,
                'nombreRol'=>$roles->nombreRol
            ]; */
            
            $this->renderView('Usuario/UsuarioEditar', $data);
        }
    }
       

    public function eliminarUsuario($id)
    {
        $data = [
            'idUsuario' => $id
        ];
        if ($this->usuarioModel->elimUsuario($data)) {
            $this->index();
        } else {
            $this->index();
        };
    }
}
