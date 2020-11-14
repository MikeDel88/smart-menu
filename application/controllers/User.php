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
		$passwordHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$data = array(
        	'email' => $this->input->post('email'),
        	'password' => $passwordHash,
			'active' => '0',
		);

		$user_id = $this->User->registerUser($data);
		$array = array(
			'user_id' => $user_id,
			'maintenance' => 1
		);

		$etablissement_id = $this->Etablissement_model->registerEtablissement($array);
		$array = array(
			'etablissement_id' => $etablissement_id
		);
		$this->Personnalisation->registerEtablissement($array);

		$this->mailing($data['email'], $user_id);

	}
	
	private function mailing($email, $password){

		$lien = base_url() . "confirm/" . $password;

		$this->load->library('email');
		
		require_once('config_mail.php');

		$this->email->initialize($config);
		

		$this->email->from('mikedel@alwaysdata.net', 'No-Reply');
		$this->email->to($email);

		$this->email->subject('Validation Smart-menu');
		$this->email->message("<a href='$lien' target='_blank'>Lien de confirmation</a>");

		$this->email->send();

		if ($this->email->send(FALSE))
		{
        	redirect('sign-up');
		}else{
			redirect('sign-in');
		}
	}

	public function deconnexion(){

		$this->session->id = NULL;
		$this->session->email = NULL;
        $this->session->sess_destroy();
        redirect(base_url());

	}

	public function confirm($pass){
		$this->load->model('User_model', 'User');
		$confirm = $this->User->selectUserConfirm($pass);
		if($pass == $confirm->id){
			$this->User->activation($confirm->id);
			redirect('sign-in');
		}else{
			redirect(base_url());
		}

	}

}