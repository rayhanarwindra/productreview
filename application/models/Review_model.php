<?php
class Review_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function makeReview($username, $itemId, $comment, $rating){
        $data = array(
            'username' => $username,
            'itemId' => $itemId,
            'comment' => $comment,
            'rating' => $rating,
        );
        $this->db->insert('review', $data);

        return true;
    }
    public function getByItemId($itemId){

    }
}
?>