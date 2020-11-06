<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnalisation_model extends CI_Model {

    private $table = 'personnalisation';

	public function selectPersonnalisation($id)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('etablissement_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updatePersonnalisation($array)
    {
        $this->db->set($array);
        $this->db->where('etablissement_id', $this->etablissement->id);
        $this->db->update($this->table);
    }

    public function registerEtablissement($array){
        $this->db->insert($this->table, $array);
    }
    
}