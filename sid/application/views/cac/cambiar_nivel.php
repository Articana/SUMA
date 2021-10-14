
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
  <!-- <h5 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Bienvenido <small></small></h5> -->
</div>
<!-- usar panel-body para texto y formularios -->
<div class="panel-body">
<h3>Nivel Académico</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/nivel/'. $nivels[0]->nivel_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'nivel_id',
'id'          => 'nivel_id',
'value' => $nivels[0]->nivel_id);
echo form_input($dato);

$dato = array(
'type'        => 'text',
'name'        => 'nivel_desc',
'id'          => 'nivel_desc',
'placeholder' => 'Nombre ',
'class'       => 'form-control',
'value' => $nivels[0]->nivel_desc);
echo 'Nombre : '.form_input($dato).'<br>';

$prop = array(
'type'      => 'submit',
'value'     => 'Guardar',
'class'     => 'btn btn-success');
echo form_input($prop);
echo form_close();?>
</div>
</div>
</div>
</div>