
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Miembros de Cuerpo Académico</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Miembro <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/crear/cuerpo_academico_miembros'); 
   
$options= array();
foreach ($miembros as $miembro)
{
$options[$miembro->cue_id]= $miembro->cue_nombre;
}
echo 'Cuerpo Académico:'.form_dropdown('cue_id', $options, '', 'class="form-control"').'<br>';

$options= array();
foreach ($docente as $docentes)
{
$options[$docentes->doc_id]= $docentes->doc_nombres.' '.$docentes->doc_paterno.' '.$docentes->doc_materno;
}
echo 'Nombre del Docente:'.form_dropdown('doc_id', $options,'', 'class="form-control"').'<br>';

$options= array();
foreach ($tipos_miembros as $tipo_miembro)
{
$options[$tipo_miembro->tmc_id]= $tipo_miembro->tmc_tipomiembro;
}
echo 'Tipo de Miembro:'.form_dropdown('tmc_id', $options, '', 'class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar',
'class'       => 'btn btn-success'
);
echo form_input($prop);

echo form_close();
?>

</div>
</div>
</div>
</div>