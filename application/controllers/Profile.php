<?php
    class Profile extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('url_helper');
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('user_model');
            $this->load->library('form_validation');
        }

        public function profile_view($username){
            $data['isUser'] = false;
            if ($this->session->userdata('logged_in') && $_SESSION['username'] == $username){
                $data['isUser'] = true;
            }
            $data['error'] = "";
            $data['title'] = $username." Profile";
            $this->load->view('templates/header', $data);
            $data['username'] = $username;
            $data['email'] = $this->user_model->getEmail($username);
            $data['image'] = $this->user_model->getImage($username);

            $this->load->view('pages/profile', $data);
            $this->load->view('templates/footer');
        }

        public function edit_view(){
            $username = $_SESSION['username'];
            $email = $this->user_model->getEmail($username);
            $data['username'] = $username;
            $data['email'] = $email;
            $data['title'] = "Update Profile";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_profile', $data);
            $this->load->view('templates/footer');
        }

        public function update_profile(){
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            if ($this->user_model->update_user($username, $email)){
                redirect('pages/view');
            }else{
                redirect('product/edit_profile');
            }
        }

        public function upload_photo(){
           
            $config['upload_path'] = './uploads/';
		    $config['allowed_types'] = 'jpg|png|gif';
		    $config['max_size'] = 20000;
		    $config['max_width'] = 200000;
		    $config['max_height'] = 200000;
            $username = $_SESSION['username'];
            $this->load->library('upload', $config);
            
            if( !$this->upload->do_upload('userfile')){
        
                $data = array('error' => $this->upload->display_errors());
                $data['title'] = $_SESSION['username']." Profile";
                $this->load->view('templates/header', $data);
                $data['username'] = $_SESSION['username'];
                $data['isUser'] = false;
                if ($this->session->userdata('logged_in') && $_SESSION['username'] == $username){
                    $data['isUser'] = true;
                }
                $data['email'] = $this->user_model->getEmail($_SESSION['username']);
                $data['image'] = $this->user_model->getImage($_SESSION['username']);
                
                $this->load->view('pages/profile', $data);
                $this->load->view('templates/footer');
            }else{
                $this->user_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$username);
                redirect('profile/profile_view/'.$_SESSION['username']);
            }
               
        }

        public function view_favorites(){
            $data['title'] = "My Favorites";
            $data['favorites'] = $this->user_model->getFavoriteItems($_SESSION['username']);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/my_favorites', $data);
            $this->load->view('templates/footer');
        }

        public function remove_favorite($itemId = NULL){
            $username = $_SESSION['username'];
            $this->user_model->removeFavorite($itemId, $username);
            redirect('profile/view_favorites');
        }
    }
?>