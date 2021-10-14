<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Información Personal</h3>
<div class="col-md-4">

<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<?php echo form_open('/cat/cambiar/docente_cac/'.$doc[0]->doc_id);

$dato = array(
'type'        => 'hidden',
'name'        => 'doc_id',
'id'          => 'doc_id',
'placeholder' => '',
'class'       => 'form-control',
'value'       =>$doc[0]->doc_id);
echo form_input($dato);

$options = array(
'1'         => 'Activo',
'0'         => 'Inactivo'
);
echo 'Estatus: '.form_dropdown('doc_estatus', $options, '', 'class="form-control"').'<br>';

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

