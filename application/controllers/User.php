<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function sign_in(){

        if ($this->form_validation->run() == TRUE)
        {
            $this->load->model('User_model', 'User');
			$email = $this->input->post('email');
			$password = html_escape($this->input->post('password'));
			
			$data['user'] = $this->User->selectUser($email, $password);
		
		if(password_verify($password, $data['user']->password)){
			
			$this->session->user_email = $data['user']->email;
			$this->session->user_id = $data['user']->id;

			// $this->session->mark_as_temp('id', 300);
			
			redirect('manager/dashboard');
		}
        }

        $data['title'] = "Se Connecter";

		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');
		$this->load->view('sign_in');
        $this->load->view('partials/footer.inc.php');

    }


    public function sign_up(){

        $data['title'] = "S'inscrire";

		$this->load->view('partials/head.inc.php', $data);
		$this->load->view('partials/header.inc.php');


		if ($this->form_validation->run() == TRUE)
        {
			$this->register();
		}
		$this->load->view('inscription');
		$this->load->view('partials/footer.inc.php');
    }

    private function register(){

        $this->load->model('User_model', 'User');
		$this->load->model('Etablissement_model');
		$this->load->model('Personnalisation_model', 'Personnalisation');

		$data = array(
        	'email' => $this->input->post('email'),
        	'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'active' => '0',
			'maintenance' => '1',
		);
		$user_id = $this->User->registerUser($data);
		$array = array(
			'user_id' => $user_id
		);
		$etablissement_id = $this->Etablissement_model->registerEtablissement($array);
		$array = array(
			'etablissement_id' => $etablissement_id
		);
		$this->Personnalisation->registerEtablissement($array);
        redirect('sign-in');
        
    }

	public function deconnexion(){

		$this->session->id = NULL;
		$this->session->email = NULL;
        $this->session->sess_destroy();
        redirect(base_url());

	}

}