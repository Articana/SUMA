
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Usuarios</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Usuario <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/Cambiar/usuario/'.$usu[0]->usu_id); 

$data = array(
'type'        => 'hidden',
'name'        => 'usu_id',
'id'          => 'usu_id',
'class'       => 'form-control',
'value'	      => $usu[0]->usu_id
);

echo ''.form_input($data).'<br>';

$data = array(
'type'        => 'text',
'name'        => 'usu_nombre',
'id'          => 'usu_nombre',
'placeholder' => 'Escribe el nombre',
'class'       => 'form-control',
'value'       => $usu[0]->usu_nombre
);
echo 'Nombre:'.form_input($data).'<br>';

$data = array(
'type'        => 'text',
'name'        => 'usu_contrasena',
'id'          => 'usu_contrasena',
'placeholder' => 'Escribe la Contraseña',
'class'       => 'form-control',
'value'       => $usu[0]->usu_contrasena );

echo 'Contraseña:'.form_input($data).'<br>';

$options = array(
'3'         => 'Rectoría',
'9'        => 'RH',
'5'         => 'Coordinación');
echo 'Permiso de:'.form_dropdown('usu_permiso', $options, ' ','class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar Datos',
'class'       => 'btn btn-success');
echo form_input($prop);
echo form_close(); ?>
</div>
</div>
</div>
</div>