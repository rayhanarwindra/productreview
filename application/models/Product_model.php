<?php
class Product_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function newProduct($item_name, $category){
        $data = array(
            'name' => $item_name,
            'category' => $category,
        );
        $this->db->insert('item', $data);

        return true;
    }

    public function getRecomendation(){
        $this->db->limit(4);
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function findItems($search){
        if($search == null){
            return array();
        }

        $result = $this->db->like('name', $search)
                -> or_like('category', $search)
                ->get('item')->result_array();
        return $result;
    }

    public function getItems(){
        $result = $this->db->get('item')->result();
        return $result;
    }

    public function fetchItems($search){
        $result = $this->db->like('name', $search)
        ->get('item')->result();
        return $result;
    }

    public function findByName($search){
        if($search == null){
            return "";
        }

        $result = $this->db->like('name', $search)
                -> or_like('category', $search)
                ->get('item')->row();
        return $result;
    }

    public function addFavorites($username, $itemId){
        $data = array(
            'username' => $username,
            'id' => $itemId,
        );
        $this->db->insert('user-item', $data);

        return true;
    }

    public function findById($search){
        if($search == null){
            return "";
        }

        $query = $this->db->where('Id', $search)->get('item');
        return $query->row();
    }
    

}


?>