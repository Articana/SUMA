<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Plan Educativo</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que la Academia <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/Cambiar/carrera/'. $carr_id);  
		
$data = array(
'type'  => 'hidden',
'name'  => 'carr_id',
'id'    => 'carr_id',
'placeholder' => ' Carrera Id',
'class'=>'form-control',
'value' => $carr_id
);
echo form_input($data);

$data = array(
'type'  => 'text',
'name'  => 'carr_nombre',
'id'    => 'carr_nombre',
'placeholder' => 'Nombre Carrera',
'class'=>'form-control',
'value' => $carr_nombre
);
echo 'Nombre del Plan Educativo:'.form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'carr_abreviatura',
'id'    => 'carr_abreviatura',
'placeholder' => 'Abreviatura de la carrera',
'class'=>'form-control',
'value' => $carr_abreviatura
);
echo 'Abreviatura:'.form_input($data).'<br>';

$options= array();
foreach ($resp as $docente)
{
$options[$docente->res_id]= $docente->res_nombres.' '.$docente->res_paterno. ' '.$docente->res_materno;
}
echo 'Responsable de Plan Educativo: '.form_dropdown('res_id', $options, '', 'class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar',
'class'       => 'btn btn-success'
);
echo form_input($prop);

echo form_close();?>
</div>
</div>
</div>
</div>
