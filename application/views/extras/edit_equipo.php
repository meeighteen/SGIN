<?php echo validation_errors(); ?>
<form id="form" name="form" method="POST" action="<?=base_url()?>extras/actualizar_equipo/<?=$id_tipo_equipo?>">
<div>
  <h2 class="text"><?= $title; ?></h2>
  <h5><a href="<?php echo base_url(); ?>extras/register_nequipo"> << Equipos << </a></h5>
  <div class="form-row">
    <div class="col-md-4 col-md-offset-4">
      
      <div class="form-group">
        <label for="tipo_equipo">Tipo de equipo</label>
        <input type="text" class="form-control" name="tipo_equipo" placeholder="tipo de equipo" value="<?= $tipo_equipo ?>">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
    </div>
  </div>
</form>