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
			<input type="text" class="form-control" name="dni" pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="8" placeholder="DNI">
		</div>
		<div class="form-group col-md-2">
			<label>Celular</label>
			<input type="text" class="form-control" name="phone" pattern="[9][1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]" maxlength="9"placeholder="Celular">
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
	<div class="form-row">
		<div class="form-group col-md-6">
			<small>(*) Campos Obligatorios.</small>
		</div>
	</div>
		<button type="submit" class="btn btn-primary">Registrar</button>
	</div>
</div>
<?php echo form_close(); ?>
<div class="form-row">
	<h2>Lista de usuarios</h2>
	<div class="form-group col-md-12">
		<div class="table-responsive-md">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Nombre y Apellido</th>
					<th>DNI</th>
					<th>celular</th>
					<th>e-mail</th>
					<th>Tipo usuario</th>
					<th>Fecha registro</th>
				</thead>
				<tbody>
					<?php 
                    if ($usuarios->num_rows() > 0) {
                      foreach ($usuarios->result() as $row) {
                  	?>
                  	<tr>
						<td><?php echo $row->cod_usuario; ?></td>
						<td><?php echo $row->nom_usuario.' '.$row->ape_usuario; ?></td>
						<td><?php echo $row->dni_usuario; ?></td>
						<td><?php echo $row->cel_usuario; ?></td>
						<td><?php echo $row->correo_usuario; ?></td>
						<?php if($row->tipo_usuario ==='1'){ ?>
							<td>Administrador</td>
						<?php }else{ ?>
							<td>Personal</td>
						<?php } ?>
						<td><?php echo date('d-m-Y',strtotime($row->fecha_registro));?></td>
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
	</div>
</div>