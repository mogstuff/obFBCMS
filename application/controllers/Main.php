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
        
        
         $crud = new grocery_CRUD();
 
        $crud->set_theme('datatables');
        
            $this->grocery_crud->set_table('guests')
            ->columns('TOB_No','FirstName','LastName','TelNo', 'Gender')
        ->display_as('FirstName','First Name')
        ->display_as('LastName','Last Name');
            
         $crud->display_as('customerID','Guest ID');
         $crud->set_subject('Guest Visits');    
         
            //$crud->set_relation_n_n('groups', 'users_groups', 'groups','user_id','group_id','description');
          $crud->set_relation('CustomerID','tbl_customer','ID');
        
        $output = $this->grocery_crud->render();
        
            $data['title'] = 'Guests';
        $this->load->view('templates/header', $data);
         $this->_example_output($output);      
        $this->load->view('templates/footer', $data);
 
       
            
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
        $crud->set_table('guest_visits');
     //   $crud->callback_edit_field('guest_id',array($this,'_call_back_guests'));
    //    $crud->callback_add_field('guest_id',array($this,'_call_back_guests'));
        $crud->display_as('guest_id','Guest');
        $crud->set_subject('Visits');
        $crud->set_relation('guest_id','guests','{FirstName} {LastName}');
            $crud->set_relation('user_id','users','{username} - {last_name} {first_name}');
        $output = $crud->render();
      //  $this->_example_output($output);
        $data['title'] = 'Visits';
        $this->load->view('templates/header', $data);
         $this->_example_output($output);      
        $this->load->view('templates/footer', $data); 
       
            
        }
        
    }
    
    function _call_back_guests()
    {
  $this->load->model('Guest_model'); // your model
$data = $this->Guest_model->getGuests(); //$this->user_model->getYou('offices','officeCode, city', "state = '".$this->session->userdata('state')."'"); // iam using session here
$hasil ='<select name="guest_id">';
foreach($data as $x)
{
$hasil .='<option value="'.$x->id.'">'.$x->FirstName.'</option>';
}
return $hasil.'</select>';
        
    }
    
  
    
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */
 