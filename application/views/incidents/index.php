<h2><?= $title ?></h2>
<div class="table-responsive-xl">
  <table class="table">
    <thead>
          <tr>
            <th># Incidencia</th>
            <th>Responsable</th>
            <th>Id Equipo</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if ($incidents->num_rows() > 0) {
              foreach ($incidents->result() as $row) {
          ?>
          <tr>
            <th><?php echo $row->id_incidencia; ?></th>
            <th><?php echo $row->resp_incidencia; ?></th>
            <th><?php echo $row->id_equipo; ?></th>
            <th><?php echo $row->cod_usuario; ?></th>
            <th><?php echo $row->fecha_incidencia; ?></th>
            <th><?php echo $row->id_estado; ?></th>
            <th><?php echo $row->id_ubicacion; ?></th>
            <th><?php echo "<a href=".base_url()."incidents/edit_incident/".$row->id_incidencia.">Editar</a>" ?></th>
            <th><?php echo "<a href=".base_url()."incidents/delete_incident/".$row->id_incidencia.">Eliminar</a>" ?></th>
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
  <br>
  <h2>Incidencias no asignadas</h2><small>El estado siempre será 1:NUEVO</small>
  <table class="table">
    <thead>
          <tr>
            <th># Incidencia</th>
            <th>Responsable</th>
            <th>Id Equipo</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            if ($incidents->num_rows() > 0) {
              foreach ($incidents->result() as $row) {
          ?>
          <tr>
            <th><?php echo $row->id_incidencia; ?></th>
            <th><?php echo $row->resp_incidencia; ?></th>
            <th><?php echo $row->id_equipo; ?></th>
            <th><?php echo $row->cod_usuario; ?></th>
            <th><?php echo $row->fecha_incidencia; ?></th>
            <th><?php echo $row->id_estado; ?></th>
            <th><?php echo $row->id_ubicacion; ?></th>
            <th><?php echo "<a href=".base_url()."incidents/edit_incident/".$row->id_incidencia.">Editar</a>" ?></th>
            <th><?php echo "<a href=".base_url()."incidents/delete_incident/".$row->id_incidencia.">Eliminar</a>" ?></th>
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