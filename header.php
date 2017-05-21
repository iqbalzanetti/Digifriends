<?php require('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Digifriends</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		body{overflow-x: hidden;}
		.myalert{margin-top: 10px;}
		.deletebtn{margin-bottom: 20px;}
	</style>
</head>
<body>
	<!--navbar-->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Digifriends</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="<?php echo $base_url ?>index.php">Calculate DigiFriends</a></li>
	        <li><a href="<?php echo $base_url ?>check.php">Check DigiFriends</a></li>
	        <?php
	        	if(@$_SESSION['uid'] != ''){
	        		echo '<li><a href="'.$base_url.'logout.php">Logout</a></li>';
	        	}
	        ?>
	      </ul>
	    </div>
	  </div>
	</nav>