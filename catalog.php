<?php

Class Catalog 
{
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
    }


    public function getList($num_level)
    {
        $query = 'select id, name from catalog where id_parent = :id_parent';

        return $this->db->getList($query, ['id_parent' => $num_level]);
    }


    public function add($id_parent, $name)
    {
        if ($id_parent === -1 or strlen($name) < 1) {
            return;
        }

        $query = 'insert into catalog (name, id_parent) values (:name, :id_parent)';

        return $this->db->insertData($query, ['name' => $name, 'id_parent' => $id_parent]);
    }
}

