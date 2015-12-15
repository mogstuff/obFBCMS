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
       
             $data = array( 'title' => 'My Title' );
            
         $crud = new grocery_CRUD();
       $this->grocery_crud->set_theme('flexigrid');
    $this->grocery_crud->set_table('guests')
            ->columns('id','FirstName','LastName','TelNo', 'Gender')
        ->display_as('id','TOB No')
        
        ->display_as('FirstName','First Name')
        ->display_as('LastName','Last Name')
        ->display_as('TelNo','Telephone')
          ->display_as('FirstVisitdate','First Visit')
          ->display_as('RegDisabled','Reg Disabled')
          ->display_as('CanReadAndWrite', 'Can Read And Write')
           ->display_as('CurrentAddress', 'Current Address')
           ->display_as('NFA', 'No Fixed Abode')
        
        ->display_as('PlaceOfBirth','Place of Birth')
         ->display_as('NoOfChildren','No of Dependant Children')
         ->display_as('NatInsuranceNo','NI No.')
                ->display_as('HelpFromOthers', 'Help From Others')
                ->display_as('WhereHeardOfTOB', 'Where Heard Of TOB')
          ->display_as('ExOffender','Ex Offender')
            ->display_as('Interviewee', 'Interviewee');
         $crud->display_as('customerID','Guest ID');
         $this->grocery_crud->display_as('DoctorName', 'Doctor Name and Address');
         
           $this->grocery_crud->field_type('gender','dropdown',array('Male'=>'Male', 'Female'=>'Female' , 'Other'=>'Other' ), $default_value = 'Male');
            $this>set_select('gender', 'Male');
        
            
               $this->grocery_crud->field_type('NFA','dropdown',array('NO'=>'NO', 'YES'=>'YES' ), $default_value = 'NO');
            $this>set_select('NFA', 'NO');
        
            
            
