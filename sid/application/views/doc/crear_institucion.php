<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Institución</h3>
<p><small>* Por favor verifique que la Institución <strong>NO</strong> existe en el listado de la Formación Académica.</small></p>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('cat/Crear/institucion');
echo 'Nombre de la Institución: <br>';

$dato = array(
'type'        => 'text',
'name'        => 'inst_nombre',
'id'          => 'inst_nombre',
'placeholder' => 'p.ej. Universidad Tecnológica del Estado de Zacatecas',
'class'       => 'form-control'
);

echo form_input($dato) . '<br>';
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
