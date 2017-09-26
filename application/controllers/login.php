<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Login extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {
		
		// echo 'here';
		// echo '<pre>';
		// print_R($_POST);
		// echo '</pre>';
		if(isset($_POST['check_session_val']) && $_POST['check_session_val'] != '')
		{
			$sessionArray = array('email'=>$_POST['check_session_val'],                    
                               'isLoggedIn' => TRUE
                                    );
        $this->session->set_userdata($sessionArray);
         redirect('/dashboard');  
		}
		else
		{
			redirect('/login');
		}
		
 
    }




}

?>