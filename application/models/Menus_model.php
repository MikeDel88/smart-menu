<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model {

    private $table = 'menus';

    public function insertMenu($array){
       $this->db->insert($this->table , $array);
        $last_id = $this->db->insert_id();
       return $last_id;
    }

    public function insertComposition($array){
        $this->db->set($array);
        $this->db->where('menu_id', $array['menu_id']);
        $this->db->insert('composition');
    }

    public function selectComposition($id){
        $this->db->select('*');
        $this->db->from('composition');
        $this->db->where('menu_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteOneComposition($id){
        $this->db->where('id', $id);
        $this->db->delete('composition');
    }

    public function selectAllMenus($etab_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('etablissement_id', $etab_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectOneMenu($id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function modifMenu($array, $id){
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function deleteComposition($id){

        $this->db->where('menu_id', $id);
        $this->db->delete('composition');

    }
       


}