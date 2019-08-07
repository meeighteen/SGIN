<?php echo validation_errors(); ?>
<form id="form" name="form" method="POST" action="<?=base_url()?>extras/actualizar_ubicacion/<?=$id_ubicacion?>">
<h2><?= $title; ?></h2>
<h5><a href="<?php echo base_url(); ?>extras/register_nubicacion"> << Equipos << </a></h5>
<div class="form-row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label for="ubicacion">Ubicación</label>
			<input type="text" class="form-control" name="ubicacion" placeholder="Ubicación - área" value="<?= $ubicacion ?>">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
	</div>
</div>
</form>