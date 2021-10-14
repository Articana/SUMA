
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Tipo de Periodo</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que el Periodo <strong>NO</strong> existe en el listado.</small></p>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('cat/crear/tipo_periodo');

$dato = array(
'type'        => 'text',
'name'        => 'tipoperi_periodo',
'id'          => 'tipoperi_periodo',
'placeholder' => 'Periodo',
'class'       => 'form-control'
);

echo 'Periodo: '.form_input($dato).'<br>';

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