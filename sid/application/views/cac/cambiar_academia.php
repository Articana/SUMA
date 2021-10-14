<div class="container">
<div class="panel panel-default">
 <div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Academias</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que la Academia <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/Cambiar/academia/'. $aca_id);  
		
$dato = array(
'type'  => 'hidden',
'name'  => 'aca_id',
'id'    => 'aca_id',
'class'=>'form-control',
'value' => $aca_id
);
echo form_input($dato);

$dato = array(
'type'  => 'text',
'name'  => 'aca_nombre',
'id'    => 'aca_nombre',
'placeholder' => 'nombre academia',
'class'=>'form-control',
'value' => $aca_nombre
 );
		
echo 'Nombre de Academia:'.form_input($dato).'<br>';

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
