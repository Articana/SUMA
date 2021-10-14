
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Docente Categoría</h3>
<div class="col-md-4">
<p><small>* Por favor verifique que la Categoría <strong>NO</strong> existe en el listado.</small></p>

<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>

<?php echo form_open('/cat/crear/docente_categoria'); 



$data = array(
'type'  => 'hidden',
'name'  => 'doc_id',
'id'    => 'doc_id',
'value' =>$doc_id
);
echo form_input($data).'<br>';

$data = array(
'type'  => 'hidden',
'name'  => 'letra',
'id'    => 'letra',
'value' =>$letra
);
echo form_input($data).'<br>';

$options= array();
foreach ($nombramientos as $nombramiento)
{
$options[$nombramiento->tiponomb_id]= $nombramiento->tiponomb_nombre;
}
echo ' Tipo Nombramiento: '.form_dropdown('tiponomb_id', $options,'','class="form-control"').'<br>';

$options= array();
foreach ($categorias as $categoria) 
{
$options[$categoria->tipocat_id]= $categoria->tipocat_nombre;
}
echo ' Tipo Categoria: '. form_dropdown('tipocat_id', $options,'','class="form-control"').'<br>';


$data = array(
'type'  => 'date',
'name'  => 'doccat_fecha',
'placeholder' => 'p. ej 2015-10-12',
'class' => 'form-control'
);
echo 'Fecha:'.form_input($data).'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Guardar ',
'class'       => 'btn btn-success'
);
echo form_input($prop);

echo form_close();
?>

</div>
</div>
</div>
</div>
