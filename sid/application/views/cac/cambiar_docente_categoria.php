
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Docente Categoría</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php echo form_open('/cat/cambiar/docente_categoria/'. $doccategorias[0]->doccat_id);
$dato = array(
'type'        => 'hidden',
'name'        => 'doccat_id',
'id'          => 'doccat_id',
'value' => $doccategorias[0]->doccat_id);
echo form_input($dato);

$opciones= array();
foreach ($categorias as $categoria) 
{
$opciones[$categoria->tipocat_id]= $categoria->tipocat_nombre;
}
echo ' Categoría: '.form_dropdown('tipocat_id', $opciones, '', 'class="form-control"').'<br>';

$opciones= array();
foreach ($nombramientos as $nombramiento)
{
$opciones[$nombramiento->tiponomb_id]= $nombramiento->tiponomb_nombre;
}
echo 'Nombramiento: '.form_dropdown('tiponomb_id', $opciones, '', 'class="form-control"').'<br>';
 
$dato = array(
'type'        => 'hidden',
'name'        => 'doc_id',
'id'          => 'doc_id',
'placeholder' => 'Docente',
'class'       => 'form-control',
'value' => $doccategorias[0]->doc_id);
echo form_input($dato);

$dato = array(
'type'        => 'date',
'name'        => 'doccat_fecha',
'id'          => 'doccat_fecha',
'placeholder' => 'Fecha ',
'class'       => 'form-control',
'value' => $doccategorias[0]->doccat_fecha
);
echo 'Fecha: '.form_input($dato).'<br>';

$prop = array(
'type'      => 'submit',
'value'     => 'Guardar',
'class'     => 'btn btn-success');

echo form_input($prop);
	echo form_close();
?>
</div>
</div>
</div>
</div>
