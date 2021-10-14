<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Academia y Cuerpo Académico
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <?php if($acamiembro != FALSE){ foreach ($acamiembro as $am) { ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++; } ?>
        <div class="col-md-4">
        <p><strong class="text-danger"><?php echo 'Miembro de Academia' ?></strong><br>
        Nombre de la Academia: <?php echo $am->aca_nombre; ?><br>
        Periodo:  <em><?php echo $am->tipoperi_periodo; ?></em><br>
        Estatus:  <?php if($am->aca_mie_estatus > 0){?><em><?php echo 'Activo' ?></em><br>
        <?php } else{ ?> <em><?php echo 'Inactivo' ?></em><br> <?php }?>
        Año: <em><?php echo $am->anio; ?></em><br>
        </p>
        </div>
        <?php }} else { ?>
        <div class="col-md-12"><p>No hay Academia(s) para mostrar.</p></div>
        <?php } ?>
        <?php if($cmiembros != FALSE){ foreach ($cmiembros as $cm){ ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++; } ?>
        <div class="col-md-4">
        <p><strong class="text-danger"><?php echo 'Miembro de Cuerpo Académico' ?></strong><br>
        Cuerpo Académico: <?php echo $cm->cue_nombre; ?><br>
        Tipo de Nombramiento: <em><?php echo $cm->tmc_tipomiembro; ?></em><br>
        </p>
        </div>
        <?php }} else { ?>
        <div class="col-md-12"><p>No hay Cuerpo Académico(s) cargada(s) para mostrar.</p></div>
        <?php } ?>
        </div>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>




     <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Academias
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <?php if($cmiembros != FALSE){ foreach ($cmiembros as $cm){ ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++; } ?>
        <div class="col-md-4">
        <p><strong class="text-danger"><?php echo 'Miembro de Cuerpo Académico' ?></strong><br>
        Cuerpo Académico: <?php echo $cm->cue_nombre; ?><br>
        Tipo de Nombramiento: <em><?php echo $cm->tmc_tipomiembro; ?></em><br>
        </p>
        </div>
        <?php }} else { ?>
        <div class="col-md-12"><p>No hay Categoría(s) cargada(s) para mostrar.</p></div>
        <?php } ?>
        </div>
        </div>
      </div>
    </div>
  </div>