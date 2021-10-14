
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Cuerpo Académico</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Cuerpo Académico <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/crear/cuerpo_academico'); 
 
 $data = array(
'type'  => 'hidden',
'name'  => 'doc_id',
'id'    => 'doc_id'
);
echo form_input($data).'<br>';
       
$data = array(
'type'  => 'text',
'name'  => 'cue_nombre',
'id'    => 'cue_nombre',
'placeholder' => 'p.ej Calidad de Software',
'class' => 'form-control'
);
echo 'Nombre: '.form_input($data).'<br>';

$options= array();
foreach ($niveles as $nivel) 
{
$options[$nivel->tnh_id]= $nivel->tnh_descripcion;
}
echo 'Nivel de Habilitación'.form_dropdown('tnh_id', $options, '', 'class="form-control"').'<br>';

$options= array();
foreach ($carreras as $carrera)
{
$options[$carrera->carr_id]= $carrera->carr_nombre;
}
echo 'Carrera: '.form_dropdown('carr_id', $options, '', 'class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'        => 'Guardar',
'class'       => 'btn btn-success'
);
echo form_input($prop);
echo form_close(); ?>
</div>
</div>
</div>
</div>
