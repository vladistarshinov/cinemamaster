<?php 

	$this->session->set_flashdata('general__error', $auth_message); 

redirect('', 'location');
?>