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
        // current_user
        $data['title'] = 'Groups';
        $data['groups'] = $this->ion_auth->groups()->result();
        $this->load->view('list_groups', $data);    
            
		}
	}
    
    
    
public function create()
{
  $data['page_title'] = 'Create group';
  $this->load->library('form_validation');
  $this->form_validation->set_rules('group_name','Group name','trim|required|is_unique[groups.name]');
  $this->form_validation->set_rules('group_description','Group description','trim|required');

  if($this->form_validation->run()===FALSE)
  {
    $this->load->helper('form');
  $data['title'] = 'Create Group';
      $this->load->view('/create_group_view', $data);
  }
  else
  {
    $group_name = $this->input->post('group_name');
    $group_description = $this->input->post('group_description');
    $this->ion_auth->create_group($group_name, $group_description);
    $this->session->set_flashdata('message',$this->ion_auth->messages());
    redirect('/groups','refresh');
  }
}
    
    
public function edit($group_id = NULL)
{
  $group_id = $this->input->post('group_id') ? $this->input->post('group_id') : $group_id;
  $data['title'] = 'Edit group';
  $this->load->library('form_validation');
       
  $this->form_validation->set_rules('group_name','Group name','trim|required');
  $this->form_validation->set_rules('group_description','Group description','trim|required');
  $this->form_validation->set_rules('group_id','Group id','trim|integer|required');

  if($this->form_validation->run() === FALSE)
  {
    if($group = $this->ion_auth->group((int) $group_id)->row())
    {
      $data['group'] = $group;
    }
    else
    {
      $this->session->set_flashdata('message', 'The group doesn\'t exist.');
      redirect('group', 'refresh');
    }
    $this->load->helper('form');
    $this->load->view('edit_group_view', $data);
  }
  else
  {
    $group_name = $this->input->post('group_name');
    $group_description = $this->input->post('group_description');
    $group_id = $this->input->post('group_id');
    $this->ion_auth->update_group($group_id, $group_name, $group_description);
    $this->session->set_flashdata('message',$this->ion_auth->messages());
    redirect('group','refresh');
  }
}
    
 

    
    
public function delete($group_id = NULL)
{
  if(is_null($group_id))
  {
    $this->session->set_flashdata('message','There\'s no group to delete');
  }
  else
  {
    $this->ion_auth->delete_group($group_id);
    $this->session->set_flashdata('message',$this->ion_auth->messages());
  }
  redirect('admin/groups','refresh');
}    
    
    
}
