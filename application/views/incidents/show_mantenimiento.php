

<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h4 class="border-bottom border-gray pb-2 mb-0"><?= $title ?></h4>
	<a href="<?php echo base_url(); ?>incidents/">volver << Incidencias</a>
	 <?php if ($mantenimientos->num_rows() > 0) { ?>
	<?php foreach($mantenimientos->result() as $mant): ?>

	    <div class="media text-muted pt-3">
	      <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
	      <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	        <strong class="d-block text-dark"><?php echo date('d-m-Y H:i:s',strtotime($mant->fecha_mantenimiento));?></strong>
	        <strong class="d-block text-gray-dark">Diagnóstico:</strong><?php echo $mant->diag_mantenimiento;?>
	        <strong class="d-block text-gray-dark">Descripcion del trabajo realizado:</strong><?php echo $mant->desc_mantenimiento; ?>
	        <strong class="d-block text-gray-dark">Tipo de mantenimiento:</strong><?php if ($mant->id_tipo_mantenimiento = '1') {?> Correctivo<?php }else{?> Preventivo <?php } ?>	
	        <strong class="d-block text-gray-dark">Recomendaciones</strong><?php echo $mant->rec_mantenimiento;?>
	      </p>
	     	<?php echo "<a href=".base_url()."incidents/delete_mantenimiento/".$mant->id_mantenimiento.">Eliminar</a>" ?>
	    </div>

	  <?php endforeach; ?>
	<?php }else{ ?>
		<br>
		<?php echo "No se encontraron datos"; ?>
	<?php } ?>
</div>
</main>
