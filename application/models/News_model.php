<?php

class News_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function getNews($slug = FALSE) {
		if ($slug === FALSE) {
			$query = $this->db->get('news');
			return $query->result_array();
		}
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function setNews($slug, $title, $text) {
		$data = array(
			'title' => $title,
			'slug' => $slug,
			'text' => $text
			);
		return $this->db->insert('news', $data);
	}

	public function updateNews($id, $slug, $title, $text) {
		$data = array(
			'id' => $id,
			'title' => $title,
			'slug' => $slug,
			'text' => $text
			);
		return $this->db->update('news', $data, array('id' => $id));
	}

	public function deleteNews($slug) {
		return $this->db->delete('news', array('slug' => $slug));
	}
	
}