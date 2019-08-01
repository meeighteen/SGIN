<h5><?= $title ?></h5>
<div class="container ">
  <table class="table">
    <thead>
          <tr>
            <th>#</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Mantenimientos</th>
            <th>Registrar mantenimiento</th>
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
            <td><?php echo $row->resp_incidencia; ?></td>
            <td><?php echo $row->fecha_incidencia; ?></td>
            <td><?php echo $row->id_estado; ?></td>
            <td><?php echo $row->id_ubicacion; ?></td>
            <td><?php echo "<a href=".base_url()."incidents/show_mantenimiento/".$row->id_incidencia.">ver</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/registro_mantenimiento/".$row->id_incidencia.">registrar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/edit_incident/".$row->id_incidencia.">Editar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/delete_incident/".$row->id_incidencia.">Eliminar</a>" ?></td>
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
  <h5>Incidencias no asignadas</h5><small>El estado siempre será 1:NUEVO</small>
  <table class="table">
    <thead>
          <tr>
            <th>#</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Ubicación</th>
            <th>Mantenimientos</th>
            <th>Registrar mantenimiento</th>
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
            <td><?php echo $row->resp_incidencia; ?></td>
            <td><?php echo $row->fecha_incidencia; ?></td>
            <td><?php echo $row->id_estado; ?></td>
            <td><?php echo $row->id_ubicacion; ?></td>
            <td><?php echo "<a href=".base_url()."incidents/show_mantenimiento/".$row->id_incidencia.">ver</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/registro_mantenimiento/".$row->id_incidencia.">registrar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/edit_incident/".$row->id_incidencia.">Editar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/delete_incident/".$row->id_incidencia.">Eliminar</a>" ?></td>
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