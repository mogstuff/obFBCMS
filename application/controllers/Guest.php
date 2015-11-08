<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	
	 function __construct() {
        parent::__construct();

        $this->load->model('customer_model');
    }
	 
	 
	public function index()
	{
		if(!$this->ion_auth->logged_in())
		{
		redirect('auth/login');
		}
		else
		{
        //  $data['title'] = 'Clients List';
            
        //    $this->load->model('customer');

            //    $data['query'] = $this->customer->get_last_ten_entries();

              //  $this->load->view('blog', $data);
            $customers = $this->customer_model->getCustomers();
            
           // print_r($customers);
            
            $data = array(
    'title' => 'My Title',
    'heading' => 'My Heading',
    'message' => 'My Message',
    'customers' => $customers
);
            
        $this->load->view('templates/header', $data);
        $this->load->view('clients_list',$data);    
        $this->load->view('templates/footer');
            
		}
	}
}
