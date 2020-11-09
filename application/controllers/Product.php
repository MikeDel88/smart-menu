<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {

	public $etablissement;

	public function __construct(){

		parent::__construct();
	
	}

	public function index(){

		$this->load->model('Categories_model', 'Categories');


		$data['categories'] = $this->Categories->selectCategories($this->etablissement->id);

		foreach($data['categories'] as $categorie){
			$data['products'][] = $this->Products->selectProducts($categorie->id);
		}

		$data['title'] = self::$name_site . " | Produits";
		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('partials/nav.inc.php');
		$this->load->view('products', $data);
		$this->load->view('partials/footer.inc.php');

	}

	public function add_product(){
		if($this->form_validation->run() == TRUE){
				$array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						$array[$post] = $value;
					}
				}
				$this->Products->insertProduct($array);
				redirect('manager/produits');
		}else{
			redirect('manager/produits');
		}
	}

	public function modif_product(? int $id = 0, ?string $prod = ''){
		
		if($this->form_validation->run() == TRUE){
				$array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						if($post == 'price'){
							$price = strtr($value, ',', '.');
							$array[$post] = floatval($price);
						}else{
							$array[$post] = $value;
						}
					}
				}
				if(!empty($array['sous_categorie_id'])){
					$this->Products->update($array);

				}else{
					$this->Products->updateProduct($array);
				};
				redirect("manager/produits/{$this->input->post('product_id')}/{$this->input->post('name')}");
		}

		$this->load->model('Sous_categories_model', 'Sous_categories');
		$this->load->model('Categories_model', 'Categories');

		$data['product'] = $this->Products->selectOneProduct($id);
		$data['categorie'] = $this->Categories->selectOneCategories($this->etablissement->id, $data['product']->categorie_id);
		$data['sous_categories'] = $this->Sous_categories->selectSousCategories($data['product']->categorie_id);
		$data['prix'] = [];

		foreach($data['sous_categories'] as $k => $v){
			$data['prix'][] = $this->Products->select_product_sous_categorie($data['product']->id, $v->id);
		}
		
			$data['title'] = self::$name_site . " | $prod";
			$this->load->view('partials/head.inc.php', $data);
			$this->load->view('partials/header.inc.php');
			$this->load->view('partials/nav.inc.php');
			$this->load->view('modif_products.php', $data);
			$this->load->view('partials/footer.inc.php');
	}

	public function delete_product($id){

		$data = $this->Products->select_product_sous_categorie_by_product($id);
		if(empty($data)){
			$this->Products->deleteProduct($id);
		}else{
			foreach($data as $k){
				$this->Products->delete_sous_cat($k->product_id, $k->sous_categorie_id);
			}
			$this->Products->deleteProduct($id);
		}
		redirect('manager/produits');
	}

	public function delete_sous_cat($prod, $name, $sous_cat){

		$this->Products->delete_sous_cat($prod, $sous_cat);
		redirect("manager/produits/$prod/$name");

	}


}
	
