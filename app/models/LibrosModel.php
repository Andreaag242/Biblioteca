<?php
//modelo correspondiente a cada controlador
class LibrosModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    
    public function verLibros()
    {
        $this->db->query("SELECT idLibro, nombreLibro, autor, disponible, cantidadTotal, idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial where libros.estado=0");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function addLibro($data){

        $valor=$this->db->query("INSERT INTO libros (nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, estado) 
        VALUES (:nom,:autor,:disp,:cant,:edit, 0)");
        //bindiamos
        
        $valor->bindParam(':nom', $data['nombreLibro'],PDO::PARAM_STR);
        $valor->bindParam(':autor', $data['autorLibro'],PDO::PARAM_STR);
        $valor->bindParam(':disp', $data['disponibleLibro'],PDO::PARAM_INT);
        $valor->bindParam(':cant', $data['cantidadTotalLibro'],PDO::PARAM_INT);
        $valor->bindParam(':edit', $data['editorialLibro'],PDO::PARAM_INT);
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
        $valor->bindParam(':disp', $data['disponibleLibro'],PDO::PARAM_INT);
        $valor->bindParam(':cant', $data['cantidadTotalLibro'],PDO::PARAM_INT);
        $valor->bindParam(':edit', $data['editorialLibro'],PDO::PARAM_INT);
        //verificamos la ejecucion correcta del query*/
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id)
    {
        $this->db->query("SELECT idLibro, nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial where libros.estado=0 AND idLibro =:id");
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

    // buscar libros
    public function buscLibro($perPage, $offset, $datos)
    {
        $this->db->query("SELECT idLibro, nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial where libros.estado=0 AND nombreLibro LIKE :nombre or autor like :nombre ORDER BY nombreLibro ASC LIMIT :limit OFFSET :offset ");
        $nombre = "%".$datos['nombreLibro']."%";
        $this->db->bind(':nombre', $nombre);
        $this->db->bind(":limit", $perPage);
        $this->db->bind(":offset", $offset);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    // contar las filas
    public function rowCount()
    {
        $this->db->query("SELECT * FROM libros");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }


    /**
     * totalMedicos
     *  Devuelve total medicos para la paginacion
     * @return void
     */
    public function totalLibro()
    {
        $this->db->query("SELECT COUNT(idLibro) as numevents FROM libros");
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
        $this->db->query("SELECT idLibro, nombreLibro, autor, disponible, cantidadTotal, editorial_idEditorial, nombreEditorial
        from libros INNER JOIN 	editorial ON libros.editorial_idEditorial = editorial.idEditorial where libros.estado=0 ORDER BY nombreLibro ASC LIMIT :limit OFFSET :offset");
        $this->db->bind(":limit", $perPage);
        $this->db->bind(":offset", $offset);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    //=========================== paginacion  =====================
}