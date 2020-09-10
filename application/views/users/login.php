<?php echo validation_errors(); ?>
<?php echo form_open('users/login'); ?>
<div class="form-row" justify-content="center">
	<div class="col-md-4 col-md-set-4">
		<h2 class="text-center"><?= $title; ?></h2>
		<div class="form-group">
			<label>Correo Electrónico</label>
			<input type="text" class="form-control" name="email" placeholder="Correo Electrónico">
		</div>
		<div class="form-group">
			<label>Contraseña</label>
			<input type="password" class="form-control" name="password" placeholder="Contraseña">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Enviar</button>
	</div>
</div>
<?php echo form_close(); ?>