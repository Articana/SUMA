
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Nivel Académico</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Nivel Académico <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/Crear/nivel/'); 

$data = array(
'type'  => 'text',
'name'  => 'nivel_desc',
'id'    => 'nivel_desc',
'placeholder' => 'p.ej TSU',
'class' => 'form-control'
);
echo form_input($data).'<br>';

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