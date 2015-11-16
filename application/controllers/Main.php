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
        ->display_as('LastName','Last Name')
        ->display_as('TelNo','Telephone')
          ->display_as('FirstVisitdate','First Visit')
          ->display_as('RegDisabled','Reg Disabled')
          ->display_as('CanReadAndWrite', 'Can Read And Write')
           ->display_as('CurrentAddressOrNoFixedAbode', 'Address')
          ->display_as('PlaceOfBirth','Place of Birth')
         ->display_as('NoOfChildren','No of Children')
         ->display_as('NatInsuranceNo','NI No.')
          ->display_as('ExOffender','Ex Offender');
         $crud->display_as('customerID','Guest ID');
         $crud->display_as('DoctorName', 'Doctor Name and Address');
         
           $this->grocery_crud->field_type('gender','dropdown',array('Male'=>'Male', 'Female'=>'Female' , 'Other'=>'Other' ), $default_value = 'Male');
          $this->grocery_crud->field_type('RegDisabled','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
          /*
          Ethnicity - drop down - White, African, Carribean, Asian, Arabic, Chinese, Other - default White.
          */
           $this->grocery_crud->field_type('Ethnicity','dropdown',array('White'=>'White', 'African'=>'African' , 'Carribean'=>'Carribean',
                                                'Asian' => 'Asian', 'Arabic' => 'Arabic', 'Chinese' => 'Chinese', 'Other' => 'Other'), $default_value = 'White');
          
           $crud->display_as('RegDisabled','Reg Disabled');
           $this->grocery_crud->field_type('ExOffender','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
           $this->grocery_crud->field_type('CanReadAndWrite','dropdown',array('Yes'=>'Yes', 'No'=>'No'  ), $default_value = 'Yes');
         
         $crud->set_subject('Guests');    
         
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

$currentUserId = $this->ion_auth->user()->row()->id;


        $crud->set_theme('datatables');
        $crud->set_table('guest_visits');
        $crud->display_as('guest_id','Guest');
        $crud->set_subject('Visits');
        $crud->set_relation('guest_id','guests','{FirstName} {LastName}');
            $crud->set_relation('user_id','users','{username} - {last_name} {first_name}');
              $crud->display_as('user_id','Volunteer');
              $crud->display_as('OriginalNeed', 'Original Need');
            $crud->display_as('UnderlyingNeed', 'Underlying Need');  
            $crud->display_as('AdditionalNeed', 'Additional Need');
            $crud->display_as('NumberAdultProvidedFor' , 'No of Adults Provided For');
             $crud->display_as('NumberChildrenProvidedFor' , 'No of Children Provided For');
               $crud->display_as('CommentsSummary','Comment Summary');
               
      $crud->change_field_type('CommentsSummary', 'text');
      
     
        $output = $crud->render();
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
 