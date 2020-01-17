<?php 

	class Comments_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function getComments($movie_id, $limit) {
			$query=$this->db
				->where('movie_id', $movie_id)
				->limit($limit)
				->get('comments');

			return $query->result_array();
		}
	}
 ?>