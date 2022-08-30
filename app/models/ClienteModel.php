<?php
//modelo correspondiente a cada controlador
class ClienteModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbase;
    }
    public function verClientes()
    {
        $this->db->query("SELECT idCliente, nombre1, nombre2, apellido1, apellido2, fechaNacimiento, telefono, direccion, activo
        from cliente where activo!=1");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function addCliente($data)
    {

        $valor = $this->db->query("INSERT INTO `cliente` (idCliente , nombre1 ,nombre2,apellido1, apellido2, fechaNacimiento,  telefono, direccion, activo) 
        VALUES (:id,:nom1,:nom2,:ape1,:ape2,:fechaN,:tel,:dir, 0)");
        //bindiamos
        $valor->bindParam(':id', $data['idCliente'], PDO::PARAM_INT);
        $valor->bindParam(':nom1', $data['nombre1Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':nom2', $data['nombre2Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':ape1', $data['apellido1Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':ape2', $data['apellido2Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':fechaN', $data['fechaNaceCliente'], PDO::PARAM_STR);
        $valor->bindParam(':tel', $data['telefonoCliente'], PDO::PARAM_STR);
        $valor->bindParam(':dir', $data['direccionCliente'], PDO::PARAM_STR);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editCliente($data)
    {

        $valor = $this->db->query("UPDATE `cliente` SET  nombre1=:nom1 ,nombre2=:nom2,apellido1=:ape1, apellido2=:ape2, fechaNacimiento=:fechaN,  telefono=:tel, direccion=:dir where idCliente=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idCliente'], PDO::PARAM_INT);
        $valor->bindParam(':nom1', $data['nombre1Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':nom2', $data['nombre2Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':ape1', $data['apellido1Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':ape2', $data['apellido2Cliente'], PDO::PARAM_STR);
        $valor->bindParam(':fechaN', $data['fechaNaceCliente'], PDO::PARAM_STR);
        $valor->bindParam(':tel', $data['telefonoCliente'], PDO::PARAM_STR);
        $valor->bindParam(':dir', $data['direccionCliente'], PDO::PARAM_STR);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id)
    {
        $this->db->query("SELECT * FROM cliente where idCliente =:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }

    public function roles()
    {
        $this->db->query("SELECT * from rol");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }


    public function elimCliente($data)
    {

        $valor = $this->db->query("UPDATE `cliente` SET  activo=1 Where idCliente=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idCliente'], PDO::PARAM_INT);
        /*$valor->bindParam(':rol', $data['rolUsuario'] ,PDO::PARAM_INT);*/
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // buscar libros
    public function buscCliente($datos)
    {
        $this->db->query("SELECT idCliente, nombre1, nombre2, apellido1, apellido2, fechaNacimiento, telefono, direccion, activo
        from cliente where activo!=1");
        $nombre = "%".$datos['nombreLibro']."%";
        $this->db->bind(':nombre', $nombre);
        $resultSet = $this->db->getAll();
        return $resultSet;

    }

    // contar las filas
    public function rowCount()
    {
        $this->db->query("SELECT * FROM cliente");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }


    /**
     * totalMedicos
     *  Devuelve total medicos para la paginacion
     * @return void
     */
    public function totalClientes()
    {
        $this->db->query("SELECT COUNT(idCliente) as numevents FROM cliente");
        $resultSet = $this->db->getOne();
        return  $resultSet;
    }


    /**
     * totalPages
     * devuelve el total de paginas de acuerdo al limite y al offset
     * @param  mixed $perPage
     * @param  mixed $offset
     * @return void
     */
    public function totalPages($perPage, $offset)
    {
        $this->db->query("SELECT idCliente, nombre1, nombre2, apellido1, apellido2, fechaNacimiento, telefono, direccion, activo
        from cliente where activo!=1 ORDER BY apellido1 ASC LIMIT :limit OFFSET :offset");
        $this->db->bind(":limit", $perPage);
        $this->db->bind(":offset", $offset);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    //=========================== paginacion  =====================
}
