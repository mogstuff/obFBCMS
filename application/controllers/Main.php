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
$this->output->enable_profiler(FALSE);

      if(!$this->ion_auth->logged_in())
        {
        redirect('auth/login');
        }
        else
        {
       
        $data = array( 'title' => 'My Title' );

$crud = new grocery_CRUD();
$crud->set_theme('flexigrid');
$crud->set_table('guests');
$this->grocery_crud->columns('id','FirstName','LastName','TelNo', 'FirstVisitdate');
$this->grocery_crud->display_as('id','TOB No');
$this->grocery_crud->display_as('FirstVisitdate','First Visit')       ;

$this->grocery_crud->display_as('FirstName','First Name');
$this->grocery_crud->display_as('LastName','Last Name');
$this->grocery_crud->display_as('TelNo','Telephone');
$this->grocery_crud->display_as('FirstVisitdate','First Visit');
$this->grocery_crud->display_as('RegDisabled','Reg Disabled');
$this->grocery_crud->display_as('CanReadAndWrite', 'Can Read And Write');
$this->grocery_crud->display_as('CurrentAddress', 'Current Address');
$this->grocery_crud->display_as('NFA', 'No Fixed Abode');

$this->grocery_crud->display_as('PlaceOfBirth','Place of Birth');
$this->grocery_crud->display_as('NoOfChildren','No of Dependant Children');
$this->grocery_crud->display_as('NatInsuranceNo','NI No.');
$this->grocery_crud->display_as('HelpFromOthers', 'Help From Others');
$this->grocery_crud->display_as('WhereHeardOfTOB', 'Where Heard Of TOB');
$this->grocery_crud->display_as('ExOffender','Ex Offender');
$this->grocery_crud->display_as('Interviewee', 'Interviewee');
$this->grocery_crud->display_as('customerID','Guest ID');
$this->grocery_crud->display_as('DoctorName', 'Doctor Name and Address');

$this->grocery_crud->field_type('gender','dropdown',array('Male'=>'Male', 'Female'=>'Female' , 'Other'=>'Other' ), $default_value = 'Male');
$this>set_select('gender', 'Male');


$this->grocery_crud->field_type('NFA','dropdown',array('NO'=>'NO', 'YES'=>'YES' ), $default_value = 'NO');
$this>set_select('NFA', 'NO');
            
            
$this->grocery_crud->field_type('RegDisabled','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
$this->grocery_crud->field_type('Ethnicity','dropdown',array('White'=>'White', 'African'=>'African' , 'Carribean'=>'Carribean',
                                        'Asian' => 'Asian', 'Arabic' => 'Arabic', 'Chinese' => 'Chinese', 'Other' => 'Other'), $default_value = 'White');
          
$this->grocery_crud->display_as('RegDisabled','Reg Disabled');
$this->grocery_crud->field_type('ExOffender','dropdown',array('No'=>'No', 'Yes'=>'Yes'  ), $default_value = 'No');
$this->grocery_crud->field_type('CanReadAndWrite','dropdown',array('Yes'=>'Yes', 'No'=>'No'  ), $default_value = 'Yes');
            
$this->grocery_crud->field_type('WhereHeardOfTOB','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );
$this->grocery_crud->field_type('DOB','date');
        
    // validation rules
    $this->grocery_crud->set_rules('Age','Age','integer|less_than_equal_to[100]');
    $this->grocery_crud->set_rules('NoOfChildren','No of dependant children', 'integer|less_than_equal_to[100]');        
    $crud->set_subject('Guests');    
   // $crud->set_relation('CustomerID','tbl_customer','ID');
   //  $crud->set_relation('CustomerID','tbl_customer','ID');   
    $output = $this->grocery_crud->render();
    $data['title'] = 'Guests';
    $this->load->view('_blocks/header', $data);        
    $this->_example_output($output);      
}
        
}
    
    
	public function visits()
	{

$this->output->enable_profiler(FALSE);

	if(!$this->ion_auth->logged_in())
	{
	redirect('auth/login');
	}
	else
	{

	$crud = new grocery_CRUD();
	$currentUserId = $this->ion_auth->user()->row()->id;

	$crud->set_theme('flexigrid');

	$crud->set_table('guest_visits');
	$crud->display_as('guest_id','Guest');
	$this->grocery_crud->set_subject('Visits');
	$crud->set_relation('guest_id','guests','{FirstName} {LastName}');
	$crud->set_relation('user_id','users','{last_name} {first_name}');

	$crud->display_as('user_id','Volunteer');
	$this->grocery_crud->display_as('OriginalNeed', 'Original Need');
	$this->grocery_crud->display_as('UnderlyingNeed', 'Underlying Need');  
	$this->grocery_crud->display_as('AdditionalNeed', 'Additional Need');

	
	$this->grocery_crud->display_as('SeenBy', 'Seen By');

	
	$this->grocery_crud->field_type('OriginalNeed','dropdown',
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


	$this->grocery_crud->field_type('UnderlyingNeed','dropdown',
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



	$this->grocery_crud->field_type('AdditionalNeed','dropdown',
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

	$this->grocery_crud->display_as('RefIn','Ref In');
	$this->grocery_crud->field_type('RefIn','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );

	$this->grocery_crud->display_as('RefOut','Ref Out');			
	$this->grocery_crud->field_type('RefOut','dropdown',array('CAB'=>'CAB', 'CAP'=>'CAP' , 'CAUNSS'=>'CAUNSS', 'DWP' => 'DWP', 'LCC' => 'LCC', 'LDHAS' => 'LDHAS',  'DWP' => 'DWP', 'Social Services' => 'Social Services', 'Other' => 'Other'  ) );

	$this->grocery_crud->display_as('NumberAdultProvidedFor' , 'No of Adults Provided For');
	$this->grocery_crud->display_as('NumberChildrenProvidedFor' , 'No of Children Provided For');
	$this->grocery_crud->display_as('CommentsSummary','Comment Summary');

	$this->grocery_crud->change_field_type('CommentsSummary', 'text');
	$this->grocery_crud->change_field_type('Outcome', 'text');

	// validation rules
	$this->grocery_crud->set_rules('CommentsSummary','Comments Summary','max_length[1500]');
	$this->grocery_crud->set_rules('NumberAdultProvidedFor','No of Adults Provided For','integer');
	$this->grocery_crud->set_rules('NumberChildrenProvidedFor','No of Children Provided For','integer');

	//$crud->columns('id','guest_id','user_id','SeenBy','date');
	$crud->columns('guest_id','user_id','SeenBy','date');
	
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
    
  
    public function staff()
    {
	  	  
      if(!$this->ion_auth->logged_in())
        {
        redirect('auth/login');
        }
        else
        {        
        
$crud = new grocery_CRUD();
$currentUserId = $this->ion_auth->user()->row()->id;
$crud->set_table('staff');
$crud->columns('id');
$crud->set_theme('flexigrid');
$crud->set_subject('Staff');
$crud->columns('id','first_name', 'last_name', 'home_phone', 'mobile_phone', 'email_address');
   
$output = $crud->render();     
$data['title'] = 'Staff';
$this->load->view('_blocks/header', $data);            
  $this->_example_output($output);
        }
    
	}
    
    
    
     
public function contacts()
{
		if(!$this->ion_auth->logged_in())
	{
	redirect('auth/login');
	}
	else
	{

	$crud = new grocery_CRUD();
	$currentUserId = $this->ion_auth->user()->row()->id;

	$crud->set_theme('flexigrid');

	$crud->set_table('contacts');
	//$crud->display_as('guest_id','Guest');
	$this->grocery_crud->set_subject('Contacts - OLD SYSTEM');
	
	//$this->grocery_crud->display_as('SeenBy', 'Seen By');

	//$crud->columns('id','guest_id','user_id','SeenBy','date');
	//$crud->columns('id','FirstName','LastName');
	$crud->unset_delete();
	
	$output = $crud->render();
	$data['title'] = 'Contacts (Guests?) - OLD System';
	$this->load->view('_blocks/header', $data);            
	$this->_example_output($output);      

	}

   
}
    
    
public function contact_details()
{
	if(!$this->ion_auth->logged_in())
	{
	redirect('auth/login');
	}
	else
	{

	$crud = new grocery_CRUD();
	$currentUserId = $this->ion_auth->user()->row()->id;

	$crud->set_theme('flexigrid');

	$crud->set_table('contact_details');
	//$crud->display_as('guest_id','Guest');
	$this->grocery_crud->set_subject('Contact Details - OLD SYSTEM');
	
	$crud->display_as('SeenBy', 'Seen By');
	$crud->display_as('guest_id', 'Guest');
	$crud->display_as('DateOfVisit', 'Date Of Visit');
	//$crud->columns('id','guest_id','user_id','SeenBy','date');
	
	$crud->set_relation('guest_id','contacts','{FirstName} {LastName}');	
	
	$crud->columns('id','guest_id', 'DateOfVisit','SeenBy');
	
	$crud->unset_delete();
	$crud->unset_edit();
	
	
	$output = $crud->render();
	$data['title'] = 'Contact/Guest Details - OLD SYSTEM';
	$this->load->view('_blocks/header', $data);            
	$this->_example_output($output);      

	}

   
}

    
    
    function _example_output($output = null)
 
    {
        $this->load->view('our_template.php',$output);    
    }
}
 
/* End of file main.php */
/* Location: ./application/controllers/main.php */
 
