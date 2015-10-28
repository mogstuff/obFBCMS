<?php

class Customer_model extends CI_Model {

        public $firstname;
        public $lastname;
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

       
       public function getCustomers()
       {
                $query = $this->db->get('tbl_customer');
        return $query->result_array();
               
       }

    
    
    
}


?>