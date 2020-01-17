<?php 

	if(!function_exists('show_active_menu')) {

		function show_active_menu($slug, $category) {

			$ci=& get_instance();

			$result = "";
		
			if($ci->uri->segment(1,0) === $slug) {
				$result = 'class="active"';
			}

			if($ci->uri->segment(3,0) === $slug && $ci->uri->segment(1,0) === 'movies' && $ci->uri->segment(2,0) === 'type') {
				$result = 'class="active"';
			}

			if($slug === 'films' && $category === '1' && $ci->uri->segment(1,0) === 'movies' && $ci->uri->segment(2,0) === 'view') {
				$result = 'class="active"';
			}

			if($slug === 'serials' && $category === '2' && $ci->uri->segment(1,0) === 'movies' && $ci->uri->segment(2,0) === 'view') {
				$result = 'class="active"';
			}

			return $result;
		}
	}

	if(!function_exists('getUserNameByID')) {

		function getUserNameByID($user_id) {

			$ci=& get_instance();

			$ci->load->model('dx_auth/users');

			$query = $ci->users->get_user_by_id($user_id);
			$result = $query->row();
			return $result;

		}
	}