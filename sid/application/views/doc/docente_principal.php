<div style="padding:24px;">&nbsp;</div>
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
        <div class="container-fluid">
        <?php
          if($docente != FALSE){ ?>
          <div class="row">
          <div class="col-md-4">
            <a href="#" class="thumbnail">
              <img style="height: 128px; width:128px;" src="<?php echo base_url('./upload/'.$docente[0]->doc_cvdir.'/'.$docente[0]->doc_fotografia); ?>" alt="...">
            </a>
          </div>
          <div class="col-md-4">
          <p> <strong class="text-danger">Información del docente</strong>
          <small><a class="text-success" href="<?php echo base_url('doc/vudocente/' . $docente[0]->doc_id);?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Modificar</a></small>
          <br>Nombre completo: <em><?php echo $docente[0]->doc_nombres . ' ' . $docente[0]->doc_paterno . ' ' . $docente[0]->doc_materno; ?></em><br>
          Fecha de nacimiento: <em><?php echo $docente[0]->doc_fechanac; ?></em><br>
          Fecha de ingreso: <em><?php echo $docente[0]->doc_fechain; ?></em><br>
          Número de empleado: <em><?php echo $docente[0]->doc_numemp; ?></em><br>
          Experiencia laboral: <em><?php echo $docente[0]->doc_explab. ' ' . 'años'; ?></em><br></p>
          <?php } else {?>
          <p>No hay Información personal cargada para mostrar.</p>
          <?php } ?>
          </div>
        <?php
          if($contacto != FALSE){ foreach ($contacto as $co) { ?>
          <div class="col-md-4">
          <p><strong class="text-danger">Información de contacto</strong>
          <small><a class="text-success" href="<?php echo base_url('doc/vucontacto/' . $co->con_id); ?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Modificar</a></small><br>
          Email Institucional: <em><?php echo $co->con_emailinsti; ?></em><br>
          Teléfono Institucional: <em><?php echo $co->con_teleinsti; ?></em><br>
          Email Particular: <em><?php echo $co->con_emailparti; ?></em><br>
          Teléfono Particular: <em><?php echo $co->con_teleparti; ?></em><br></p>
          <?php } } else {  ?>
          <p>No hay Información de Contacto cargada para mostrar.</p>
          <?php } ?>
          </div>
          </div>
          </div>
      </div>
    </div>
  </div>

   <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseFour">
         Direcciones
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <?php if($domicilios != FALSE){ $contador = 1; foreach ($domicilios as $d) { ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php  } ?>
        <div class="col-md-4">
        <p><strong class="text-danger"><?php echo 'Domicilio ' . $contador; ?></strong>
          <small><a class="text-danger" href="<?php echo base_url('cat/borrar/domicilio/' . $d->dom_id); ?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small><br>
            Calle: <em><?php echo $d->dom_calle; ?></em><br>
            Número: <em><?php echo $d->dom_numero; ?></em><br>
            Código postal: <em><?php echo $d->dom_postal; ?></em><br>
            Fraccionamiento: <em><?php echo $d->dom_fraccionamiento; ?></em><br>
            Municipio: <em><?php echo $d->mun_nombre; ?></em><br></p>
        </p>
        </div>
        <?php $contador++; }} else { ?>
        <div class="col-md-12"><p>No hay Domicilio(s) cargado(s) para mostrar.</p></div>
        <?php } ?>
        </div>
        </div>
      </div>
    </div>
  </div>


    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Formación académica
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <div class="container-fluid">
        <div class="row">
        <?php
          if($formaciones != FALSE){
          $contador = 1;
          foreach ($formaciones as $f) { ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++;} ?>
        <div class="col-md-4">
         <p><strong class="text-danger"><?php echo $f->tipoform_nombre . ' en ' . $f->docform_rama; ?></strong><br>
          <small><a class="text-success" href="<?php echo base_url('doc/vudocenteformacion/' . $f->docform_id); ?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Modificar</a></small>
          <small><a class="text-danger" href="<?php echo base_url('cat/borrar/docente_formacion/' . $f->docform_id); ?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small><br>
        Institución: <em><?php echo $f->inst_nombre; ?></em><br>
        Título recibido: <em><?php echo $f->tipotitulo_nombre; ?></em><br>
        Identificador: <em><?php if($f->docform_ident!= FALSE) { echo $f->docform_ident; } else{ echo 'N/A';} ?></em><br>
        Estatus: <?php if($f->docform_estatus > 0){?><em><?php echo 'Activo' ?></em><br>
        <?php } else{ ?> <em><?php echo 'Inactivo' ?></em><br> <?php }?>
        Modalidad de estudio: <em><?php echo $f->tmf_descripcion; ?></em><br>
        Periodo: <em><?php echo $f->docform_fechaing . ' a ' . $f->docform_fechaeg; ?></em><br>
         </p>
        </div>
        <?php }} else { ?>
        <div class="col-md-12">
        <p>No hay Formación Académica para mostrar.</p>
        </div>
        <?php
          }
        ?>
      </div>
      </div>
    </div>
  </div>
  </div>

    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Categorías
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <?php if($categorias != FALSE){ $contador = 1; foreach ($categorias as $c) { ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++; } ?>
        <div class="col-md-4">
        <p><strong class="text-primary"><?php echo $c->tipocat_nombre; ?></strong><br>
        Fecha: <em><?php echo $c->doccat_fecha; ?></em><br>
        Tipo de nombramiento: <em><?php echo $c->tiponomb_nombre; ?></em>
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
  <?php if($this->session->flashdata('carga_error')){ echo '<br><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Acción no Autorizada!</strong><small><p>' . $this->session->flashdata('carga_error') . '</p></small></div>';}?>

</div>
</div>
</div>
</div>