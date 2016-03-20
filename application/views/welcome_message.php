<?php $this->load->view('_blocks/header'); ?>
<div class="row">

<div class="col-md-6 ">  
<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp	mdl-card--border fullwidthCol	">
<div class="mdl-card__title">
	
<i class="material-icons bigIcon">account_circle</i>
<h2>Guests</h2>
</div>
<div class="mdl-card__actions">
<a href="<?php echo base_url('/index.php/main/guests/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View</a>
<a href="<?php echo base_url('/index.php/main/contacts/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View - OLD SYSTEM DATA</a>

</div>
</div>  
</div>

<div class="col-md-6">  
<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp	mdl-card--border fullwidthCol	">
<div class="mdl-card__title">
<i class="material-icons bigIcon">account_circle</i>
<h2>Visits</h2>
</div>
<div class="mdl-card__actions">
<a href="<?php echo base_url('/index.php/main/visits/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View</a>
<a href="<?php echo base_url('/index.php/main/contact_details/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View - OLD SYSTEM DATA</a>
</div>
</div>  
</div>

</div>

<div class="row">
<div class="col-md-4">  
<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp	mdl-card--border	">
<div class="mdl-card__title">
<i class="material-icons bigIcon">account_circle</i>
<h2>Staff</h2>
</div>
<div class="mdl-card__actions">
 <a href="<?php echo base_url('/index.php/main/staff/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View</a>

</div>
</div>  
</div>

<div class="col-md-4">  
<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp	mdl-card--border	">
<div class="mdl-card__title">
<i class="material-icons bigIcon">account_circle</i>
<h2>Users</h2>
</div>
<div class="mdl-card__actions">
 <a href="<?php echo base_url('/index.php/user/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View</a>

</div>
</div>  
</div>


<div class="col-md-4">  
<div class="mdl-card mdl-shadow--2dp through mdl-shadow--16dp	mdl-card--border	">
<div class="mdl-card__title">
<i class="material-icons bigIcon">account_circle</i>	
<h2>Groups</h2>
</div>
<div class="mdl-card__actions">
 <a href="<?php echo base_url('/index.php/group/');?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">View</a>

</div>
</div>  
</div>




</div>




<?php $this->load->view('_blocks/footer'); ?>
