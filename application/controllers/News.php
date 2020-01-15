<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index() {
		$data['title'] = "Все новости";
		$data['news'] = $this->news_model->getNews();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL) {
		$data['news_item'] = $this->news_model->getNews($slug);

		if(empty($data['news_item'])) {
			show_404();
		}

		$data['title'] = $data['news_item']['title'];
		$data['content'] = $data['news_item']['text'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}

	public function create() {
		$data['title'] = "Добавить новость";

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {

			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if($this->news_model->setNews($slug, $title, $text)) {
				$this->load->view('templates/header', $data);
				$this->load->view('news/success', $data);
				$this->load->view('templates/footer');
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('news/create', $data);
			$this->load->view('templates/footer');
		}

	}


	public function edit($slug = NULL) {
		$data['title'] = "Редактировать новость";
		$data['news_item'] = $this->news_model->getNews($slug);

		/* TODO: Исправить ошибку 
        
            A PHP Error was encountered
            Severity: Notice
            Message: Trying to access array offset on value of type null
            Filename: controllers/News.php
            Line Number: 85, 86, 87

            Backtrace:
            File: C:\xampp\htdocs\cinemamaster\application\controllers\News.php
            Line: 85, 86, 87
            Function: _error_handler

            File: C:\xampp\htdocs\cinemamaster\index.php
            Line: 315
            Function: require_once  */

/*		if(empty($data['news_item'])) {
			show_404();
		}*/

		$data['title_news'] = $data['news_item']['title'];
		$data['content_news'] = $data['news_item']['text'];
		$data['slug_news'] = $data['news_item']['slug'];

		if($this->input->post('slug') && $this->input->post('title') && $this->input->post('text')) {
			$slug = $this->input->post('slug');
			$title = $this->input->post('title');
			$text = $this->input->post('text');

			if($this->news_model->updateNews($slug, $title, $text)) {
				echo "Новость успешно отредактирована";
			}
		}

		$this->load->view('templates/header', $data);
		$this->load->view('news/edit', $data);
		$this->load->view('templates/footer');

	}

	public function delete($slug = NULL) {
		$data['news'] = $this->news_model->getNews($slug);

		if(empty($data['news'])) {
			show_404();
		}

		$data['title'] = "Удалить новость";
		$data['result'] = "Ошибка удаления ".$data['news']['title'];

		if($this->news_model->deleteNews($slug)) {
			$data['result'] = $data['news']['title']." успешно удалена";
		}

		$this->load->view('templates/header', $data);
		$this->load->view('news/delete', $data);
		$this->load->view('templates/footer');

	}


}