<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "Главная страница";

        $this->load->view('templates/header', $data);
		$this->load->view('main/index', $data);
		$this->load->view('templates/footer');
    }

}