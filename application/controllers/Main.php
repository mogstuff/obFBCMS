<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
                die();
    }
 
    public function guests()
    {
      
      if(!$this->ion_auth->logged_in())
        {
        redirect('auth/login');
        }
        else
        {
       
      $this->grocery_crud->set_table('tbl_customer');
        $output = $this->grocery_crud->render();
     
            $data['title'] = 'Guests';
        $this->load->view('templates/header', $data);
          $this->_example_output($output);           
        $this->load->view('templates/footer', $data);
        
     echo "test guest list";   
            
        }
        
    }
    
    
     public function visits()
    {
      
      if(!$this->ion_auth->logged_in())
        {
        redirect('auth/login');
        }
        else
        {
        
        
         $crud = new grocery_CRUD();
 
        $crud->set_theme('datatables');
        $this->grocery_crud->set_table('tbl_visit');
         $crud->display_as('customerID','Guest ID');
         $crud->set_subject('Guest Visits');
         
          $crud->set_relation('customerID','tbl_customer','ID');
        
        $output = $this->grocery_crud->render();
        
            $data['title'] = 'Visits';
        $this->load->view('templates/header', $data);
         $this->_example_output($output);      
        $this->load->view('templates/footer', $data);
 
          
     
     echo "test visits list";   
            
        }
        
    }
    
    
 
 
 
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */
 