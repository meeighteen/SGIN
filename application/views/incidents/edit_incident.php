<?php echo validation_errors(); ?>
<form id="form" name="form" method="POST" action="<?=base_url()?>incidents/actualizarIncidencia/<?=$id_incidencia?>">
<!--<?php //echo form_open('incidents/actualizarIncidencia/"'.$id_incidencia.'" '); ?> -->
<h2><?= $title .' # '. $id_incidencia?></h2>
<a href="<?php echo base_url(); ?>incidents/">volver << Incidencias</a>
	<input type="hidden" name="id_equipo" value="<?=$id_equipo?>">
  	<div class="form-row">
	    <div class="form-group col-md-4">
	    	<label for="Area">Ubicación</label>
	      	<select name="area" class="form-control" value="<?= $row->id_ubicacion ?>">
		    	<?php 
	            if ($ubicaciones->num_rows() > 0) {
	              foreach ($ubicaciones->result() as $row) {
	          		if($row->id_ubicacion === $id_ubicacion){
	          	?>
	          			<option value="<?= $row->id_ubicacion ?>" selected>
			    		<?php echo $row->ubicacion; ?>
			    		</option>
			    <?php 
	          		}else{
	          	?>
			    	<option value="<?= $row->id_ubicacion; ?>">
			    		<?php echo $row->ubicacion; ?>
			    	</option>
		    	<?php
		    		} 
	              }
	            }
	          	?>
	    	</select>
	    </div>
	    <div class="form-group col-md-4">
		    <label for="responsable">Responsable</label>
		    <input type="text" class="form-control" name="responsable" placeholder="Persona encargada" value="<?= $resp_incidencia; ?>">
	    </div>
  		<div class="form-group col-md-4">
	    <label for="tipo_equipo">Tipo de equipo</label>
		    <select name="select_equipo" class="form-control">
		    	<?php 
	            if ($equipos->num_rows() > 0) {
	              foreach ($equipos->result() as $row) {
	          		if($row->id_tipo_equipo === $id_tipo_equipo){
	          	?>
	          			<option value="<?= $row->id_tipo_equipo ?>" selected>
			    		<?php echo $row->tipo_equipo; ?>
			    		</option>
			    <?php 
	          		}else{
	          	?>
	          			<option value="<?= $row->id_tipo_equipo ?>">
			    		<?php echo $row->tipo_equipo; ?>
			    		</option>
		    	<?php
		    		} 
	              }
	            }
	          	?>
		    </select>
	   	</div>
  	</div>
  	<div class="form-row">
	    <div class="form-group col-md-6">
	    <label for="descripcion_equipo">Descripción del equipo</label>
	    <textarea class="form-control" name="descripcion_equipo" rows="3"><?php echo $descripcion_equipo; ?></textarea>
	    <small class="form-text text-muted">max:255 caracteres.</small>
	   	</div>
	   	<div class="form-group col-md-6">
	    <label for="descripcion_problema">Descripción del problema</label>
	    <textarea class="form-control" name="descripcion_problema" rows="3"><?php echo $desc_incidencia; ?>
	    </textarea>
	    <small class="form-text text-muted">max:255 caracteres.</small>
	   	</div>
	</div>

    <div class="form-row">
<!-- 	<div class="form-group col-md-6">
      	<label for="archivo_incidencia">Subir archivo</label>
      	<input type="file" class="form-control-file" name="archivo_incidencia" aria-describedby="fileHelp">
      	<small class="form-text text-muted">Este archivo guarda relacion directa con la incidencia.</small> 
    	</div> -->
    	<div class="form-group col-md-6">
	      <label for="codigo_patrimonio">Codigo Patrimonial</label>
	      <input type="text" class="form-control" name="codigo_patrimonio" placeholder="ejemplo: XXX-111110101"  value="<?= $codigo_patrimonio ?>">
	    </div>
	  	<div class="form-group col-md-6">
		   		<label for="fecha_registro">Fecha:</label>
				<input type="text" name="fecha_registro" class="form-control" value="<?= $fecha_incidencia; ?>" readonly/>	
	    </div>	
    </div>
    <div class="form-row">
    	<div class="form-group col-md-6">
    	<label for="select_estado">Estado</label>
    	<select name="select_estado" class="form-control">
    			<?php 
	            if ($estados->num_rows() > 0) {
	              foreach ($estados->result() as $row) {
	          		if($row->id_estado === $id_estado){
	          	?>
	          			<option value="<?= $row->id_estado ?>" selected>
			    		<?php echo $row->estado; ?>
			    		</option>
			    <?php 
	          		}else{
	          	?>
	          			<option value="<?= $row->id_estado ?>">
			    		<?php echo $row->estado; ?>
			    		</option>
		    	<?php
		    		} 
	              }
	            }
	          	?>
    	</select>
    	</div>
    	 <div class="form-row">
    	<div class="form-group col-md-12">
    		<label for="select_estado">Estado: (beta)</label><br>
    			<?php if($id_estado === '1'){ ?>
					<button type="submit" class="btn btn-outline-success">Asignar</button>	          			
			    <?php }else if ($id_estado === '2') { ?>
	          		<button type="submit" class="btn btn-outline-warning">Analizar</button>
	          	<?php }else if ($id_estado === '3') { ?>
	          		<button type="submit" class="btn btn-outline-secondary">duplicada</button>	
					<button type="submit" class="btn btn-outline-danger">rechazada</button>
					<button type="submit" class="btn btn-outline-success">Resuelta</button>
				<?php }else if ($id_estado === '4' || $id_estado === '5' ) { ?>
	          		<button type="submit" class="btn btn-outline-dark">Cerrar</button>
	          	<?php }else if ($id_estado === '6') { ?>
	          		<button type="submit" class="btn btn-outline-warning">Pendiente a prueba</button>	
	          	<?php }else if ($id_estado === '7') { ?>
	          		<button type="submit" class="btn btn-outline-danger">Reabrir</button>
	          	<?php }else if ($id_estado === '8') { ?>
	          		<button type="submit" class="btn btn-outline-info">Verificado</button>
	          	<?php }else if ($id_estado === '9') { ?>
	          		<button type="submit" class="btn btn-outline-dark">Cerrar</button>
	          	<?php } ?>
    	</div>
    	<!-- <div class="form-group col-md-12">
	    	
	    	<button type="button" class="btn btn-outline-success">Asignar</button>
			<button type="button" class="btn btn-outline-warning">Analizar</button>	
			<label>Declarar como:</label>
			<button type="button" class="btn btn-outline-secondary">duplicada</button>	
			<button type="button" class="btn btn-outline-danger">rechazada</button>

			<button type="button" class="btn btn-outline-success">Resolver</button>
			<button type="button" class="btn btn-outline-warning">Pendiente a prueba</button>
			<button type="button" class="btn btn-outline-danger">Reabrir</button>
			<button type="button" class="btn btn-outline-info">Verificado</button>
			<button type="button" class="btn btn-outline-dark">Cerrar</button>

    	</div> -->
    </div> 
</div>
    <div class="form-row">
    	<div class="form-group col-md-10">
    		<button type="submit" class="btn btn-primary">Guardar cambios</button>
    	</div>
    </div>
    
   	
<!-- <?php //echo form_close(); ?> -->
</form>