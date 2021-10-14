<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Contraseña</h3>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
	<?php 
		echo form_open('/cat/Cambiar/contrasena/'); 

	$data = array(
		'type'  => 'password',
		'name'  => 'usu_contrasena',
		'id'    => 'usu_contrasena',
		'placeholder' => 'Contraseña',
		'class' => 'form-control'
		);
		echo 'Nueva contraseña: '.form_input($data).'<br>';

	$prop = array(
	'type'        => 'submit',
	'value'       => 'Cambiar',
	'class'       => 'btn btn-success'
	);

	echo form_input($prop);
	echo form_close();
?>
</div>
</div>
</div>
</div>