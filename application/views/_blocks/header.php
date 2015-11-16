<html>
       <head>
  <title>Olive Branch Guest Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--
           <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     -->
           
           <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
           
           
           <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.3.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
           
</head>

 <body>

     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url('/index.php/');?>">Olive Branch Guest Management System</a>
    
    </div>
    <div>
      <ul class="nav navbar-nav">
     <?php
if($this->ion_auth->logged_in()) {
?>
          <li ><a href="<?php echo base_url('/index.php/');?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      
          <li>    <a href="<?php echo base_url('/index.php/main/guests/');?>"><span class="glyphicon glyphicon-user"></span> Guests</a>
               <li>    <a href="<?php echo base_url('/index.php/main/visits/');?>"><span class="glyphicon glyphicon-user"></span> Visits</a>
        </li>
             <?php
    if($this->ion_auth->is_admin())
    {
    ?>
      <li><a href="<?php echo site_url('group'); ?>"><span class="glyphicon glyphicon-user"></span> Groups</a></li>
      <li><a href="<?php echo site_url('user'); ?>"><span class="glyphicon glyphicon-user"></span> Users</a></li>
    <?php
    }
    ?>
     
               <li>   <a href="<?php echo base_url('/index.php/user/profile');?>"><span class="glyphicon glyphicon-user"></span> My Account</a>
     </li>
     
          
          
          
          <li>   <a href="<?php echo base_url('/index.php/auth/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
     </li>
          
   

  <?php } ?>        
      </ul>
    </div>
  </div>
</nav>

     
     
     <div class="container">
         
           <div class="page-header">

            <div cl class="row">
               <div class="col-sm-8">
                   <h1><?php echo $title; ?></h1>      </div>
               
               <div class="col-sm-4">  <img src="http://www.the-olivebranch.org.uk/wp-content/uploads/2015/05/the-olive-branch-logo-header-2.png" /></div>
      
               </div>
  
         
         </div>

         
   

                
                
