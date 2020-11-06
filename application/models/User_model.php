<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'users';

	public function selectUser($email, $password)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('email', $email);
        $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function registerUser($data){
       $this->db->insert($this->table, $data);       
       $last_id = $this->db->insert_id();
       return $last_id;
    }
    
}
