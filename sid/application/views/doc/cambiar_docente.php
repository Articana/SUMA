<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Información Personal</h3>
<div class="col-md-4">

<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('/cat/cambiar/docente/'.$doc[0]->doc_id);

$dato = array(
'type'        => 'hidden',
'name'        => 'doc_id',
'id'          => 'doc_id',
'placeholder' => '',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_id);
echo form_input($dato);

$dato = array(
'type'        => 'text',
'name'        => 'doc_nombres',
'id'          => 'doc_nombres',
'placeholder' => 'p.ej  Juan',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_nombres);
echo 'Nombre(s): '.form_input($dato).'<br>';

$dato = array(
'type'        => 'text',
'name'        => 'doc_paterno',
'id'          => 'doc_paterno',
'placeholder' => 'p. ej Torres',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_paterno);
echo 'Ap. Paterno:'.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'doc_materno',
'id'          => 'doc_materno',
'placeholder' => 'p.ej Flores',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_materno);
echo 'Ap. Materno: '.form_input($dato). '<br>';

$dato = array(
'type'        => 'date',
'name'        => 'doc_fechanac',
'id'          => 'doc_fechanac',
'placeholder' => '2015-10-18',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_fechanac
);
echo 'Fecha de Nacimiento (aaaa-mm-dd): '.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'doc_numemp',
'id'          => 'doc_numemp',
'placeholder' => 'p.ej 789',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_numemp
);
echo 'Número de Empleado: '.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'doc_explab',
'id'          => 'doc_explab',
'placeholder' => 'p.ej 1',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_explab);
echo 'Experiencia: '.form_input($dato). '<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar Cambios',
'class'       => 'btn btn-success'
);
echo form_input($prop);
echo form_close();?>

</div>
</div>
</div>
</div>
