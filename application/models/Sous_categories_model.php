<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sous_categories_model extends CI_Model {

    private $table = 'sous_categories';

    public function selectSousCategories($id)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('cat_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertSousCategorie($array)
    {
        $this->db->insert($this->table , $array);
    }

    public function deleteSousCategorie($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}