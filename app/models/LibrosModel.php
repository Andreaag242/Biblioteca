<?php
//modelo correspondiente a cada controlador
class LibrosModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    
    public function verLibros()
    {
        $this->db->query("SELECT idLibro, nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial where libros.estado=0");
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

    public function getOne($id)
    {
        $this->db->query("SELECT  idLibro, nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial FROM libros where idLibro =:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }

    public function editoriales(){
        $this->db->query("SELECT * FROM editorial");
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