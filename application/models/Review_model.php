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
    public function getReviews($itemId){
        $query = $this->db->where('itemId', $itemId)->get('review');
        return $query->result_array();
    }
}
?>