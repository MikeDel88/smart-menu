
<?
class MY_Controller extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $CI =& get_instance();
		    $method = $CI->router->method;
		    if($this->session->user_id == FALSE){
		    	redirect('sign-in');
		    }else{
		    	$this->load->model('Etablissement_model');
		    	$this->etablissement = $this->Etablissement_model->selectEtablissement($this->session->user_id);
		    	$this->load->library('Etablissement', $this->etablissement);
		    	$this->load->model('Menus_model', 'Menus');
                $this->load->model('Categories_model', 'Categories');
                $this->load->model('Products_model', 'Products');
				$this->load->model('Personnalisation_model', 'Personnalisation');
				$this->load->model('Sous_categories_model', 'Sous_categories');
				$this->load->model('User_model', 'User');
		    }
        }
}