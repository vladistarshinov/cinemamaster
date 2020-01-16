<?php  

class Films_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getFilms($slug = FALSE, $limit, $type = 1) {

		if ($slug === FALSE) {
			$query = $this->db
				->where('category_id', $type)
				->order_by('add_date', 'desc')
				->limit($limit)
				->get('movie');
			return $query->result_array();
		}
		$query = $this->db->get_where('movie', array('slug' => $slug));
		return $query->row_array();
	}

	public function getMovies($slug = FALSE) {

		if ($slug === FALSE) {
			$query = $this->db
				->where('category_id', 1)
				->order_by('category_id')
				->order_by('add_date', 'desc')
				->get('movie');
			return $query->result_array();
		}
		$query = $this->db->get_where('movie', array('slug' => $slug));
		return $query->row_array();
	}

	public function getSerials($slug = FALSE) {

		if ($slug === FALSE) {
			$query = $this->db
				->where('category_id', 2)
				->order_by('category_id')
				->order_by('add_date', 'desc')
				->get('movie');
			return $query->result_array();
		}
		$query = $this->db->get_where('movie', array('slug' => $slug));
		return $query->row_array();
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

	public function getMoviesOnPage($row_count, $offset, $type = 1) {
		$query = $this->db
			->where('category_id', $type)
			->order_by('add_date', 'desc')
			->get('movie', $row_count, $offset);
		return $query->result_array();
	}

	public function getMoviesOnPageByRating($row_count, $offset) {
		$query = $this->db
			->where('category_id', 1)
			->where('rating>', 0)
			->order_by('rating', 'desc')
			->get('movie', $row_count, $offset);
		return $query->result_array();
	}

}