<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Domicilio</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4">
<?php 
echo form_open('/cat/crear/domicilio'); 

$data = array(
    'type'          => 'hidden',
    'name'          => 'doc_id',
    'id'            => 'doc_id',
    'value'         => $docente[0]->doc_id
);
echo form_input($data);

$data = array(
    'type'          => 'text',
    'name'          => 'dom_calle',
    'id'            => 'dom_calle',
    'placeholder'   => 'p.ej. Av. 5 de Mayo',
    'class'         => 'form-control'
);
echo 'Calle: ' . form_input($data) . '<br>';

$data = array(
    'type'          => 'text',
    'name'          => 'dom_numero',
    'id'            => 'dom_numero',
    'placeholder'   => 'p.ej. 123',
    'class'         => 'form-control'
);
echo 'Número: ' . form_input($data) . '<br>';

$data = array(
    'type'          => 'text',
    'name'          => 'dom_postal',
    'id'            => 'dom_postal',
    'placeholder'   => 'p.ej. 98000',
    'class'         => 'form-control'
);

echo 'Código postal: ' . form_input($data) . '<br>';

$options= array();
foreach ($municipios as $municipio)
{
    $options[$municipio->mun_id]= $municipio->mun_nombre;
}
echo 'Municipio: ' . form_dropdown('mun_id', $options, '', 'class="form-control"') . '<br>';
    

$data = array(
    'type'          => 'text',
    'name'          => 'dom_fraccionamiento',
    'id'            => 'dom_fraccionamiento',
    'placeholder'   => 'p.ej. Colonia Centro',
    'class'         => 'form-control'
);
echo 'Fraccionamiento: ' . form_input($data) . '<br>';

$prop = array(
    'type'      => 'submit',
    'value'     => 'Guardar',
    'class'     => 'btn btn-success'
);
echo form_input($prop);

echo form_close();
?>
</div>
</div>
</div>
</div>