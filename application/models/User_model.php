<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_user($username){
        $this->db->where('username',$username);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function login($username, $password){
        $this->db->where('username', $username);
        $result = $this->db->get('user');
        $hash = $result->row()->password;
        if (password_verify($password, $hash)){
            return true;
        }

        return false;
    }

    public function isFavorite($username, $Id){
        if (!$username){
            return false;
        }
        $this->db->where('username', $username);
        $this->db->where('Id',$Id);
        if( $this->db->get('user-item')->row() ){
            return true;
        }
        return false;
    }

    public function register(){
        $this->load->helper('url');

        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        );

        return $this->db->insert('user', $data);
    }

    public function getEmail($username){
        $query = $this->db->where('username', $username)->get('user');
        return $query->row()->email;
    }

    public function update_user($username, $email){
        $data = array(
            'email' => $email,
        );
        $this->db->where('username', $username);
        $this->db->update('user', $data);
        return true;
    }

    public function upload($filename, $path, $username){
         $data = array(
            'filename' => $filename,
            'path' => $path,
        );
        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }

    public function getImage($username){
        $query = $this->db->where('username', $username)->get('user');
        return $query->row()->filename;
    }

    public function getFavoriteItems($username){
        $query = $this->db->query("SELECT * FROM `item` WHERE `Id` in (SELECT `Id` FROM `user-item` WHERE `username`=`username`)");
        return $query->result_array();

    }

    public function removeFavorite($id, $username){
        $this->db->where('username', $username);
        $this->db->where('id', $id);
        $this->db->delete('user-item');
        return true;
    }

    public function remember($username, $token){
        $data = array(
            'token' => $token,
        );

        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }

    public function remember_me($token){
        $query = $this->db->where('token', $token)->get('user');
        
        return $query->row()->username;
    }
}

?>