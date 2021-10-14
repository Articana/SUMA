
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Usuarios</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Usuario <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php if($this->session->flashdata('carga_error')){ echo '<br><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Acción no Autorizada!</strong><small><p>' . $this->session->flashdata('carga_error') . '</p></small></div>';}?>

<?php echo form_open('cat/crear/usuario_dire');

$data = array(
'type'        => 'text',
'name'        => 'usu_nombre',
'id'          => 'usu_nombre',
'placeholder' => 'p.ej doc005',
'class'       => 'form-control'
);
echo 'Nombre de Usuario:'.form_input($data).'<br>';

$data = array(
'type'        => 'password',
'name'        => 'usu_contrasena',
'id'          => 'usu_contrasena',
'placeholder' => 'Escribe la Contraseña',
'class'       => 'form-control'
);

echo 'Contraseña:'.form_input($data).'<br>';

$options= array();
foreach ($resp as $docentes)
{
$options[$docentes->res_numemp]= $docentes->res_nombres.' '.$docentes->res_paterno.' '.$docentes->res_materno;
}
echo 'Nombre del Director:'.form_dropdown('res_numemp', $options,'', 'class="form-control"').'<br>';

$options = array(
'11'        => 'Director'   
);
echo 'Permiso de:'.form_dropdown('usu_permiso', $options, ' ','class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'        => 'Guardar Datos',
'class'       => 'btn btn-success'
);
echo form_input($prop);
echo form_close();
?>
</div>
</div>
</div>
</div>
