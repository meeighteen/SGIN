<html>
<head>
	<title>SGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
	<!-- Bootstrap core CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha384-G3Fme2BM4boCE9tHx9zHvcxaQoAkksPQa/8oyn1Dzqv7gdcXChereUsXGx6LtbqA" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/home/carousel.css">

	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			  <a class="navbar-brand" href="<?php echo base_url(); ?>">SGIN</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						 <li class="nav-item">
				        <a class="nav-link" href="<?php echo base_url(); ?>info">Info</span></a>
				      </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0">
				    <?php if ($this->session->userdata('logged_in')): ?>
					<input class="form-control text-center" readonly value="<?php echo $this->session->userdata('nombre'); ?>" style="width:120px;height:30px">	
					<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Salir</a>
					<?php endif; ?>
			    </form>
			  </div>
		</div>
	</nav>
	<br>
	<div class="container" style="height:auto;">
		<!--- Flash messages -->
		<?php if($this->session->flashdata('user_registered')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
		<?php endif ?>
		<?php if($this->session->flashdata('login_failed')): ?>
			<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
		<?php endif ?>
		<?php if($this->session->flashdata('user_loggedin')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
		<?php endif ?>
		<?php if($this->session->flashdata('user_loggedout')): ?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
		<?php endif ?>
		