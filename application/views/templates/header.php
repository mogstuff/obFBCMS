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
        <li class="active"><a href="#">Home</a></li>
      
          <li>    <a href="<?php echo base_url('/index.php/main/guests/');?>"><span class="glyphicon glyphicon-user"></span> Guests</a>
        </li>
        <li>   <a href="<?php echo base_url('/index.php/auth/logout');?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
     </li>
      </ul>
    </div>
  </div>
</nav>

     
     
     <div class="container">
   
                 <img src="http://olivebranch.adamzahler.com/wp-content/uploads/2015/05/the-olive-branch-logo-header-2.png" />
         

	<div class="jumbotron">
        <h1><?php echo $title; ?></h1>
  </div>
  
	

                
                
