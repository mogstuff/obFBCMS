<?php

class Customer_model extends CI_Model {

        public $firstname;
        public $lastname;
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }

    
    
    
}


?>