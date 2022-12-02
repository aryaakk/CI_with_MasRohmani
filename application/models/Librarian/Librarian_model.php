<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Librarian_model extends CI_Model
{

    private $table = "librarians";

    public function getAllValues()
    {
        return $this->db->get($this->table)->result();
    }

    public function getByID($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insertData($data)
    {
        return $this->db->insert($this->table, $data);

        // $statement = "INSERT INTO $this->table (username, name, email, password, avatar, created_at) VALUES(
        //     :username, 
        //     :name, 
        //     :email, 
        //     :password, 
        //     :avatar,
        //     :created_at
        // )";
        // return $this->db->query($statement, $data);
    }

    public function updateSaveData($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));

        //     $statement = "UPDATE $this->table SET 
        //         username = :username,
        //         name = :name,
        //         email = :email,
        //         password = :password,
        //         avatar = :avatar,
        //         created_at = :created_at
        //         WHERE id = :id";
        //     return $this->db->query($statement, $data);
    }

    public function deleteData($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
        // $statement = "DELETE FROM $this->table WHERE id = :id";
        // return $this->db->query($statement, [$id]);
    }
}
