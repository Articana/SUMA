<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Municipio</h3>
<p><small>* Por favor verifique que el Municipio <strong>NO</strong> existe en el listado.</small></p>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
	<?php echo form_open('/cat/Crear/municipio/'); 

$data = array(
'type'  => 'text',
'name'  => 'mun_nombre',
'id'    => 'mun_nombre',
'placeholder' => 'Nombre del municipio',
'class' => 'form-control');
echo 'Nombre: '.form_input($data).'<br>';

$options= array();
foreach ($estados as $estado)
{
$options[$estado->est_id]= $estado->est_nombre;
}
echo 'Estado: '.form_dropdown('est_id', $options, '', 'class="form-control"').'<br>'.'<br>';


$prop = array(
'type'        => 'submit',
'value'       => 'Guardar',
'class'       => 'btn btn-success');

echo form_input($prop);
echo form_close();
?>
</div>
</div>
</div>
</div>