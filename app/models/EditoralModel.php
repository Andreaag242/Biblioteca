<?php
//modelo correspondiente a cada controlador
class EditorialModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbase;
    }

    public function verEditoriales()
    {
        $this->db->query("SELECT idEditorial, nombreEditorial
        from editorial");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function addEditorial($data)
    {

        $valor = $this->db->query("INSERT INTO `editorial` (nombreEditorial) 
        VALUES (:nom)");
        //bindiamos

        $valor->bindParam(':nom', $data['nombreEditorial'], PDO::PARAM_STR);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editEditorial($data)
    {

        $valor = $this->db->query("UPDATE `editorial` SET nombreEditorial=:nom where idLibro=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idEditorial'], PDO::PARAM_INT);
        $valor->bindParam(':nom', $data['nombreEditorial'], PDO::PARAM_STR);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id)
    {
        $this->db->query("SELECT * FROM editorial where idEditorial =:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }

    public function editoriales()
    {
        $this->db->query("SELECT * FROM editorial");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function elimEditorial($data)
    {

        $valor = $this->db->query("UPDATE `editorial` SET  estado=1 Where idEditorial=:id");
        //bindiamos
        $valor->bindParam(':id', $data['idEditorial'], PDO::PARAM_INT);
        /*$valor->bindParam(':rol', $data['rolUsuario'] ,PDO::PARAM_INT);*/
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
