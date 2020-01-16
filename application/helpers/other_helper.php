<?php 

    if(!function_exists('show_active_menu')) {
       
        function show_active_menu($slug) {
           
            $ci=& get_instance();

            $result = "";

            // Главная страница
            if($ci->uri->segment(1, 0) === $slug) {
                $result = "class='active'";
            }

            if($ci->uri->segment(3, 0) === $slug) {
                $result = "class='active'";
            }

            /* if($slug === 'films' && $ci->uri->segment(1, 0) === 'movies' && $ci->uri->segment(2, 0) === 'view') {
                $result = "class='active'";
            } */
            
            return $result;
        }
    }