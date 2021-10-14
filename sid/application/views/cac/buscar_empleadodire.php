
<div class="container">
<div class="panel panel-default">
 <div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
    <h3>Información del Director</h3>
</div>
<div class="panel-body">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Datos personales
        </a>
        
        <?php if($permiso == 5) $control = 'cac'; ?>
       
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <?php if($responsables != FALSE){  ?>
            <p> <strong>Información del director</strong>
            <br>Nombre completo: <em><?php echo $responsables[0]->res_nombres . ' ' . $responsables[0]->res_paterno . ' ' . $responsables[0]->res_materno; ?></em><br>
            Número de empleado: <em><?php echo $responsables[0]->res_numemp; ?></em><br>
           </p>
          <?php  } else { ?>
          <p>No hay Información personal cargada para mostrar.</p>
          <?php } ?>
          </div>
          </div>
          </div>
    
       
</div>
</div>
</div>
</div>
