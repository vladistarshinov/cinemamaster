<?php

class Search_model extends CI_Model {

    public function search($q) { 
            $array_search = array(
                'name' => $q,
                'descriptions' => $q,
            );

            $query = $this->db
			->or_like($array_search) 
			->limit(100)
            ->get('movie');
            
            // дебаг запросов 
            // в SQL выглядит так: SELECT * FROM `movie` WHERE name LIKE '%лазур%' ESCAPE '!' OR descriptions LIKE '%лазур%' ESCAPE '!' LIMIT 100
            // echo $this->db->last_query();

            return $query->result_array();

    } 
}