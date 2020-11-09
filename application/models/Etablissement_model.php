<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('application/libraries/Etablissement.php');

class Etablissement_model extends CI_Model {

    private $table = 'etablissement';

	public function selectEtablissement($id)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->custom_row_object(0, 'Etablissement');
    }

    public function updateEtablissement($array)
    {
        $this->db->set('updated_at', mdate('%Y%m%d%H%i%s', now('Europe/Paris')));
        $this->db->where('user_id', $this->session->user_id);
        $this->db->update($this->table, $array);
    }

    public function registerEtablissement($array){
        $this->db->insert($this->table, $array);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function selectByName($name){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('address_menu', $name);
        $query = $this->db->get();
        return $query->custom_row_object(0, 'Etablissement');
    }

}