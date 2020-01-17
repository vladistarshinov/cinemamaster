<?php 

defined('BASEPATH') OR exit('No direc script access allowed');

class Search extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = "Поиск";

		$this->load->model('Search_model');
        $this->data['search_result'] = array();

        if($this->input->get('q_search')) {
            $this->data['search_result'] = $this->Search_model->search($this->input->get('q_search'));
        }

		$this->load->view('templates/header', $this->data);
		$this->load->view('main/search', $this->data);
		$this->load->view('templates/footer');

    }
}