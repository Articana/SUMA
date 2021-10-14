
<div class="container">
<div class="panel panel-default">
 <div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Miembros de Academia</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/academia_miembros/'. $acamiembros[0]->aca_mie_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'aca_mie_id',
'id'          => 'aca_mie_id',
'value' => $acamiembros[0]->aca_mie_id);
echo form_input($dato);

$opciones= array();
foreach ($periodos as $periodo) 
{
$opciones[$periodo->tipoperi_id]= $periodo->tipoperi_periodo;
}
echo 'Periodo: '.form_dropdown('tipoperi_id', $opciones, '', 'class="form-control"').'<br>';

$opciones= array();
foreach ($academias as $academia)
{
$opciones[$academia->aca_id]= $academia->aca_nombre;
}
echo 'Academia Nombre: '.form_dropdown('aca_id', $opciones, '', 'class="form-control"').'<br>';
 

	$dato = array(
		'type'        => 'hidden',
		'name'        => 'doc_id',
		'id'          => 'doc_id',
		'placeholder' => 'Docente',
		'class'       => 'form-control',
		'value' => $acamiembros[0]->doc_id
		);
	echo form_input($dato);

	$dato = array(
		'type'        => 'text',
		'name'        => 'anio',
		'id'          => 'anio',
		'placeholder' => 'Año',
		'class'       => 'form-control',
		'class'=>'form-control', 
		'value' => $acamiembros[0]->anio
		);
	echo 'Año: '.form_input($dato).'<br>';
        

	 $options = array(
		'1'         => 'Activo',
		'0'         => 'Inactivo'
		);
		echo 'Estatus: '.form_dropdown('aca_mie_estatus', $options, $acamiembros[0]->aca_mie_estatus, 'class="form-control"').'<br>';
 

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
