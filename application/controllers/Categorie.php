<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends MY_Controller {

	public $etablissement;

	public function __construct(){

		parent::__construct();
		if($this->session->user_id == FALSE){
			redirect('sign-in');
		}else{
			$this->load->model('Etablissement_model');
			$this->etablissement = $this->Etablissement_model->selectEtablissement($this->session->user_id);
            $this->load->library('Etablissement', $this->etablissement);
			$this->load->model('Categories_model', 'Categories');
            $this->load->model('Products_model', 'Products');
			
		}

    }

	public function index(){
        $data['categories'] = $this->Categories->selectCategories($this->etablissement->id);
        $data['counts'] = $this->Categories->selectCategoriesByProduct();

        $data['title'] = self::$name_site . " | Catégories";
			$this->load->view('partials/head.inc.php', $data);
			$this->load->view('partials/header.inc.php');
			$this->load->view('partials/nav.inc.php');
			$this->load->view('categories', $data);
            $this->load->view('partials/footer.inc.php');
            
    }
    
    public function add_categorie(){

		if($this->form_validation->run() == TRUE){
				$array = [];
				$array['etablissement_id'] = $this->etablissement->id;
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						$array[$post] = $value;
					}
					if($post == 'sous_categorie' && $value == 'on'){
						$array[$post] = true;
					}
				}
				$this->Categories->insertCategorie($array);
				redirect('manager/categories');
        }

        $data['title'] = self::$name_site . " | Ajouter une catégorie";

			$this->load->view('partials/head.inc.php', $data);
			$this->load->view('partials/header.inc.php');
			$this->load->view('partials/nav.inc.php');
			$this->load->view('add_categorie', $data);
            $this->load->view('partials/footer.inc.php');
    }
    
    public function modif_categorie(?int $id = 0, ?string $cat = ''){

		if($this->form_validation->run() == TRUE){
				$array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						$array[$post] = $value;
                    }
                    if($post == 'sous_categorie' && $value == 'on'){
						$array[$post] = true;
					}else{
                        $array['sous_categorie'] = 0;
                    }
                }
				$this->Categories->updateCategorie($array, $this->input->post('id'));
				redirect("manager/categories/modifier-une-categorie/{$this->input->post('id')}/{$this->input->post('name')}");

		}

        $data['categorie'] = $this->Categories->selectOneCategories($this->etablissement->id, $id);
        if($data['categorie']->sous_categorie == 1){
            $this->load->model('Sous_categories_model', 'Sous_Categories');
            $data['sous_categories'] = $this->Sous_Categories->selectSousCategories($data['categorie']->id);
        };
        $data['title'] = self::$name_site . " | Modifier $cat";

			$this->load->view('partials/head.inc.php', $data);
			$this->load->view('partials/header.inc.php');
			$this->load->view('partials/nav.inc.php');
			$this->load->view('modif_categorie.php', $data);
			$this->load->view('partials/footer.inc.php');

	}
	
	public function delete_categorie($id){

		$products_id = $this->Products->selectProducts($id);

		foreach($products_id as $product_id){
			$this->Products->delete_product_menu($product_id->id);
		}
		
		$this->Categories->deleteCategorie($id);
		redirect('manager/categories');
		
	}

    
    public function add_sous_categorie(){

		if($this->form_validation->run() == TRUE){
				$this->load->model('Sous_categories_model', 'Sous_Categories');
				$array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit' && $post != 'cat_name'){
						print_r($array[$post] = $value);
					}
                }
				$this->Sous_Categories->insertSousCategorie($array);
				redirect("manager/categories/modifier-une-categorie/{$array['cat_id']}/{$this->input->post('cat_name')}");
        }else{
            redirect('manager/categories');
        }
    }

    public function delete_sous_categorie($id){

        $this->load->model('Sous_categories_model', 'Sous_Categories');
		$this->Sous_Categories->deleteSousCategorie($id);
        redirect('manager/categories');
        
	}

	public function delete_sous_cat_by_cat_id($id, $cat_id, $name){

		$this->Categories->delete_product_sous_categorie_by_sous_cat($id);
		$this->Categories->deleteSousCategorie($id);
		redirect("manager/categories/modifier-une-categorie/$cat_id/$name");

	}
}