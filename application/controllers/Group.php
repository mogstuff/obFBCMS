<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!$this->ion_auth->logged_in())
		{
		redirect('auth/login');
		}
		else
		{
          $data['title'] = 'Groups';
    //    $this->load->view('_blocks/header', $data);
  //  $this->data['current_user'] = $this->ion_auth->user()->row();
    
     $this->data['page_title'] = 'Groups';
  $this->data['groups'] = $this->ion_auth->groups()->result();
  
    
    print_r( $this->data);
        $this->load->view('list_groups', $data);    
    //    $this->load->view('_blocks/footer', $data);
            
		}
	}
}
