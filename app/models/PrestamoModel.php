<?php
//modelo correspondiente a cada controlador
class PrestamoModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    
    public function prestamosPendientes()
    {
        $this->db->query("SELECT idPrestamo, fechaPrestamo, fechaEntrega, cliente_idCliente, usuario
        from encabezadoPrestamo where fechaEntrega IS NULL");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    public function editLibro($data){

        $valor=$this->db->query("UPDATE `libros` SET nombreLibro=:nom ,autor=:autor,disponible=:disp, cantidadTotal=:cant, editorial_idEditorial=:edit where idLibro=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idLibro'],PDO::PARAM_INT);
        $valor->bindParam(':nom', $data['nombreLibro'],PDO::PARAM_STR);
        $valor->bindParam(':autor', $data['autorLibro'],PDO::PARAM_STR);
        $valor->bindParam(':disp', $data['disponibleLibro'],PDO::PARAM_STR);
        $valor->bindParam(':cant', $data['cantidadTotalLibro'],PDO::PARAM_STR);
        $valor->bindParam(':edit', $data['editorialLibro'],PDO::PARAM_STR);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function buscCliente( $datos)
    {
        $this->db->query("SELECT idCliente, nombre1, nombre2, apellido1, apellido2, fechaNacimiento, telefono, direccion, activo
        from cliente where activo!=1 and idCliente like :nombre");
        $nombre = "%".$datos['nombreCliente']."%";
        $this->db->bind(':nombre', $nombre);
        $resultSet = $this->db->getAll();
        return $resultSet;

    }

    public function buscPrestamo($datos)
    {
        $valor=$this->db->query("SELECT idPrestamo, fechaPrestamo, fechaEntrega, cliente_idCliente, usuario
        from encabezadoprestamo where cliente_idCliente=:id");
        $valor->bindParam(':id', $datos['idCliente'], PDO::PARAM_INT);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    
    public function elimLibro($data){

        $valor=$this->db->query("UPDATE `libros` SET  estado=1 Where idLibro=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idLibro'],PDO::PARAM_INT);
        /*$valor->bindParam(':rol', $data['rolUsuario'] ,PDO::PARAM_INT);*/
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function add($data)
    {
        $this->db->query("INSERT INTO encabezadoprestamo (fechaPrestamo,cliente_idCliente,usuario) VALUES (:fecha,:idCliente,:usuario) ");
        //bindiamos
        $this->db->bind(':fecha', $data['fechaPrestamo']);
        $this->db->bind(':idCliente', $data['idCliente']);
        $this->db->bind(':usuario', $data['usuario']);
        //verificamos la ejecucion correcta del query 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLast()
    {
        $ultimo = $this->db->lastInsertId();
        return $ultimo;
    }
}