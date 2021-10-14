
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Directores</h3>
<div class="col-md-4">

<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('/cat/cambiar/director/'.$resps[0]->res_id);

$dato = array(
'type'        => 'hidden',
'name'        => 'res_id',
'id'          => 'res_id',
'placeholder' => '',
'class'       => 'form-control',
'value'       =>$resps[0]->res_id);
echo form_input($dato);

$dato = array(
'type'        => 'hidden',
'name'        => 'usu_id',
'id'          => 'usu_id',
'placeholder' => '',
'class'       => 'form-control',
'value'       =>$resps[0]->usu_id);
echo form_input($dato);


$dato = array(
'type'        => 'text',
'name'        => 'res_nombres',
'id'          => 'res_nombres',
'placeholder' => 'p.ej  Juan',
'class'       => 'form-control',
'value'       =>$resps[0]->res_nombres);
echo 'Nombre(s): '.form_input($dato).'<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_paterno',
'id'          => 'res_paterno',
'placeholder' => 'p. ej Torres',
'class'       => 'form-control',
'value'       =>$resps[0]->res_paterno);
echo 'Ap. Paterno:'.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_materno',
'id'          => 'res_materno',
'placeholder' => 'p.ej Flores',
'class'       => 'form-control',
'value'       =>$resps[0]->res_materno);
echo 'Ap. Materno: '.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'res_numemp',
'id'          => 'res_numemp',
'placeholder' => 'p.ej 789',
'class'       => 'form-control',
'value'       =>$resps[0]->res_numemp
);
echo 'Número de Empleado: '.form_input($dato). '<br>';

$dato = array(
'type'        => 'text',
'name'        => 'usu_nombre',
'id'          => 'usu_nombre',
'placeholder' => 'p.ej 789',
'class'       => 'form-control',
'value'       =>$resps[0]->usu_nombre
);
echo 'Nombre de Usuario: '.form_input($dato). '<br>';


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
