<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
<div class="form-row">
	<div class="col-md-8 col-md-offset-8">
		<h2 class="text"><?= $title; ?></h2>
	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Nombres</label>
			<input type="text" class="form-control" name="name" placeholder="Nombres">
		</div>
		<div class="form-group col-md-4">
			<label>Apellidos</label>
			<input type="text" class="form-control" name="lastname" placeholder="Apellidos">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-2">
			<label>DNI</label>
			<input type="text" class="form-control" name="dni" placeholder="DNI">
		</div>
		<div class="form-group col-md-2">
			<label>Celular</label>
			<input type="text" class="form-control" name="phone" placeholder="Celular">
		</div>
		<div class="form-group col-md-4">
			<label>Correo Electrónico</label>
			<input type="email" class="form-control" name="email" placeholder="Correo Electrónico">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Contraseña</label>
			<input type="password" class="form-control" name="password1" placeholder="Contraseña">
		</div>
		<div class="form-group col-md-4">
			<label>Confirmación de contraseña</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirme su contraseña">
		</div>
	</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</div>
<?php echo form_close(); ?>