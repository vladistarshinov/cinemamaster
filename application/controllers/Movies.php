<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class Movies extends MY_Controller {

	public function __constract() {
		parent::__constract();
		$this->load->model('Films_model');
	}

	public function index() {

		if(!$this->dx_auth->is_admin()) {
			show_404();
		}

		$this->data['title'] = 'Все фильмы/сериалы';
		$this->data['movies'] = $this->Films_model->getMovies();
		$this->data['serials'] = $this->Films_model->getSerials();

		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/index', $this->data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL) {
		$movie_slug = $this->Films_model->getFilms($slug, false, false);

		if (empty($movie_slug)) {
			show_404();
		}

		$this->data['id'] = $movie_slug['id'];
		$this->data['slug'] = $movie_slug['slug'];
		$this->data['title'] = $movie_slug['name'];
		$this->data['player_code'] = $movie_slug['player_code'];
		$this->data['year'] = $movie_slug['year'];
		$this->data['rating'] = $movie_slug['rating'];
		$this->data['descriptions_movie'] = $movie_slug['descriptions'];
		$this->data['director'] = $movie_slug['director'];
		$this->data['category'] = $movie_slug['category_id'];

		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/view', $this->data);
		$this->load->view('templates/footer');

	}

	public function type($slug = NULL) {

		$this->data['movie_data'] = NULL;

		$this->load->library('pagination');                                     						//pagination
		$offset = (int) $this->uri->segment(4);															//pagination
		$row_count = 3;																					//pagination
		$count = 0;																						//pagination

		if ($slug == 'films') {
			$count = count($this->Films_model->getMoviesOnPage(0, 0, 1));								//pagination
			$p_config['base_url'] = '/movies/type/films/';												//pagination
			$this->data['title'] = 'Фильмы';
			$this->data['movie_data'] = $this->Films_model->getMoviesOnPage($row_count, $offset, 1);	//pagination
		}

		if ($slug == 'serials') {
			$count = count($this->Films_model->getMoviesOnPage(0, 0, 2));								//pagination
			$p_config['base_url'] = '/movies/type/serials/';											//pagination
			$this->data['title'] = 'Сериалы';
			$this->data['movie_data'] = $this->Films_model->getMoviesOnPage($row_count, $offset, 2);	//pagination
		}

		if ($this->data['movie_data'] == NULL) {
			show_404();
		}
		//pagination config
		$p_config['total_rows'] = $count;
		$p_config['per_page'] = $row_count;

		//pagination bootstrap
		$p_config['full_tag_open'] = "<ul class='pagination'>";
		$p_config['full_tag_close'] ="</ul>";
		$p_config['num_tag_open'] = '<li>';
		$p_config['num_tag_close'] = '</li>';
		$p_config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$p_config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$p_config['next_tag_open'] = "<li>";
		$p_config['next_tagl_close'] = "</li>";
		$p_config['prev_tag_open'] = "<li>";
		$p_config['prev_tagl_close'] = "</li>";
		$p_config['first_tag_open'] = "<li>";
		$p_config['first_tagl_close'] = "</li>";
		$p_config['last_tag_open'] = "<li>";
		$p_config['last_tagl_close'] = "</li>";

		//init pagination
		$this->pagination->initialize($p_config);
		$this->data['pagination'] = $this->pagination->create_links();


		$this->load->view('templates/header', $this->data);
		$this->load->view('movies/type', $this->data);
		$this->load->view('templates/footer');
	}

	
}