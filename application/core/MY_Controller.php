
<?  (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected static $name_site;

        public function __construct()
        {
            parent::__construct();
 
			self::$name_site = 'Smart_menu';

		    if($this->session->user_id == FALSE){
		    	redirect('sign-in');
		    }else{
		    	$this->etablissement = $this->Etablissement_model->selectEtablissement($this->session->user_id);
		    	$this->load->library('Etablissement', $this->etablissement);
				$this->load->model('User_model', 'User');
		    }
        }
}
