<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
    <h3>Información del docente</h3>
</div>
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Datos personales
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php
          if($docentes != FALSE){
        ?>
          <p>
            <strong>Información del docente</strong>
            <br>Nombre completo: <em><?php echo $docentes[0]->doc_nombres . ' ' . $docentes[0]->doc_paterno . ' ' . $docentes[0]->doc_materno; ?></em><br>
            Fecha de nacimiento: <em><?php echo $docentes[0]->doc_fechanac; ?></em><br>
            Fecha de ingreso: <em><?php echo $docentes[0]->doc_fechain; ?></em><br>
            Número de empleado: <em><?php echo $docentes[0]->doc_numemp; ?></em><br>
            Experiencia laboral: <em><?php echo $docentes[0]->doc_explab.' '.'Año(s)'; ?></em><br>
            Estatus: <?php if($docentes[0]->doc_estatus > 0){?><em><?php echo 'Activo' ?></em><br>
            <?php } else{ ?> <em><?php echo 'Inactivo' ?></em><br> <?php }?>
            
          </p>
          <?php
            } else {
          ?>
          <p>No hay Información personal cargada para mostrar.</p>
          <?php
            }
          ?>       
</div>
</div>
</div>
</div>
