<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    private $table = 'products';

	public function selectProducts($id)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('categorie_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectOneProduct($id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function select_product_sous_categorie($prod, $sous_cat){

        $this->db->select('lien_products_sous_categories.price');
        $this->db->select('sous_categories.name as sous_cat_name');
        $this->db->select('sous_categories.id as sous_cat_id');
        $this->db->select('products.name as prod_name');
        $this->db->select('products.id as prod_id');
        $this->db->from('lien_products_sous_categories');
        $this->db->from('sous_categories');
        $this->db->from('products');
        $this->db->where('lien_products_sous_categories.product_id', $prod);
        $this->db->where('sous_categories.id', $sous_cat);
        $this->db->where('products.id', $prod);
        $this->db->where('lien_products_sous_categories.sous_categorie_id', $sous_cat);

        $query = $this->db->get();
        return $query->row();

    }

    public function select_product_sous_categorie_by_product($prod){
        $this->db->select('*');
        $this->db->from('lien_products_sous_categories');
        $this->db->where('product_id', $prod);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertProduct($array)
    {
        $this->db->insert($this->table , $array);
    }

    public function updateProduct($array){

        $this->db->set('name', $array['name']);
        $this->db->set('composition', $array['composition']);
        $this->db->set('price', $array['price']);
        $this->db->where('id', $array['product_id']);
        $this->db->update($this->table);
    }

    public function update($array){
        
        $query = $this->db->query("SELECT * FROM lien_products_sous_categories WHERE product_id = {$array['product_id']} AND sous_categorie_id = {$array  ['sous_categorie_id']}");

        if($query->num_rows() == 0){
            $this->db->set('price', $array['price']);
            $this->db->set('product_id', $array['product_id']);
            $this->db->set('sous_categorie_id', $array['sous_categorie_id']);
            return $this->db->insert('lien_products_sous_categories');
        }else{
            $query = $this->db->query("UPDATE lien_products_sous_categories SET price = {$array['price']} WHERE product_id = {$array['product_id']} AND   sous_categorie_id = {$array['sous_categorie_id']}");
        };
        
    }

    public function deleteProduct($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function delete_sous_cat($prod, $sous_cat){

        $this->db->where('product_id', $prod);
        $this->db->where('sous_categorie_id', $sous_cat);
        $this->db->delete('lien_products_sous_categories');

    }

    public function delete_product_menu($id){
        $this->db->where('products_id', $id);
        $this->db->delete('composition');
    }
    
}