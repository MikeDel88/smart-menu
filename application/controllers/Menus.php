<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends MY_Controller {

	public $etablissement;

	public function __construct(){

		parent::__construct();
		
	}

	public function index(){

        $data['menus'] = $this->Menus->selectAllMenus($this->etablissement->id);

		$data['title'] = "Smart_menu | Les menus";
		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('partials/nav.inc.php');
		$this->load->view('menus', $data);
		$this->load->view('partials/footer.inc.php');

    }

    public function add_menu(){
        if($this->form_validation->run() == TRUE){
                $array = [];
                $array['etablissement_id'] = $this->etablissement->id;
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						$array[$post] = $value;
					}
				}
                $this->Menus->insertMenu($array);
				redirect('manager/menus');
		}else{
			redirect('manager/menus');
		}
    }

    public function voir_menu($id){

        $data['menu'] = $this->Menus->selectOneMenu($id);
        $data['categories'] = $this->Categories->selectCategories($this->etablissement->id);


        foreach($data['categories'] as $k => $v){
            $data['products'][] = $this->Products->selectProducts($v->id);
        }

        $data['composition'] = $this->Menus->selectComposition($id);

		$data['title'] = "Smart_menu | {$data['menu']->name}";
		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('partials/nav.inc.php');
		$this->load->view('modif_menu', $data);
		$this->load->view('partials/footer.inc.php');

    }

    public function modif_menu(){
        if($this->form_validation->run() == TRUE){
                $array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit' && $post != 'id'){
						$array[$post] = $value;
                    }
				}
                $this->Menus->modifMenu($array, $this->input->post('id'));
				$this->voir_menu($this->input->post('id'));
		}else{
			$this->voir_menu($this->input->post('id'));
		}
    }

    public function delete_menu($id, $name){

        $this->Menus->deleteComposition($id);
        $this->Menus->delete($id);
        redirect('/manager/menus');

    }

    public function add_composition(){
		if($this->form_validation->run() == TRUE){
        	$array = [];
			
	    	foreach($this->input->post() as $post => $value){
	    		if($post != 'submit' && $post != 'id'){
	    			$array[$post] = $value;
        	    }
        	    if($post == 'products_id'){
        	        $array[$post] = $value;
        	        foreach($array[$post] as $id){
        	            $array[$post] = $id;
        	            $this->Menus->insertComposition($array);
        	        }
        	    }
			}
		}
        redirect("manager/menus");
    }

    public function delete_composition($menu_id, $menu_name, $id){
        $this->Menus->deleteOneComposition($id);
        redirect("/manager/menus/$menu_id/$menu_name#composition");
    }

}