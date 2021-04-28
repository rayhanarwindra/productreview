<?php

class Pages extends CI_Controller {
    public function view($page = 'home'){
        $this->load->model('product_model');
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);
        $data['products'] = $this->product_model->getRecomendation();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
?>