$this->grocery_crud->field_type('RegDisabled','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
 $this->grocery_crud->field_type('Ethnicity','dropdown',array('White'=>'White', 'African'=>'African' , 'Carribean'=>'Carribean',
                                        'Asian' => 'Asian', 'Arabic' => 'Arabic', 'Chinese' => 'Chinese', 'Other' => 'Other'), $default_value = 'White');
          
  $crud->display_as('RegDisabled','Reg Disabled');
   $this->grocery_crud->field_type('ExOffender','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
   $this->grocery_crud->field_type('CanReadAndWrite','dropdown',array('Yes'=>'Yes', 'No'=>'No'  ), $default_value = 'Yes');
            
 $this->grocery_crud->field_type('WhereHeardOfTOB','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );
            
               // validation rules
           // $crud->set_rules('CommentsSummary','Comments Summary','max_length[150]');
            //   $crud->set_rules('NumberAdultProvidedFor','No of Adults Provided For','integer');
              $this->grocery_crud->set_rules('Age','Age','integer|less_than_equal_to[100]');
         
            
            
    $crud->set_subject('Guests');    
    $crud->set_relation('CustomerID','tbl_customer','ID');
    $output = $this->grocery_crud->render();
    $data['title'] = 'Guests';
    $this->load->view('_blocks/header', $data);        
    $this->_example_output($output);      
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

  $this->grocery_crud->set_theme('flexigrid');
     
        $crud->set_table('guest_visits');
        $crud->display_as('guest_id','Guest');
        $crud->set_subject('Visits');
        $crud->set_relation('guest_id','guests','{FirstName} {LastName}');
            $crud->set_relation('user_id','users','{last_name} {first_name}');
              $crud->display_as('user_id','Volunteer');
            
              $crud->display_as('OriginalNeed', 'Original Need');
            $crud->display_as('UnderlyingNeed', 'Underlying Need');  
            $crud->display_as('AdditionalNeed', 'Additional Need');
            
             $crud->field_type('OriginalNeed','dropdown',
                                             array(
                                                 'Addiction'=>'Addiction', 
                                                 'Advocacy'=>'Advocacy' ,
                                                 'Benefit Issues'=>'Benefit Issues', 
                                                 'Debt / Budgeting' => 'Debt / Budgeting', 
                                                 'Fellowship' => 'Fellowship', 
                                                 'Food' => 'Food',  
                                                 'Health (including Mental Health)' => 'Health (including Mental Health)', 
                                                 'Housing / Accommodation' => 'Housing / Accommodation', 
                                                 'NFA' => 'NFA' ,
                                                 'Other' => 'Other',
                                                 'Phone / Computer' => 'Phone / Computer',
                                                 'Sleeping bag' => 'Sleeping bag',
                                                 'Sleeping bag & Tent' => 'Sleeping bag & Tent',
                                                 'Tent' => 'Tent'
                                             ) 
                                        );
            
            
             $crud->field_type('UnderlyingNeed','dropdown',
                                             array(
                                                 'Addiction'=>'Addiction', 
                                                 'Advocacy'=>'Advocacy' ,
                                                 'Benefit Issues'=>'Benefit Issues', 
                                                 'Debt / Budgeting' => 'Debt / Budgeting', 
                                                 'Fellowship' => 'Fellowship', 
                                                 'Food' => 'Food',  
                                                 'Health (including Mental Health)' => 'Health (including Mental Health)', 
                                                 'Housing / Accommodation' => 'Housing / Accommodation', 
                                                 'NFA' => 'NFA' ,
                                                 'Other' => 'Other',
                                                 'Phone / Computer' => 'Phone / Computer',
                                                 'Sleeping bag' => 'Sleeping bag',
                                                 'Sleeping bag & Tent' => 'Sleeping bag & Tent',
                                                 'Tent' => 'Tent'
                                             ) 
                                        );
            
            
            
             $crud->field_type('AdditionalNeed','dropdown',
                                             array(
                                                 'Addiction'=>'Addiction', 
                                                 'Advocacy'=>'Advocacy' ,
                                                 'Benefit Issues'=>'Benefit Issues', 
                                                 'Debt / Budgeting' => 'Debt / Budgeting', 
                                                 'Fellowship' => 'Fellowship', 
                                                 'Food' => 'Food',  
                                                 'Health (including Mental Health)' => 'Health (including Mental Health)', 
                                                 'Housing / Accommodation' => 'Housing / Accommodation', 
                                                 'NFA' => 'NFA' ,
                                                 'Other' => 'Other',
                                                 'Phone / Computer' => 'Phone / Computer',
                                                 'Sleeping bag' => 'Sleeping bag',
                                                 'Sleeping bag & Tent' => 'Sleeping bag & Tent',
                                                 'Tent' => 'Tent'
                                             ) 
                                        );
        
            $crud->display_as('RefIn','Ref In');
            
                        
 $crud->field_type('RefIn','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );

            
        $crud->display_as('RefOut','Ref Out');
        
                        
 $crud->field_type('RefOut','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );

            
            
            
            $crud->display_as('NumberAdultProvidedFor' , 'No of Adults Provided For');
             $crud->display_as('NumberChildrenProvidedFor' , 'No of Children Provided For');
               $crud->display_as('CommentsSummary','Comment Summary');
               
      $crud->change_field_type('CommentsSummary', 'text');
      $crud->change_field_type('Outcome', 'text');

            // validation rules
            $crud->set_rules('CommentsSummary','Comments Summary','max_length[150]');
               $crud->set_rules('NumberAdultProvidedFor','No of Adults Provided For','integer');
              $crud->set_rules('NumberChildrenProvidedFor','No of Children Provided For','integer');
            
            
     
        $output = $crud->render();
        $data['title'] = 'Visits';
    $this->load->view('_blocks/header', $data);            
            $this->_example_output($output);      
            
        }
        
    }
    
    function _call_back_guests()
    {
$this->load->model('Guest_model'); // your model
$data = $this->Guest_model->getGuests(); 
        //$this->user_model->getYou('offices','officeCode, city', "state = '".$this->session->userdata('state')."'");
        // iam using session here
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
 