<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Movies extends MY_Controller {

    public function __constract() {
        parent::__constract();
    }

    public function view($slug = NULL) {

        $movie_slug = $this->films_model->getFilms($slug, false, false);

        if(empty($movie_slug)) {
            show_404();
        }

        $this->data['title'] = $movie_slug['name'];
        $this->data['year'] = $movie_slug['year'];
        $this->data['rating'] = $movie_slug['rating'];
        $this->data['descriptions_movie'] = $movie_slug['descriptions'];
        $this->data['player_code'] = $movie_slug['player_code'];
        $this->data['director'] = $movie_slug['director'];

        $this->load->view('templates/header', $this->data);
		$this->load->view('movies/view', $this->data);
		$this->load->view('templates/footer');

        
    }

}