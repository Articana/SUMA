<div class="container">
<div class="panel panel-default">
  <div class="panel-heading" id="panel_principal">
  </div>
  <div class="panel-body">
      <div class="page-header"><h4>Información del Docente <small>ver detalle</small></h4></div>
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
          if($docente != FALSE){
            foreach ($docente as $doce) {
        ?>

  <div class="row">
          <div class="col-md-4">
            <a href="#" class="thumbnail">
<img style="height: 128px; width:128px;" src="<?php echo base_url('./upload/'.$docente[0]->doc_cvdir.'/'.$docente[0]->doc_fotografia); ?>" alt="...">
            </a>
          </div>
          <div class="col-md-4">
          <p>
            <strong class="text-danger">Información del docente</strong>
            <br>Nombre completo: <em><?php echo $doce->doc_nombres . ' ' . $doce->doc_paterno . ' ' . $doce->doc_materno; ?></em><br>
            Fecha de nacimiento: <em><?php echo $doce->doc_fechanac; ?></em><br>
            Fecha de ingreso: <em><?php echo $doce->doc_fechain; ?> <small><a class="text-success" href="<?php echo base_url('rh/vudocente/' . $doce->doc_id.'/'.$letra); ?>" title="Modificar">
<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Modificar</a></small>
</em><br>
            Número de empleado: <em><?php echo $doce->doc_numemp; ?></em><br>
            Experiencia laboral: <em><?php echo $doce->doc_explab; ?></em><br>
	    Estatus: <?php if($doce->doc_estatus > 0){?><em><?php echo 'Activo' ?></em><br>
      <?php } else{ ?> <em><?php echo 'Inactivo' ?></em><br> <?php }?>
          </p>
          <?php
            }} else {
          ?>
   <p>No hay Información personal cargada para mostrar.</p>
          <?php
            }
          ?>
          </div>
        <?php
          if($contacto != FALSE){
            foreach ($contacto as $con) {
        ?>
          <div class="col-md-4">
          <p>
            <strong class="text-danger">Información de contacto</strong>
            <br>
            Email Institucional: <em><?php echo $con->con_emailinsti; ?></em><br>
            Teléfono Institucional: <em><?php echo $con->con_teleinsti; ?></em><br>
            Email Particular: <em><?php echo $con->con_emailparti; ?></em><br>
            Teléfono Particular: <em><?php echo $con->con_teleparti; ?></em><br>
          </p>
          <?php
           } } else {
          ?>
          <p>No hay Información de Contacto cargada para mostrar.</p>
          <?php
            }
          ?>
          </div>
          </div>
          </div>
      </div>
    </div>
  </div>

	 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
        <p><strong class="text-danger"><?php echo 'Domicilio ' . $contador; ?></strong><br>
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
          foreach ($formaciones as $f) {
        ?>
        <?php if($contador == 4){ $contador = 1; ?>
        <div class="row">
        <?php $contador++;} ?>
        <div class="col-md-4">
        <p>
      <strong class="text-danger"><?php echo $f->tipoform_nombre . ' en ' . $f->docform_rama; ?></strong><br>
      Institución: <em><?php echo $f->inst_nombre; ?></em><br>
      Titulo recibido: <em><?php echo $f->tipotitulo_nombre; ?></em><br>
      Identificador: <em><?php if($f->docform_ident!= FALSE) { echo $f->docform_ident; } else{ echo 'N/A';} ?></em><br>
      Estatus: <?php if($f->docform_estatus > 0){?>
     <em><?php echo 'Validado' ?>
      <?php } else{ ?><?php echo 'No Validado' ?><?php }?>
    <small><a class="text-success" href="<?php echo base_url('rh/vudocenteformacion/' . $f->docform_id.'/'. $doc_id.'/'.$letra); ?>"
         title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Modificar</a></small>
	</em><br>
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

  <div class="panel panel-default" ng-app="caraca" ng-controller="cont">
    <div class="panel-heading" role="tab" id="headingNine">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
         Carga Académica </a>
         <select ng-init="anio.search = 2017" ng-model="anio.search" ng-selected="2017">
           <option value="2011">2011</option>
           <option value="2012">2012</option>
           <option value="2013">2013</option>
           <option value="2014">2014</option>
           <option value="2015">2015</option>
           <option value="2016">2016</option>
           <option value="2017">2017</option>
           <option value="2018">2018</option>
           <option value="2019">2019</option>
           <option value="2020">2020</option>
           <option value="2021">2021</option>
         </select>
      </h4>         
    </div>
    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
      <div class="panel-body">
        <div class="panel-body">
        <div class="container-fluid"><div class="row">
        <div class="col-md-4">
       <p ng-repeat="o in info | filter:{car_anio : anio.search}">
     
       <strong class="text-info">Carga Asignada</strong><br>
          Periodo: <em>{{o.tipoperi_periodo + ' ' + o.car_anio}}</em><br> 
          Área: <em>{{o.are_nombre}}</em><br>
          Grupo Tutorado: <em>{{o.car_grupo_tutorado}}</em><br>
          Total de Horas frente a grupo: <em>{{o.car_hrs_frente_grupo+' ' +'horas'}}</em><br>
          Total de Horas de estadia: <em>{{o.car_hrs_estadia+ ' ' + 'horas'}}</em><br>
          Total de Horas desarrollo material didactico: <em>{{o.car_hrs_desarrollo_mat_didactico+ ' ' + 'hrs'}}</em><br>
          Total de Horas de académia: <em>{{o.car_hrs_academia_ca+ ' ' + 'horas'}}</em><br>
          Total de Horas de apoyo académico: <em>{{o.car_hrs_apoyo_academ_admin+ ' ' + 'horas'}}</em><br>
          Horas total h/s/m:  <em>{{o.car_hrs_total_hsm+ ' ' + 'horas'}}</em><br>
          Entrega de reporte a Dirección: <em>{{o.car_entrega_pro_rep_direccion}}</em><br>
       
       </p> 
       </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>


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

  <script type="text/javascript"> 
      var datos = <?php echo $carga;?>;
      angular.module('caraca', [])
      .controller('cont',function($scope){
        $scope.info = datos;
          });
    </script>

</div>
</div>
</div>
</div>

