<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<title>Sistema de Información Docente | Registro Docente</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
	<div>&nbsp;</div>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading" id="panel_principal"></div>
			<div class="panel-body">
				<h3>Registro de Docentes</h3>
				<p><small>* <strong>TODOS</strong> los campos son obligatorios.</small></p>
				<div class="col-md-4">
				<?php if( $this->session->flashdata('validation_errors') ) { echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
					
					<?php echo form_open_multipart('registro/docente');
					$options= array();
					foreach ($carreras as $carrera)
					{
						$options[$carrera->carr_id]= $carrera->carr_nombre;
					}
					echo 'Carrera de Adscripción: '.form_dropdown('carr_id', $options, '', 'class="form-control"') . '<br>';

					$dato = array(
					'type'        => 'text',
					'name'        => 'doc_nombres',
					'id'          => 'doc_nombres',
					'placeholder' => 'p.ej Luis',
					'class'       => 'form-control'
					);
					echo 'Nombre(s): '.form_input($dato). '<br>';

					$dato = array(
					'type'        => 'text',
					'name'        => 'doc_paterno',
					'id'          => 'doc_paterno',
					'placeholder' => 'p.j Montes',
					'class'       => 'form-control'
					);
					echo 'Ap. Paterno: '.form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'text',
					'name'        => 'doc_materno',
					'id'          => 'doc_materno',
					'placeholder' => 'p.ej Chávez',
					'class'       => 'form-control'
					);
					echo 'Ap. Materno: '.form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'date',
					'name'        => 'doc_fechanac',
					'id'          => 'doc_fechanac',
					'placeholder' => 'p.ej 2015-10-10',
					'class'       => 'form-control'
					);

					echo 'Fecha de Nacimiento: ' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'date',
					'name'        => 'doc_fechain',
					'id'          => 'doc_fechain',
					'placeholder' => 'p.ej 2015-10-10',
					'class'       => 'form-control'
					);
					echo 'Fecha de Inicio: ' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'number',
					'name'        => 'doc_numemp',
					'id'          => 'doc_numemp',
					'placeholder' => 'p.ej 125',
					'class'       => 'form-control'
					);

					echo 'Núm. de Empleado: ' . form_input($dato) . '<br>';

					$prop = array('name' => 'doc_fotografia', 'type' => 'file');
					echo 'Fotografía: (JPG/JPEG max. 2 MB)' . form_input($prop) . '<br>';

					$dato = array(
					'type'        => 'number',
					'name'        => 'doc_explab',
					'id'          => 'doc_explab',
					'max'         => '50',
					'min'         => '1',
					'placeholder' => 'p.ej 1',
					'class'       => 'form-control'
					);
					echo 'Experiencia Laboral (Cantidad de años): ' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'hidden',
					'name'        => 'doc_estatus',
					'id'          => 'doc_estatus',
					'placeholder' => 'Docente',
					'class'       => 'form-control',
					'value' => '1'
					);
					echo form_input($dato);

					$dato = array(
					'type'        => 'email',
					'name'        => 'con_emailparti',
					'id'          => 'con_emailparti',
					'placeholder' => 'p.ej lmontes@gmail.com',
					'class'       => 'form-control'
					);
					echo 'Correo Particular:' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'email',
					'name'        => 'con_emailinsti',
					'id'          => 'con_emailinsti',
					'placeholder' => 'p.ej lmontes@utzac.edu.mx',
					'class'       => 'form-control'
					);
					echo 'Correo Institucional:' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'tel',
					'maxlength'   => '10',
					'name'        => 'con_teleparti',
					'id'          => 'con_teleparti',
					'placeholder' => 'p.ej 4921234567 ',
					'class'       => 'form-control'
					);
					echo 'Teléfono Particular:' . form_input($dato) . '<br>';

					$dato = array(
					'type'        => 'tel',
					'maxlength'   => '10',
					'name'        => 'con_teleinsti',
					'id'          => 'con_teleinsti',
					'placeholder' => 'p.ej 4921234567',
					'class'       => 'form-control'
					);
					echo 'Teléfono Institucional (Red UTZAC):' . form_input($dato) . '<br>';
                    ?>
                    <div class="g-recaptcha" data-sitekey="6LcWPb4aAAAAAGXhDBLRqYL-Xw2ZFok9Mo_eSjY-"></div>
                    <br>
                    <?php
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

	<!--<div style="height:64px;">&nbsp;</div>-->
	<footer class="footer">
		<p class="text-right"><small>Sistema de Información Docente - SID beta 2017 | SID 1.0.0 2021.</small></p>
	</footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
