<div class="container ">
  <h4>Incidencias no asignadas</h4><small>El estado siempre será 1:NUEVO</small>
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
            if ($incident->num_rows() > 0) {
              foreach ($incident->result() as $row1) {
          ?>
          <tr>

            <th><?php echo $row1->id_incidencia; ?></th>
            <td><?php echo $row1->resp_incidencia; ?></td>
            <td><?php echo $row1->fecha_incidencia; ?></td>
            <?php if ($estados->num_rows()>0) {
              foreach ($estados->result() as $row0) {
                if($row1->id_estado===$row0->id_estado){?>
            <td><?php echo $row0->estado; ?></td>
            <?php }}} ?>

            <?php if ($ubicaciones->num_rows()>0) {
              foreach ($ubicaciones->result() as $row4) {
                if($row1->id_ubicacion===$row4->id_ubicacion){?>
            <td><?php echo $row4->ubicacion; ?></td>
            <?php }}} ?>
            <td><?php echo "<a href=".base_url()."incidents/show_mantenimiento/".$row1->id_incidencia.">ver</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/registro_mantenimiento/".$row1->id_incidencia.">registrar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/edit_incident/".$row1->id_incidencia.">Editar</a>" ?></td>
            <td><?php echo "<a href=".base_url()."incidents/delete_incident/".$row1->id_incidencia.">Eliminar</a>" ?></td>
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
<h4><?= $title ?></h4>
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
            <?php if ($estados->num_rows()>0) {
              foreach ($estados->result() as $row0) {
                if($row->id_estado===$row0->id_estado){?>
            <td><?php echo $row0->estado; ?></td>
            <?php }}} ?>
            
            <?php if ($ubicaciones->num_rows()>0) {
              foreach ($ubicaciones->result() as $row4) {
                if($row->id_ubicacion===$row4->id_ubicacion){?>
            <td><?php echo $row4->ubicacion; ?></td>
            <?php }}} ?>
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