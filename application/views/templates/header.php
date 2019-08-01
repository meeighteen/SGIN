<html>
<head>
	<title>SGIN</title>
	
	<!-- Bootstrap core CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sandstone/bootstrap.min.css" rel="stylesheet" integrity="sha384-G3Fme2BM4boCE9tHx9zHvcxaQoAkksPQa/8oyn1Dzqv7gdcXChereUsXGx6LtbqA" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">SGIN</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
			    <ul class="nav navbar-nav">
			      	<li class="nav-item">
			        <a class="nav-link" href=" <?php echo base_url(); ?> ">Inicio<span class="sr-only">(current)</span></a>
			      	</li>
			      	<?php if ($this->session->userdata('logged_in')): ?>
			      	<li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>incidents/register_incident">Registrar incidencia</a>
			      	</li>
 			      	<!-- <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>incidents/registro_mantenimiento">Registrar mantenimiento</a>
			      	</li> -->
			      	<li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>incidents">Ver registros</a>
			      	</li>
				    <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url(); ?>extras">Extras</a>
			      	</li>
			      	<?php endif; ?>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<?php if (!$this->session->userdata('logged_in')): ?>
				      	<li class="nav-item">
				      	<a class="nav-link" href="<?php echo base_url(); ?>users/login">Entrar</a>
				      	</li>
				    <?php endif; ?>
				    <?php if ($this->session->userdata('logged_in')): ?>
				      	<li class="nav-item">
				      	<a class="nav-link" href="<?php echo base_url(); ?>users/logout">Salir</a>
				      	</li>
				    <?php endif; ?>
			    </ul>
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
		