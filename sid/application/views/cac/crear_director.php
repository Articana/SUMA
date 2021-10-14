
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Directores</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Director <strong>NO</strong> existe en el <a href="<?php echo base_url('cac/vrdirector'); ?>">Listado de Directores</a>.<br>* <strong>TODOS</strong> los campos son obligatorios.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php if($this->session->flashdata('upload_error')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('upload_error') . '</small></div>';}?>
<?php echo form_open_multipart('cat/crear/director');
	

$dato = array(
'type'        => 'text',
'name'        => 'res_nombres',
'id'          => 'res_nombres',
'placeholder' => 'p.ej Tirzo Noel',
'class'       => 'form-control'
);
echo 'Nombre(s): '.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_paterno',
'id'          => 'res_paterno',
'placeholder' => 'p.j Pacheco',
'class'       => 'form-control'
);
echo 'Ap. Paterno: '.form_input($dato) . '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_materno',
'id'          => 'res_materno',
'placeholder' => 'p.ej Delgado',
'class'       => 'form-control'
);
echo 'Ap. Materno: '.form_input($dato) . '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_numemp',
'id'          => 'res_numemp',
'placeholder' => 'p.ej 176',
'class'       => 'form-control'
);

echo 'Núm. de Empleado: '.form_input($dato). '<br>';


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
