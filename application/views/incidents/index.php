

  <?php echo form_open('incidents/show_incident_ubicacion'); ?>
    <div class="form-row">
        <div class="form-group col-md-3">
          <select class="form-control" name="select_ubicacion">
                    <option selected>Seleccione</option>
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
        <div class="form-group col-md-1.3">
          <button type="submit" class="btn btn-outline-success">Buscar</button> 
        </div>
        <div class="form-group col-md-2">
        <a href="<?=base_url()?>incidents" role="button" class="btn btn-outline-success">Ver todas</a>
        </div>
    </div>
    <h5><a href="<?php echo base_url(); ?>"><< Inicio <<</a></h5>
  <?php echo form_close(); ?>
  <div class="form-row">
    <div class="form-group col-md-12">
      <div class="table-responsive">
        <h4>Incidencias no asignadas</h4>
          <table class="table table-bordered" style="text-align:center; ">
            <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Responsable</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Mantenimiento</th>
                    <th>Personal Técnico</th>
                    <!-- <th>Reporte</th> -->
                    <th>Opcion</th>
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
                    <td><?php echo date('d-m-y',strtotime($row1->fecha_incidencia));?></td>
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

                    <td><small><?php echo "<a href=".base_url()."incidents/show_mantenimiento/".$row1->id_incidencia.">ver</a>" ?><br><?php echo "<a href=".base_url()."incidents/registro_mantenimiento/".$row1->id_incidencia.">registrar</a>" ?></small></td>

                    <?php if ($usuarios->num_rows()>0) {
                      foreach ($usuarios->result() as $row5) {
                        if($row1->cod_usuario===$row5->cod_usuario){?>
                    <td><?php echo $row5->nom_usuario;?><br><?php echo $row5->ape_usuario;?></td>
                    <?php }}} ?>
                    <!-- <td><a href=""><i class='far fa-file-pdf' style='font-size:25px;color:red'></i></a></td> -->
                    <td><small><?php echo "<a href=".base_url()."incidents/edit_incident/".$row1->id_incidencia.">Editar</a>" ?><br><?php echo "<a href=".base_url()."incidents/delete_incident/".$row1->id_incidencia.">Eliminar</a>" ?></small></td>
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
      <div class="table-responsive">
        <br>
        <h4><?= $title ?></h4>
          <table class="table table-bordered" style="text-align:center;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Responsable</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Mantenimiento</th>
                <th scope="col">Personal Técnico</th>
                <!-- <th scope="col">Reporte</th> -->
                <th scope="col">Opcion</th>
              </tr>
            </thead>
            <tbody>
                  <?php 
                    if ($incidents->num_rows() > 0) {
                      foreach ($incidents->result() as $row) {
                  ?>
              <tr>
                <th scope="row"><?php echo $row->id_incidencia; ?></th>
                <td><?php echo $row->resp_incidencia; ?></td>
                <td scope="row"><?php echo date('d-m-y',strtotime($row->fecha_incidencia));?></td>
                    <?php if ($estados->num_rows()>0) {
                      foreach ($estados->result() as $row0) {
                        if($row->id_estado===$row0->id_estado){?>
                <td><?php echo $row0->estado; ?></td>
                    <?php }}} ?>
                    
                    <?php if ($ubicaciones->num_rows()>0) {
                      foreach ($ubicaciones->result() as $row7) {
                        if($row->id_ubicacion===$row7->id_ubicacion){?>
                <td><?php echo $row7->ubicacion; ?></td>
                    <?php }}} ?>
                <td><small><?php echo "<a href=".base_url()."incidents/show_mantenimiento/".$row->id_incidencia.">ver</a>" ?><br><?php echo "<a href=".base_url()."incidents/registro_mantenimiento/".$row->id_incidencia.">registrar</a>" ?></small></td>
                    
                    <?php if ($usuarios->num_rows()>0) {
                      foreach ($usuarios->result() as $row6) {
                        if($row->cod_usuario===$row6->cod_usuario){?>
                <td><?php echo $row6->nom_usuario;?><br><?php echo $row6->ape_usuario; ?></td>
                    <?php }}} ?>
                <!-- <td><a href="<?php echo base_url(); ?>report_incident"><i class='far fa-file-pdf' style='font-size:25px;color:red'></i> --></a></td>    
                <td><small><?php echo "<a href=".base_url()."incidents/edit_incident/".$row->id_incidencia.">Editar</a>" ?><br><?php echo "<a href=".base_url()."incidents/delete_incident/".$row->id_incidencia.">Eliminar</a>" ?></small></td>
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