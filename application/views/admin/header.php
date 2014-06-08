<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/css/bootstrap-theme.min.css">-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.11.1.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js" ></script>
<script src="<?php echo base_url();?>assets/css/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.4/js/jquery-ui-1.10.4.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">xiaohao</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			  <li class="<?php echo ($main=="order")?"active":""?>"><a href="<?php echo base_url();?>index.php/admin/order">Order</a></li>
			  <li class="<?php echo ($main=="dishes")?"active":""?>"><a href="<?php echo base_url();?>index.php/admin/dishes">Dishes</a></li>
			</ul>
		</div>
	</div>
</nav>



<!--<div class="navbar-collapse collapse">
	<div class="container">
		<ul class="nav nav-pills red">
		  <li class="<?php echo ($main=="home")?"active":""?>"><a href="<?php echo base_url();?>index.php/home/index">Home</a></li>
		  <li class="<?php echo ($main=="menu")?"active":""?>"><a href="<?php echo base_url();?>index.php/home/menu">Menu</a></li>
		  <li class="<?php echo ($main=="order")?"active":""?>"><a href="<?php echo base_url();?>index.php/home/order">My Order</a></li>
		</ul>
	</div>
</div>-->
