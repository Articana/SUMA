
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Municipios</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/municipio/'. $mun[0]->mun_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'mun_id',
'id'          => 'mun_id',
'value' => $mun[0]->mun_id);
echo form_input($dato);

$dato = array(
'type'        => 'text',
'name'        => 'mun_nombre',
'id'          => 'mun_nombre',
'placeholder' => 'Nombre ',
'class'       => 'form-control',
'value' => $mun[0]->mun_nombre);
echo 'Nombre : '.form_input($dato).'<br>';

$opciones= array();
foreach ($estados as $estado) 
{
$opciones[$estado->est_id]= $estado->est_nombre;
}
echo ' Estado: '.form_dropdown('est_id', $opciones, '', 'class="form-control"').'<br>';

$prop = array(
'type'      => 'submit',
'value'     => 'Guardar',
'class'     => 'btn btn-success');
echo form_input($prop);
echo form_close();?>
</div>
</div>
</div>
</div>
