<?php

class Guest_model extends CI_Model {

        public $firstname;
        public $lastname;
        

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

       
       

   public function getGuests()
       {
                $query = $this->db->get('guests');
        return $query->result_array();
               
       }

    
    
    
}


?>