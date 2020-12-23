<?php


class baseModel
{
    private $table,$conectar;
    protected $db;

    public function __construct($table)
    {
        $this->table = (string)$table;
        require_once '../core/Conectar.php';
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conexion();
    }


    public function getConectar(): Conectar
    {
        return $this->conectar;
    }


    public function getDb(): mysqli
    {
        return $this->db;
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");
        if ($row = $query->fetch_object()) {
            $resultSet = $row;
        }
        return $resultSet;
    }

    public function getBy($column, $value)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
        while ($row = $query->fetch_object()) {
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function deleteById($id)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

    public function deleteBy($column, $value)
    {
        $query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
        return $query;
    }

    public function ejecutarSql($query){
     $query=$this->getDb()->query($query);
     if($query){
         if($query->num_rows>1){
             while ($row=$query->fetch_object()){
                 $resultSet[]=$row;
             }
         }elseif ($query->num_rows==1){
             if($row=$query->fetch_object()){
                 $resultSet=$row;
             }
         }else{
             $resultSet=true;
         }
     }else{
         $resultSet=true;
     }
     return $resultSet;
 }

}