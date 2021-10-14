<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Formación de Docente</h3>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/cambiar/docente_formacion/'.$docenteform[0]->docform_id);

$dato = array(
'type'        => 'hidden',
'name'        => 'docform_id',
'id'          => 'docform_id',
'value'       => $docenteform[0]->docform_id
);
echo form_input($dato);

$dato = array(
'type'        => 'hidden',
'name'        => 'doc_id',
'id'          => 'doc_id',
'value'       => $doc_id[0]->doc_id
);
echo form_input($dato);

$opciones= array();
foreach ($instituciones as $institucion) 
{
$opciones[$institucion->inst_id]= $institucion->inst_nombre;
}
echo 'Institución:  '. form_dropdown('inst_id', $opciones, $docenteform[0]->inst_id, 'class="form-control"').'<br>';

$opciones= array();
foreach ($tformaciones as $tformacion) 
{
$opciones[$tformacion->tipoform_id]= $tformacion->tipoform_nombre;
}
echo 'Tipo de Formación: '.form_dropdown('tipoform_id', $opciones, $docenteform[0]->tipoform_id, 'class="form-control"').'<br>';

$opciones= array();
foreach ($ttitulos as $ttitulo)
{
$opciones[$ttitulo->tipotitulo_id] = $ttitulo->tipotitulo_nombre;
}
echo 'Título Obtenido: '.form_dropdown('tipotitulo_id', $opciones, $docenteform[0]->tipotitulo_id, 'class="form-control"').'<br>';

$opciones= array();
foreach ($tmodalidades as $tmodalidad) 
{
$opciones[$tmodalidad->tmf_id] = $tmodalidad->tmf_descripcion; 
}
echo 'Modalidad de Formación: ' . form_dropdown('tmf_id', $opciones, $docenteform[0]->tmf_id, 'class="form-control"').'<br>';

$dato = array(
'type'        => 'text',
'name'        => 'docform_rama',
'id'          => 'docform_rama',
'placeholder' => 'p.ej Negocios',
'class'       => 'form-control',
'value'       => $docenteform[0]->docform_rama);
echo 'Rama: '.form_input($dato).'<br>';

$dato = array(
'type'        => 'text',
'name'        => 'docform_ident',
'id'          => 'docform_ident',
'placeholder' => 'p.ej cédula o id de certificado',
'class'       => 'form-control',
'maxlength'   =>'32',
'value'       => $docenteform[0]->docform_ident);
echo 'Identificador (<small>puede estar vacío</small>): '.form_input($dato).'<br>';

$dato = array(
'type'        => 'date',
'name'        => 'docform_fechaing',
'id'          => 'docform_fechaing',
'placeholder' => 'p.ej 2012-10-12',
'class'       => 'form-control',
'value'       => $docenteform[0]->docform_fechaing);
echo 'Fecha de Ingreso (aaaa-mm-dd): '.form_input($dato).'<br>';

$dato = array(
'type'        => 'date',
'name'        => 'docform_fechaeg',
'id'          => 'docform_fechaeg',
'placeholder' => 'p.ej 2015-10-15',
'class'       => 'form-control',
'value'       => $docenteform[0]->docform_fechaeg);
echo 'Fecha de Egreso(aaaa-mm-dd): '.form_input($dato).'<br>';

$prop = array(
'type'      => 'submit',
'value'     => 'Guardar cambios',
'class'     => 'btn btn-success'
);
echo form_input($prop);

echo form_close();?>
</div>
</div>
</div>
</div>
