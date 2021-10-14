<body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container">
<div class="col-md-4 col-md-offset-4">
<div class="page-header">
<h1><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;SID <small>acceso</small></h1>
</div>
<?php
	echo form_open(base_url() . 'sec/validar');

	$prop = array(
		'type'  		=> 'text',
		'name'  		=> 'usuario',
		'id'    		=> 'usuario',
		'placeholder' 	=> 'Nombre de Usuario',
		'class' 		=> 'form-control',
		'maxlength'		=> '8'
	);
	echo form_input($prop) . '<br>';

	$prop = array(
		'type'  		=> 'password',
		'name'  		=> 'secreto',
		'id'    		=> 'secreto',
		'placeholder' 	=> 'Contraseña',
		'class' 		=> 'form-control',
		'maxlength'		=> '8'
	);
	echo form_input($prop) . '<br>';
	?>
	<div class="g-recaptcha" data-sitekey="6LcWPb4aAAAAAGXhDBLRqYL-Xw2ZFok9Mo_eSjY-"></div>
	<br>
	<?php
	$prop = array(
		'type'  		=> 'submit',
		'value'		 	=> 'Ingresar',
		'class' 		=> 'form-control btn btn-success'
	);
	echo form_input($prop);

	echo form_close();
?>
<br>
<p class="text-left"><small>¿Problemas para ingresar? Contactanos en: <a class="text-success" href="mailto:cds@utzac.edu.mx?Subject=Soporte%20SID">cds@utzac.edu.mx</a></small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php if($this->session->flashdata('access_error')){ echo '<br><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Acceso no autorizado</strong><small><p>' . $this->session->flashdata('access_error') . '</p></small></div>';}?>
</div>
</div>
