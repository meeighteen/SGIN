<?php echo validation_errors(); ?>
<!-- <?php //echo form_open('incidents/registro_mantenimiento'); ?> -->
<form id="form" name="form" method="POST" action="<?=base_url()?>incidents/registro_mantenimiento/<?=$id_incidencia?>">
<h2><?= $title ?></h2>
<a href="<?php echo base_url(); ?>incidents/">volver << Incidencias</a>
  	<div class="form-row">
  		<div class="form-group col-md-6">
			<label for="Tipo_mantenimiento">Tipo de Mantenimiento</label>
	      	<select class="form-control" name="tipo_mantenimiento">
		        <option value="1">Correctivo</option>
		        <option value="2">Preventivo</option>
	      </select>
  		</div>	
<!--   		<div class="form-group col-md-6">
   		<label for="fecha_registro">Fecha automática:</label>
		<input type="text" id="fecha_registro" class="form-control" value="<?= date('d/m/Y', strtotime(date('Y/m/d'))); ?>" readonly/>	
    	</div>  --> 
	</div>
<!--     <div class="form-row">
		<div class="form-group col-md-6">
      	<label for="exampleInputFile">Subir archivo</label>
      	<input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      	<small id="fileHelp" class="form-text text-muted">Este archivo guarda relacion directa con el mantenimiento.</small>
    	</div>
	
    </div> -->
	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="diag_tecnico">Diagnóstico Técnico</label>
		    <textarea class="form-control" name="diag_tecnico" rows="3"></textarea>
		    <small class="form-text text-muted">max:255 caracteres.</small>
		</div>
		<div class="form-group col-md-6">
		    <label for="descripcion_trabajo">Descripcion del trabajo realizado</label>
		    <textarea class="form-control" name="descripcion_trabajo" rows="3"></textarea>
		    <small class="form-text text-muted">max:255 caracteres.</small>
		</div>
	</div>
	<div class="form-group">
		<label for="recomendaciones">Recomendaciones</label>
		<textarea class="form-control" name="recomendaciones" rows="3"></textarea>
		<small class="form-text text-muted">max:255 caracteres.</small>
	</div>
   	
   	<button type="submit" class="btn btn-primary">Registrar Mantenimiento</button>
<!-- <?php //echo form_close(); ?>
 -->
 </form>