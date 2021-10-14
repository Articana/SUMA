
<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Cuerpo Académico</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/cuerpo_academico/'. $cuerpoaca[0]->cue_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'cue_id',
'id'          => 'cue_id',
'value' => $cuerpoaca[0]->cue_id);
echo form_input($dato);

$dato = array(
                'type'        => 'text',
                'name'        => 'cue_nombre',
                'id'          => 'cue_nombre',
                'placeholder' => 'Nombre ',
                'class'       => 'form-control',
                'value' => $cuerpoaca[0]->cue_nombre
                );
 echo 'Nombre : '.form_input($dato).'<br>';


$opciones= array();
foreach ($niveles as $nivel) 
{
$opciones[$nivel->tnh_id]= $nivel->tnh_descripcion;
}
echo 'Nivel de Habilitación: '.form_dropdown('tnh_id', $opciones, '', 'class="form-control"').'<br>';

$opciones= array();
foreach ($carreras as $carrera) 
{
$opciones[$carrera->carr_id]= $carrera->carr_nombre;
}
echo 'Carrera Nombre: '.form_dropdown('carr_id', $opciones, '', 'class="form-control"').'<br>';
	$prop = array(
		'type'      => 'submit',
		'value'     => 'Guardar',
		'class'     => 'btn btn-success'
		);

	echo form_input($prop);
	echo form_close();
?>
</div>
</div>
</div>
</div>
