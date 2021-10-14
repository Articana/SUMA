<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Estados</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/estado/'. $estad[0]->est_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'est_id',
'id'          => 'est_id',
'value' => $estad[0]->est_id);
echo form_input($dato);

$dato = array(
'type'        => 'text',
'name'        => 'est_nombre',
'id'          => 'est_nombre',
'placeholder' => 'Nombre ',
'class'       => 'form-control',
'value' => $estad[0]->est_nombre);
echo 'Nombre : '.form_input($dato).'<br>';

$dato = array(
'type'        => 'text',
'name'        => 'est_codigo',
'id'          => 'est_codigo',
'placeholder' => 'Código ',
'class'       => 'form-control',
'value' => $estad[0]->est_codigo );
echo 'Código : '.form_input($dato).'<br>';

$prop = array(
'type'      => 'submit',
'value'       => 'Guardar',
'class'     => 'btn btn-success');
echo form_input($prop);
echo form_close();?>
</div>
</div>
</div>
</div>
