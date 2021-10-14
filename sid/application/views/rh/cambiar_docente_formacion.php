<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Formación de Docente</h3>
<div class="col-md-4">
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/cambiar/docform_rh/'.$docenteform[0]->docform_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'docform_id',
'id'          => 'docform_id',
'value'       => $docenteform[0]->docform_id
);
echo form_input($dato);

$dato = array(
'type'        => 'hidden',
'name'        => 'doc_id',
'id'          => 'doc_id',
'value'       => $doc_id[0]->doc_id
);
echo form_input($dato);

$data = array(
'type'  => 'hidden',
'name'  => 'letra',
'id'    => 'letra',
'value' => $letra);
echo form_input($data).'<br>';


$options = array(
'1'         => 'Validado',
'0'         => 'No Validado'
);
echo 'Estatus: '.form_dropdown('docform_estatus', $options, '', 'class="form-control"').'<br>';

$prop = array(
'type'      => 'submit',
'value'     => 'Guardar cambios',
'class'     => 'btn btn-success'
);
echo form_input($prop);

echo form_close();?>
</div>
</div>
</div>
</div>


