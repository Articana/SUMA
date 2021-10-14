
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Miembros de Academia</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Miembro <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('/cat/crear/academia_miembros'); 
$options= array();
foreach ($periodos as $periodo) 
{ 
$options[$periodo->tipoperi_id] = $periodo->tipoperi_periodo;
}
echo 'Periodo:'.form_dropdown('tipoperi_id', $options, '', 'class="form-control"').'<br>';
 
$options= array();
foreach ($academias as $academia)
{
$options[$academia->aca_id] = $academia->aca_nombre;
}
echo 'Nombre de la Academia:'.form_dropdown('aca_id', $options, '', 'class="form-control"').'<br>';

$options= array();
foreach ($docentes as $docente)
{
$options[$docente->doc_id] = $docente->doc_nombres.' '.$docente->doc_paterno.' '.$docente->doc_materno;
}
echo 'Nombre del Docente:'.form_dropdown('doc_id', $options, '', 'class="form-control"').'<br>';

$options = array(
'1'         => 'Activo',
'0'         => 'Inactivo'
);
echo 'Estatus: '.form_dropdown('aca_mie_estatus', $options, '', 'class="form-control"').'<br>';

$data = array(
'type'  => 'text',
'name'  => 'anio',
'id'    => 'anio',
'placeholder' => 'p.ej 2015',
'class' => 'form-control'
);
echo 'Año:'.form_input($data).'<br>';
$prop = array(
'type'        => 'submit',
'value'       => 'Guardar',
'class'       => 'btn btn-success'
);
echo form_input($prop);
echo form_close();?>

</div>
</div>
</div>
</div>