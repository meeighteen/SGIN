<?php echo validation_errors(); ?>
<?php echo form_open('extras/register_nequipo'); ?>
<div>
  <h2 class="text"><?= $title; ?></h2>
  <div class="form-row">
    <div class="col-md-4 col-md-offset-4">
      
      <div class="form-group">
        <label for="tipo_equipo">Tipo de equipo</label>
        <input type="text" class="form-control" name="tipo_equipo" placeholder="tipo de equipo">
      </div>
      <button type="submit" class="btn btn-primary btn-block">Registrar</button>
    </div>
  </div>
  <?php echo form_close(); ?>
  <br>
  <div class="table-responsive-sm">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">tipo de equipo</th>
            <th>Editar</th>
           <!--  <th>Eliminar</th> -->
          </tr>
        </thead>
        <tbody>
          <?php 
            if ($equipos->num_rows() > 0) {
              foreach ($equipos->result() as $row) {
          ?>
          <tr>
            <th><?php echo $row->id_tipo_equipo; ?></th>
            <th><?php echo $row->tipo_equipo; ?></th>
            <th><a href="<?php echo base_url(); ?>extras/edit_equipo/<?= $row->id_tipo_equipo;?>">Editar</a></th>
            <!-- <th><a href="">Eliminar</a></th> -->
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
