<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Contacto</h3>
<div class="col-md-4">

<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/cambiar/contacto/'. $conta[0]->con_id);  
		
$data = array(
'type'  => 'hidden',
'name'  => 'con_id',
'id'    => 'con_id',
'class'=>'form-control',
'value' => $conta[0]->con_id);
echo form_input($data);

$data = array(
'type'  => 'hidden',
'name'  => 'doc_id',
'id'    => 'doc_id',
'placeholder' => 'docente Id',
'class'=>'',
'value' => $conta[0]->doc_id);
echo form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'con_emailparti',
'id'    => 'con_emailparti',
'placeholder' => 'p.ej 123@gmail.com',
'class'=>'form-control',
'value' => $conta[0]->con_emailparti);
echo 'Correo Particular:'.form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'con_emailinsti',
'id'    => 'con_emailinsti',
'placeholder' => 'Email institucional',
'class'=>'form-control',
'value' =>$conta[0]->con_emailinsti);
echo 'Correo Institucional:'.form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'con_teleparti',
'id'    => 'con_teleparti;',
'placeholder' =>'Telefono particular',
'class'=>'form-control',
'value' => $conta[0]->con_teleparti);
echo 'Teléfono Particular:'.form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'con_teleinsti',
'id'    => 'con_teleinsti',
'placeholder' => 'Telefono institucional',
'class'=>'form-control',
'value' => $conta[0]->con_teleinsti);
echo 'Teléfono Institucional:'.form_input($data).'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar',
'class'       => 'btn btn-success');
echo form_input($prop);

echo form_close();?>
</div>
</div>
</div>
</div>