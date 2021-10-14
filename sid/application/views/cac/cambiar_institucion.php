<div class="container">
<div class="panel panel-default">
 <div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Institución</h3>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('cat/cambiar/institucion/'.$institucion[0]->inst_id);

$dato = array(
'type'        => 'hidden',
'name'        => 'inst_id',
'id'          => 'inst_id',
'class'       => 'form-control',
'value'       =>$institucion[0]->inst_id
	        );
echo form_input($dato);

$dato = array(
'type'        => 'text',
'name'        => 'inst_nombre',
'id'          => 'inst_nombre',
'placeholder' => 'Nombre de la Institución',
'class'       => 'form-control',
'value'       =>$institucion[0]->inst_nombre);
echo 'Nombre:'.form_input($dato).'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Cambiar',
'class'       => 'btn btn-success');
echo form_input($prop);
	echo form_close();
?>
</div>
</div>
</div>
</div>