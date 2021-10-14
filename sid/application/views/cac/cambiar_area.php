
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Áreas</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('cat/cambiar/area/'.$are[0]->are_id);

$data = array(
'type'        => 'hidden',
'name'        => 'are_id',
'id'          => 'are_id',
'class'       => 'form-control',
'value'       =>$are[0]->are_id
);
echo form_input($data).'<br>';

$data = array(
'type'        => 'text',
'name'        => 'are_nombre',
'id'          => 'are_nombre',
'placeholder' => 'Escribe el nombre',
'class'       => 'form-control',
'value'       =>$are[0]->are_nombre
);
echo 'Nombre:'.form_input($data).'<br>';


$prop = array(
'type'        => 'submit',
'value'        => 'Guardar Datos',
'class'       => 'btn btn-success'
);
echo form_input($prop);
echo form_close();?>
</div>
</div>
</div>
</div>