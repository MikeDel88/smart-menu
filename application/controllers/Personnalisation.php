<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnalisation extends MY_Controller {

	public $etablissement;

	public function __construct(){

		parent::__construct();
		
	}

	public function index(?string $info = ''){

		$data['info'] = $info;

        $data['personnalisation'] = $this->Personnalisation->selectPersonnalisation($this->etablissement->id);
		
		$data['title'] = "Smart_menu | Personnalisation";
		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('partials/nav.inc.php');
		$this->load->view('personnalisation', $data);
		$this->load->view('partials/footer.inc.php');

		
	}

	public function logo_upload(){

		$config['upload_path']          = './uploads';
		$config['file_name']			= "etablissement-{$this->etablissement->id}";
		$config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= TRUE;
        $config['max_size']             = 700;
        $config['max_width']            = 1024;
        $config['max_height']           = 700;
		
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('logo'))
        {
           $info = array(
				'path_logo' => "./uploads/{$this->upload->data('file_name')}",
			);
			$this->Personnalisation->updatePersonnalisation($info);
			$data = 'chargement ok';
            $this->index($data);
        }else{
			redirect('manager/personnalisation');
		}
	}

	public function colors_upload(){
		
		if($this->form_validation->run() == TRUE){
				$array = [];
				foreach($this->input->post() as $post => $value){
					if($post != 'submit'){
						$array[$post] = $value;
					}
				}
				$this->Personnalisation->updatePersonnalisation($array);
				$info = 'Modification ok';
           		$this->index($info);
		}
	}
    
}