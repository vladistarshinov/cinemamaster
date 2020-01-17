<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class Main extends MY_Controller {

	public function __constract() {
		parent::__constract();
	}

	public function index() {
		$this->data['title'] = "Главная страница";

		$this->load->model('Films_model');
		$this->data['movie'] = $this->Films_model->getFilms(FALSE, 8, 1);
		$this->data['serials'] = $this->Films_model->getFilms(FALSE, 8, 2);
		
		$this->load->model('Posts_model');
		$this->data['posts'] = $this->Posts_model->getPosts(FALSE);

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/index', $this->data);
		$this->load->view('templates/footer');

	}

	public function rating() {

		$this->data['title'] = "Рейтинг фильмов";

		$this->load->library('pagination');                                     						//pagination
		$offset = (int) $this->uri->segment(2);															//pagination
		$row_count = 5;																					//pagination
		$count = count($this->Films_model->getMoviesOnPageByRating(0, 0));								//pagination
		$p_config['base_url'] = '/rating/';																//pagination
		$this->data['movie'] = $this->Films_model->getMoviesOnPageByRating($row_count, $offset);		//pagination

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

		$p_config['first_link'] = 'В начало';
        $p_config['last_link'] = 'В конец';

		//init pagination
		$this->pagination->initialize($p_config);
		$this->data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/rating', $this->data);
		$this->load->view('templates/footer');

	}

	
}