
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Docentes</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Docente <strong>NO</strong> existe en el <a href="<?php echo base_url(); ?>">Listado de Docentes</a>.<br>* <strong>TODOS</strong> los campos son obligatorios.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php if($this->session->flashdata('upload_error')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('upload_error') . '</small></div>';}?>
<?php echo form_open_multipart('cat/crear/docente');
	
$options= array();
foreach ($carreras as $carrera)
{
$options[$carrera->carr_id]= $carrera->carr_nombre;
}
echo 'Carrera de Adscripción: '.form_dropdown('carr_id', $options, '', 'class="form-control"').'<br>';

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

echo 'Fecha de Nacimiento: '.form_input($dato) . '<br>';

$dato = array(
'type'        => 'date',
'name'        => 'doc_fechain',
'id'          => 'doc_fechain',
'placeholder' => 'p.ej 2015-10-10',
'class'       => 'form-control'
);
echo 'Fecha de Inicio: '.form_input($dato). '<br>';

$dato = array(
'type'        => 'number',
'name'        => 'doc_numemp',
'id'          => 'doc_numemp',
'placeholder' => 'p.ej 125',
'class'       => 'form-control'
);

echo 'Núm. de Empleado: '.form_input($dato). '<br>';

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
echo 'Experiencia Laboral (Cantidad de años): '.form_input($dato). '<br>';

$options = array(
'1'         => 'Activo',
'0'         => 'Inactivo'
);
echo 'Estatus: '.form_dropdown('doc_estatus', $options, '', 'class="form-control"').'<br>';

$dato = array(
'type'        => 'email',
'name'        => 'con_emailparti',
'id'          => 'con_emailparti',
'placeholder' => 'p.ej lmontes@gmail.com',
'class'       => 'form-control'
);
echo 'Correo Particular:'.form_input($dato). '<br>';

$dato = array(
'type'        => 'email',
'name'        => 'con_emailinsti',
'id'          => 'con_emailinsti',
'placeholder' => 'p.ej lmontes@utzac.edu.mx',
'class'       => 'form-control'
);
echo 'Correo Institucional:'.form_input($dato). '<br>';

$dato = array(
'type'        => 'tel',
'maxlength'   => '10',
'name'        => 'con_teleparti',
'id'          => 'con_teleparti',
'placeholder' => 'p.ej 4921234567 ',
'class'       => 'form-control'
);
echo 'Teléfono Particular:'.form_input($dato). '<br>';

$dato = array(
'type'        => 'tel',
'maxlength'   => '10',
'name'        => 'con_teleinsti',
'id'          => 'con_teleinsti',
'placeholder' => 'p.ej 4921234567',
'class'       => 'form-control'
);
echo 'Teléfono Institucional (Red UTZAC):'.form_input($dato). '<br>';


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
