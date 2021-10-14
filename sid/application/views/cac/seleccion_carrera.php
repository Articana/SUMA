<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Carreras</h3>
<div class="col-md-4">
<?php 
$attr = array('target' => '_blank');
echo form_open('Pdf/listado', $attr); 

$options= array();
foreach ($carreras as $carr)
{
$options[$carr->carr_id]= $carr->carr_nombre;
}
echo 'Nombre de la Carrera :'. form_dropdown('carr_id', $options, '','class="form-control"').'<br>';

$prop = array(
'type'        => 'submit',
'value'       => 'Continuar',
'class'       => 'btn btn-success'
);
echo form_input($prop);

echo form_close();
?>
</div>
</div>
</div>
</div>
