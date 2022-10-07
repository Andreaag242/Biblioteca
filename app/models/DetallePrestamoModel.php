<?php
//modelo correspondiente a cada controlador
class detallePrestamoModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Dbase;
    }


    //retorna todos los registros
    public function getAll()
    {
        $this->db->query("SELECT * FROM detalleprestamo");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }


    public function add($data, $numFormula)
    {
        //die(var_dump($data))
        $numeroFilas = 0;
        while ($numeroFilas < count($data['idLibro'])) {
            $this->db->query("INSERT INTO detalleprestamo(cantidad, libros_idLibro, libros_editorial_idEditorial, encabezadoPrestamo_idPrestamo) VALUES (:cantidad,:idLibro,:editorialLibro,:encabezadoPrestamo)");
            //vinculamos las variables del array con los parametros de la consulta
            $this->db->bind(':cantidad', $data['cantidad'][$numeroFilas]);
            $this->db->bind(':idLibro', $data['idLibro'][$numeroFilas]);
            $this->db->bind(':editorialLibro', $data['editorialLibro'][$numeroFilas]);
            $this->db->bind(':encabezadoPrestamo', $numFormula);
            $resulset = $this->db->execute();
            $numeroFilas = $numeroFilas + 1;
        }
        if ($resulset) {
            return true;
        } else {
            return false;
        }
    }
}
