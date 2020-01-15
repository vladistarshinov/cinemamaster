<?php 

class Films_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function getFilmsByRating($limit) {
            $query = $this->db
                ->order_by('rating', 'desc')
                ->where('category_id', 1)
                ->where('rating>', 0)
                ->limit($limit)
                ->get('movie');

            return $query->result_array();

	}




}