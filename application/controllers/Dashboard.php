<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $etablissement;

	public function __construct(){

		parent::__construct();

		require('application/libraries/phpqrcode/qrlib.php');

    }
    
	public function index(){
		
			$data['personnalisation'] = $this->Personnalisation->selectPersonnalisation($this->etablissement->id);

			$data['title'] = self::$name_site . " | Tableau de bord";

			$this->load->view('partials/head.inc.php', $data);
			$this->load->view('partials/header.inc.php');
			$this->load->view('partials/nav.inc.php');
			$this->load->view('dashboard', $data);
			$this->load->view('partials/footer.inc.php');
	}

	public function etablissement(){

		if($this->form_validation->run() == TRUE){
			$array = [];
			foreach($this->input->post() as $post => $value){
				if($post != 'submit'){
					$array[$post] = $value;
				}
			}
			$this->Etablissement_model->updateEtablissement($array);
			$this->etablissement = $this->Etablissement_model->selectEtablissement($this->session->user_id);
			$data['info'] = "Modification enregistrée !";

			if($this->etablissement->address_menu != ''){

			$data['lien'] = base_url() . "menu/" . $this->etablissement->address_menu;
			$data['QRcode'] = QRcode::png($data['lien'], "qrcode/{$this->etablissement->id}.png");

			}

		}

		
		$data['title'] = self::$name_site . " | Etablissement";
		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('partials/nav.inc.php');
		$this->load->view('etablissement', $data);
		$this->load->view('partials/footer.inc.php');
		
	}

	public function maintenance(){

		$value = ($this->input->post('maintenance') == on) ? 1 : 0;
		$this->Etablissement_model->updateMaintenance($value);

		redirect($_SERVER['HTTP_REFERER']);
		
	}

}