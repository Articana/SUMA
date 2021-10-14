<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingNine">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
         Carga Académica
        </a>
      </h4>         
    </div>
    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <?php if($cargas != FALSE){ foreach ($cargas as $car) { ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++; } ?>
        <div class="col-md-4">
         <p><strong class="text-info"><?php echo 'Carga Asignada ' ?></strong><br>
          Periodo: <em><?php echo $car->tipoperi_periodo . ' ' . $car->car_anio; ?></em><br>
          Área: <em><?php echo $car->are_nombre; ?></em><br>
          Grupo Tutorado: <em><?php echo $car->car_grupo_tutorado; ?></em><br>
          Total de Horas frente a grupo: <em><?php echo $car->car_hrs_frente_grupo. ' ' . 'horas'; ?></em><br>
          Total de Horas de estadia: <em><?php echo $car->car_hrs_estadia. ' ' . 'horas'; ?></em><br>
          Total de Horas desarrollo material didactico: <em><?php echo $car->car_hrs_desarrollo_mat_didactico. ' ' . 'horas'; ?></em><br>
          Total de Horas de académia: <em><?php echo $car->car_hrs_academia_ca. ' ' . 'horas'; ?></em><br>
          Total de Horas de apoyo académico: <em><?php echo $car->car_hrs_apoyo_academ_admin. ' ' . 'horas'; ?></em><br>
          Horas total h/s/m:  <em><?php echo $car->car_hrs_total_hsm. ' ' . 'horas'; ?></em><br>
          Entrega de reporte a Dirección: <em><?php echo $car->car_entrega_pro_rep_direccion; ?></em><br>
  <a class="text-danger"
   href="<?php echo base_url('cat/borrar/carga/' . $car->car_id.'/'.$doc_id.'/'.$letra); ?>" title="Eliminar">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small><br>
  </p>
        </div>
        <?php }} else { ?>
        <div class="col-md-12"><p>No hay informacion para mostrar.</p></div>
        <?php } ?>

        </div>
        </div>
      </div>
    </div>
  </div>