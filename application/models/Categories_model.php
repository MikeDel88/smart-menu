<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    private $table = 'categories';

	public function selectCategories($id)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('etablissement_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectOneCategories($id, $cat_id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('etablissement_id', $id);
        $this->db->where('id', $cat_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function delete_product_sous_categorie_by_sous_cat($sous_cat){
        $this->db->where('sous_categorie_id', $sous_cat);
        $this->db->delete('lien_products_sous_categories');
    }

    public function insertCategorie($array)
    {
        $this->db->insert($this->table , $array);
    }

    public function updateCategorie($array, $id){
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    public function deleteCategorie($id){

        $this->db->select('sous_categories.id as sous_cat');
        $this->db->select('products.id as prod');
        $this->db->from('sous_categories');
        $this->db->from('products');
        $this->db->where('sous_categories.cat_id', $id);
        $this->db->where('products.categorie_id', $id);
        $query = $this->db->get();
        $result = $query->result();

        foreach($result as $k){

            $this->db->where('sous_categorie_id', $k->sous_cat);
            $this->db->where('product_id', $k->prod);
            $this->db->delete('lien_products_sous_categories');

        }

  
        $this->db->where('categorie_id', $id);
        $this->db->delete('products');

        $this->db->where('cat_id', $id);
        $this->db->delete('sous_categories');

        $this->db->where('id', $id);
        $this->db->delete('categories');
        
    }

    public function selectCategoriesByProduct(){
        
        $this->db->select('`categorie_id`');
        $this->db->select('COUNT(*) as nbrProduit');
        $this->db->from('categories');
        $this->db->from('products');
        $where = "`categories.id` = `categorie_id` AND `etablissement_id` = {$this->etablissement->id}";
        $this->db->where($where);
        $this->db->group_by('`categorie_id`');
        $query = $this->db->get();
        return $query->result();

    }


    public function deleteSousCategorie($id){

        $this->db->where('id', $id);
        $this->db->delete('sous_categories');
    }

    
}