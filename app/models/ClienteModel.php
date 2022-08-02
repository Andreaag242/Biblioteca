<?php
//modelo correspondiente a cada controlador
class ClienteModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    public function verClientes()
    {
        $this->db->query("SELECT * FROM cliente");
        $cantidad = $this->db->rowCount();

        if($cantidad>0){
            $resultSet = $this->db->getOne();
            return $resultSet;
        }
        else{
            return "Vacio";
        }

    }
}