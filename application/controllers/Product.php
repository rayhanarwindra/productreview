<?php
class Product extends CI_Controller{   
    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('product_model');
        $this->load->model('review_model');
        $this->load->model('user_model');
    }

    public function write_review($itemId = null){
        if($this->session->userdata('logged_in')){
            $data['title'] = 'Review';
            $data['item'] = "";
            $data['default'] = "";
            if ($itemId){
                $data['item'] = $this->product_model->findById($itemId)->name;
                $data['default'] = "readonly";
            }
            $this->load->view('templates/header', $data);
            $this->load->view('pages/write_review', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('login/login_view');
        }
    }

    public function add_product(){
        $item_name = $this->input->post('item-name');
        $category = $this->input->post('category');
        print($category);
        if ($this->product_model->newProduct($item_name, $category)){
            redirect('product/write_review');
        }
    }

    public function search(){
        $search = $this->input->get('search-item');
        $data['products'] = $this->product_model->findItems($search);
        $data['title'] = 'Search results for '.$search;
        $data['count'] = count($data['products']);
        $data['query'] = $search;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/search', $data);
        $this->load->view('templates/footer');
    }

    public function fetch_products(){

        $query = '';

        if ($this->input->get('query')){
            $query = $this->input->get('query');
        }
        $data = $this->product_model->fetchItems($query);

        if ($data != null){
            echo json_encode($data);
        }else{
            echo "";
        }
    }

    public function detail_view($item){
        $item = urldecode($item);
        $data['item'] = get_object_vars($this->product_model->findByName($item));
        $data['title'] = 'View '.$item;
        $data['reviews'] = $this->review_model->getReviews($data['item']['Id']);
        $data['isFavorite']  = false;
        if ($this->session->userdata('logged_in')){
            $data['isFavorite'] = $this->user_model->isFavorite($_SESSION['username'], $data['item']['Id']);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pages/item_detail', $data);
        $this->load->view('templates/footer');
    }

    public function add_favorite($item){
        if (!$this->session->userdata('logged_in')){
            redirect('login/login_view');
        }
        $this->product_model->addFavorites($_SESSION['username'], $item);
        $itemObj = $this->product_model->findById($item);
        $itemName = $itemObj->name;
        redirect('product/detail_view/'.$itemName);
    }

    public function add_review(){
        $username = $_SESSION['username'];
        $itemName = $this->input->post('item-name');
        $itemId = $this->product_model->findByName($itemName)->Id;
        $review = $this->input->post('comment');
        $rating = $this->input->post('rating');
        $this->review_model->makeReview($username, $itemId, $review, $rating);
        redirect('product/detail_view/'.$itemName);
    }
}
?>