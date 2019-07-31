<?php echo validation_errors(); ?>
<?php echo form_open('extras/register_nubicacion'); ?>
<h2><?= $title; ?></h2>
<div class="form-row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label for="ubicacion">Ubicación</label>
			<input type="text" class="form-control" name="ubicacion" placeholder="Ubicación - área">
		</div>
		<button type="submit" class="btn btn-primary btn-block">Registrar</button>
	</div>
</div>
<?php echo form_close(); ?>

<div class="table-responsive-sm">
	<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Ubicación</th>
      <th>Editar</th>
      <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if ($ubicaciones->num_rows() > 0) {
        foreach ($ubicaciones->result() as $row) {
    ?>
    <tr>
      <th><?php echo $row->id_ubicacion; ?></th>
      <th><?php echo $row->ubicacion; ?></th>
      <th><a href="">Editar</a></th>
      <th><a href="">Eliminar</a></th>
    </tr>
    <?php 
        }
          }
      else{
    ?>
    <tr>
      <td colspan="3">No se encontraron datos</td>
    </tr>
      <?php
          }
      ?> 
  </tbody>
</table>
</div>