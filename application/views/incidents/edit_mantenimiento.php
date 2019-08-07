<?php echo validation_errors(); ?>
<!-- <?php //echo form_open('incidents/registro_mantenimiento'); ?> -->
<form id="form" name="form" method="POST" action="<?=base_url()?>incidents/actualizar_mantenimiento/<?=$id_mantenimiento?>">
<h2><?= $title ?></h2>
<h5><a href="<?php echo base_url(); ?>incidents/"><< Incidencias <<</a></h5>
  	<div class="form-row">
  		<div class="form-group col-md-6">
			<label for="Tipo_mantenimiento">Tipo de Mantenimiento</label>
	      	<select class="form-control" name="tipo_mantenimiento" value="<?= $id_tipo_mantenimiento ?>">
	      		<?php if($id_tipo_mantenimiento == '1'){?>
	          			<option value="1" selected>Correctivo</option>
	          			<option value="2">Preventivo</option>
			    <?php }else{ ?>
			    	<option value="1">Correctivo</option>
			    	<option value="2" selected>Preventivo</option>
			    <?php } ?>
	      </select>
  		</div>	
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
		    <label for="diag_tecnico">Diagnóstico Técnico</label>
		    <textarea class="form-control" name="diag_tecnico" rows="3"><?php echo $diag_mantenimiento; ?></textarea>
		    <small class="form-text text-muted">max:255 caracteres.</small>
		</div>
		<div class="form-group col-md-6">
		    <label for="descripcion_trabajo">Descripcion del trabajo realizado</label>
		    <textarea class="form-control" name="descripcion_trabajo" rows="3"><?php echo $desc_mantenimiento; ?></textarea>
		    <small class="form-text text-muted">max:255 caracteres.</small>
		</div>
	</div>
	<div class="form-group">
		<label for="recomendaciones">Recomendaciones</label>
		<textarea class="form-control" name="recomendaciones" rows="3"><?php echo $rec_mantenimiento; ?></textarea>
		<small class="form-text text-muted">max:255 caracteres.</small>
	</div>
   	
   	<button type="submit" class="btn btn-primary">Guardar cambios</button>
<!-- <?php //echo form_close(); ?>
 -->
 </form>