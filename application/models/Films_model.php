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

	public function setMovies($slug, $name, $descriptions, $year, $rating, $poster, $player_code, $director, $add_date, $category_id) {
		$data = array(
			'slug' => $slug,
			'name' => $name,
			'descriptions' => $descriptions,
			'year' => $year,
			'rating' => $rating,
			'poster' => $poster,
			'player_code' => $player_code,
			'director' => $director,
			'add_date' => $add_date,
			'category_id' => $category_id
			);
		return $this->db->insert('movie', $data);
	}

	public function updateMovies($id, $slug, $name, $descriptions, $year, $rating, $poster, $player_code, $director, $add_date, $category_id) {
		$data = array(
			'id' => $id,
			'slug' => $slug,
			'name' => $name,
			'descriptions' => $descriptions,
			'year' => $year,
			'rating' => $rating,
			'poster' => $poster,
			'player_code' => $player_code,
			'director' => $director,
			'add_date' => $add_date,
			'category_id' => $category_id
			);
		return $this->db->update('movie', $data, array('id' => $id));
	}

	public function deleteMovies($slug) {
		return $this->db->delete('movie', array('slug' => $slug));
	}

	public function setComments($user_id, $movie_id, $comment_text) {
		$data = array(
			'user_id' => $user_id,
			'movie_id' => $movie_id,
			'comment_text' => $comment_text
			);
		return $this->db->insert('comments', $data);
	}

}