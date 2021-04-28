<?php

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('user_model');
    }
    public function login_view()
	{
		$data['title'] = "Login";
		$this->load->view('templates/header', $data);
		$data['error']= "";
		
		if (!$this->session->userdata('logged_in'))//check if user already login
		{
			if (get_cookie('remember')) {
				if (get_cookie('remember')){ // check if user activate the "remember me" feature
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true //create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					redirect('pages/view'); //if user already logined show main page
				}
			}
			}else{
		
				$this->load->view('pages/login', $data);	//if username password incorrect, show error msg and ask user to login
			}  
			
		}else{
			redirect('pages/view'); //if user already logined show main page
		}
		$this->load->view('templates/footer');
	}
	public function check_login()
	{
		$data['error']= "<div class=\" mt-1 alert alert-danger\" role=\"alert\"> Incorrect username or password!</div> ";
		$data['title'] = "Login";
		$this->load->view('templates/header', $data);
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password');
		$remember = $this->input->post('remember'); //getting pa,ssword from login form
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			if ( $this->user_model->login($username, $password) )//check username and password
			{
				$user_data = array(
					'username' => $username,
					'logged_in' => true 	//create session variable
				);
				if($remember) { // if remember me is activated create cookie
					set_cookie("username", $username, '300'); //set cookie username
					set_cookie("password", $password, '300'); //set cookie password
					set_cookie("remember", $remember, '300'); //set cookie remember
				}	
				$this->session->set_userdata($user_data); //set user status to login in session
				redirect('pages/view'); // direct user home page
			}else
			{
				$this->load->view('pages/login');	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			{
				redirect('pages/view'); //if user already logined direct user to home page
			}
		$this->load->view('templates/footer');
		}
	}


    public function register_view(){
		$data['title'] = "Register";
        $this->form_validation->set_rules('username','username','required|is_unique[user.username]');
        $this->form_validation->set_rules('email','email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','password','required|min_length[8]');
        $this->form_validation->set_rules('passconf','password confirmation','required|matches[password]');
        
        if(!$this->form_validation->run()){
            $this->load->view('templates/header', $data);
            $this->load->view('pages/register');
            $this->load->view('templates/footer');
        }else{
            $this->user_model->register();
            redirect('/pages/view');
        }
    }
	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		redirect('pages/view');
	}
    
}
?>