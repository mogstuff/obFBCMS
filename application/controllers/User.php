<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function index($group_id = NULL)
	{
		if(!$this->ion_auth->logged_in())
		{
		redirect('auth/login');
		}
		else
		{
    $data['title'] = 'Users';
 
$data['current_user'] = $this->ion_auth->user()->row();
            
$data['users'] = $this->ion_auth->users($group_id)->result();
  $this->load->view('list_users', $data);
         
		}
	}
    
    
  
    
    
  public function create()
  {
  $data['page_title'] = 'Create user';
  $this->load->library('form_validation');
  $this->form_validation->set_rules('first_name','First name','trim');
  $this->form_validation->set_rules('last_name','Last name','trim');
  $this->form_validation->set_rules('company','Company','trim');
  $this->form_validation->set_rules('phone','Phone','trim');
  $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]');
  $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
  $this->form_validation->set_rules('password','Password','required');
  $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
  $this->form_validation->set_rules('groups[]','Groups','required|integer');

  if($this->form_validation->run()===FALSE)
  {
   $data['title'] = 'Create User';
      $data['groups'] = $this->ion_auth->groups()->result();
    $this->load->helper('form');
    $this->load->view('create_user', $data);
  }
  else
  {
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $group_ids = $this->input->post('groups');

    $additional_data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'company' => $this->input->post('company'),
      'phone' => $this->input->post('phone')
    );
    $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);
    $this->session->set_flashdata('message',$this->ion_auth->messages());
    redirect('user','refresh');    
      
    }

  }
    
    
  public function edit($user_id = NULL)
  {
        $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
  $data['title'] = 'Edit user';
  $this->load->library('form_validation');

  $this->form_validation->set_rules('first_name','First name','trim');
  $this->form_validation->set_rules('last_name','Last name','trim');
  $this->form_validation->set_rules('company','Company','trim');
  $this->form_validation->set_rules('phone','Phone','trim');
  $this->form_validation->set_rules('username','Username','trim|required');
  $this->form_validation->set_rules('email','Email','trim|required|valid_email');
  $this->form_validation->set_rules('password','Password','min_length[6]');
  $this->form_validation->set_rules('password_confirm','Password confirmation','matches[password]');
  $this->form_validation->set_rules('groups[]','Groups','required|integer');
  $this->form_validation->set_rules('user_id','User ID','trim|integer|required');

  if($this->form_validation->run() === FALSE)
  {
    if($user = $this->ion_auth->user((int) $user_id)->row())
    {
      $data['user'] = $user;
    }
    else
    {
      $this->session->set_flashdata('message', 'The user doesn\'t exist.');
      redirect('user', 'refresh');
    }
    $data['groups'] = $this->ion_auth->groups()->result();
    $data['usergroups'] = array();
    if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
    {
      foreach($usergroups as $group)
      {
        $data['usergroups'][] = $group->id;
      }
    }
    $this->load->helper('form');
    $this->load->view('edit_user', $data);
  }
  else
  {
    $user_id = $this->input->post('user_id');
    $new_data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'company' => $this->input->post('company'),
      'phone' => $this->input->post('phone')
    );
    if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');

    $this->ion_auth->update($user_id, $new_data);

    //Update the groups user belongs to
    $groups = $this->input->post('groups');
    if (isset($groups) && !empty($groups))
    {
      $this->ion_auth->remove_from_group('', $user_id);
      foreach ($groups as $group)
      {
        $this->ion_auth->add_to_group($group, $user_id);
      }
    }

    $this->session->set_flashdata('message',$this->ion_auth->messages());
    redirect('admin/users','refresh');

  }
      
  }

    
    public function delete($user_id = NULL)
{
  if(is_null($user_id))
  {
    $this->session->set_flashdata('message','There\'s no user to delete');
  }
  else
  {
    $this->ion_auth->delete_user($user_id);
    $this->session->set_flashdata('message',$this->ion_auth->messages());
  }
  redirect('user','refresh');
}
 
    
    
public function profile()
{
  $data['title'] = 'User Profile';
  $user = $this->ion_auth->user()->row();
  $data['user'] = $user;
  $data['current_user_menu'] = '';
  if($this->ion_auth->in_group('admin'))
  {
  //  $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
  }

  $this->load->library('form_validation');
  $this->form_validation->set_rules('first_name','First name','trim');
  $this->form_validation->set_rules('last_name','Last name','trim');
  $this->form_validation->set_rules('company','Company','trim');
  $this->form_validation->set_rules('phone','Phone','trim');

  if($this->form_validation->run()===FALSE)
  {
    $this->load->view('profile',$data);
  }
  else
  {
    $new_data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'company' => $this->input->post('company'),
      'phone' => $this->input->post('phone')
    );
    if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
    $this->ion_auth->update($user->id, $new_data);

    $this->session->set_flashdata('message', $this->ion_auth->messages());
redirect('user/profile','refresh');
  }
}    
    
    
    
    
}
