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
    public function addLibro($data){

        $valor=$this->db->query("INSERT INTO `libros` (nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial) 
        VALUES (:nom,:autor,:disp,:cant,:edit)");
        //bindiamos
        
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
}