<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {


    public function __construct(){
       parent::__construct();
    }

    public function index($name){

        $data['etablissement'] = $this->Etablissement_model->selectByName($name);
        $etablissement_id = $data['etablissement']->id;
        $data['personnalisation'] = $this->Personnalisation->selectPersonnalisation($etablissement_id);
        $data['categories'] = $this->Categories->selectCategories($etablissement_id);
        $data['menus'] = $this->Menus->selectAllMenus($etablissement_id);
        $data['products_menu'] =[];
        
        if(!empty($data['menus'])){
            foreach($data['menus'] as $menus){
                $data['compositions'][] = $this->Menus->selectComposition($menus->id);
            }
        }



        if(!empty($data['compositions'])){
            foreach($data['compositions'] as $compositions){

                foreach($compositions as $menu){
                    $data['composition_menu'][] = $menu;
                }

            }

            foreach($data['composition_menu'] as $menu){

                $produit = $this->Products->selectOneProduct($menu->products_id);
                if(in_array($produit, $data['products_menu']) == FALSE){
                    $data['products_menu'][] = $produit;
                }
            }
        }
        
        

        if(!empty($data['categories'])){

            foreach($data['categories'] as $categorie){
                $data['products'][] = $this->Products->selectProducts($categorie->id);
                if($categorie->sous_categorie == 1){
                    $data['sous_categories'][] = $this->Sous_categories->selectSousCategories($categorie->id);
                }
            }

            foreach($data['products'] as $product_cat){
                foreach($product_cat as $product){
                    $data['product'][] = $product;
                    $data['liens_prod_sous_cat'][] = $this->Products->select_product_sous_categorie_by_product($product->id);
                }
            }

  

            foreach($data['sous_categories'] as $sous_cat){
                $data['sous_categorie'][] = $sous_cat;
            }

            foreach($data['liens_prod_sous_cat'] as $lien_prod_sous_cat){
                if(!empty($lien_prod_sous_cat)){
                    foreach($lien_prod_sous_cat as $lien){
                        $data['lien_prod_sous_cat'][] = $lien;
                    }
                }
            }

        }

        $data['title'] = "Menu | " . $data['etablissement']->name;
        
        $this->load->view('partials/head.inc.php', $data);
        $this->load->view('front/menu.php', $data);

    }

    public function accueil(){

        $data['title'] = "Bienvenue sur le site";
        $this->load->view('partials/head.inc.php', $data);
        $this->load->view('partials/header.inc.php', $data);
        $this->load->view('front/accueil.php', $data);
  
    }
    


}