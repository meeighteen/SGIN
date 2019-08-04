<?php echo validation_errors(); ?>
<?php echo form_open('incidents/register_incident'); ?>
<h2><?= $title ?></h2>
<h5><a href="<?php echo base_url(); ?>"><< Inicio <<</a></h5>
  	<div class="form-row">
	    <div class="form-group col-md-4">
	    	<label for="Area">Ubicación</label>
	      	<select name="area" class="form-control">
		    	<?php 
	            if ($ubicaciones->num_rows() > 0) {
	              foreach ($ubicaciones->result() as $row) {
	          	?>
			    	<option value="<?php echo $row->id_ubicacion; ?>">
			    		<?php echo $row->ubicacion; ?>
			    	</option>
		    	<?php 
	              }
	            }
	          	?>
	    	</select>
	    </div>
	    <div class="form-group col-md-4">
		    <label for="responsable">Responsable</label>
		    <input type="text" class="form-control" name="responsable" placeholder="Persona encargada">
	    </div>
  		<div class="form-group col-md-4">
	    <label for="tipo_equipo">Tipo de equipo</label>
	    <select name="select_equipo" class="form-control">
	    	<?php 
            if ($equipos->num_rows() > 0) {
              foreach ($equipos->result() as $row) {
          	?>
	    	<option value="<?php echo $row->id_tipo_equipo; ?>">
	    		<?php echo $row->tipo_equipo; ?>
	    	</option>
	    	<?php 
              }
            }
          	?>
	    </select>
	   	</div>
  	</div>
  	<div class="form-row">
	    <div class="form-group col-md-6">
	    <label for="descripcion_equipo">Descripción del equipo</label>
	    <textarea class="form-control" name="descripcion_equipo" rows="3"></textarea>
	    <small class="form-text text-muted">max:255 caracteres.</small>
	   	</div>
	   	<div class="form-group col-md-6">
	    <label for="descripcion_problema">Descripción del problema</label>
	    <textarea class="form-control" name="descripcion_problema" rows="3"></textarea>
	    <small class="form-text text-muted">max:255 caracteres.</small>
	   	</div>
	</div>

    <div class="form-row">
<!-- 		<div class="form-group col-md-6">
      	<label for="archivo_incidencia">Subir archivo</label>
      	<input type="file" class="form-control-file" name="archivo_incidencia" aria-describedby="fileHelp">
      	<small class="form-text text-muted">Este archivo guarda relacion directa con la incidencia.</small>
    	</div> -->
    		    <div class="form-group col-md-6">
	      <label for="codigo_patrimonio">Codigo Patrimonial</label>
	      <input type="text" class="form-control" name="codigo_patrimonio" placeholder="ejemplo: XXX-111110101">
	    </div>
	<!--     	<div class="form-group col-md-6">
		   		<label for="fecha_registro">Fecha automática:</label>
				<input type="text" name="fecha_registro" class="form-control" value="<?= date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))); ?>" readonly/>	
	    	</div>  --> 	
    </div>   	
   	<button type="submit" class="btn btn-primary">Registrar Incidencia</button>
<?php echo form_close(); ?>