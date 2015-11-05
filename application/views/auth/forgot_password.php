<?php $this->load->view('_blocks/header'); ?>
<div id="content" class="container">
    
   

<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </p>

    
    
      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?>
               
    </p>

<?php echo form_close();?>
    
    

<?php $this->load->view('_blocks/footer'); ?>