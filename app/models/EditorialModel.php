<?php
//modelo correspondiente a cada controlador
class EditorialModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbase;
    }

    public function verEditorial()
    {
        $this->db->query("SELECT idEditorial, nombreEditorial
        from editorial WHERE estado!=1");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function addEditorial($data)
    {

        $valor = $this->db->query("INSERT INTO `editorial` (nombreEditorial, estado) 
        VALUES (:nom, 0)");
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

        $valor = $this->db->query("UPDATE `editorial` SET nombreEditorial=:nom where idEditorial=:id");
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

    // contar las filas
    public function rowCount()
    {
        $this->db->query("SELECT * FROM editorial");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }


    /**
     * totalMedicos
     *  Devuelve total medicos para la paginacion
     * @return void
     */
    public function totalEditorial()
    {
        $this->db->query("SELECT COUNT(idEditorial) as numevents FROM editorial");
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
        $this->db->query("SELECT idEditorial, nombreEditorial
        from editorial WHERE estado!=1 ORDER BY nombreEditorial ASC LIMIT :limit OFFSET :offset");
        $this->db->bind(":limit", $perPage);
        $this->db->bind(":offset", $offset);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    //=========================== paginacion  =====================
}
