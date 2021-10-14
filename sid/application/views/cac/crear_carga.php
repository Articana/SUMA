<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3> Carga Académica</h3>
<?php if($this->session->flashdata('validation_errors')){ echo '<br><div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Información</strong><small>' . $this->session->flashdata('validation_errors') . '</small></div>';}?>
<div class="col-md-4"> 

<?php echo form_open('/cat/crear/carga'); 
   
$data = array(
'type'  => 'hidden',
'name'  => 'doc_id',
'id'    => 'doc_id',
'value' => $doc_id);
echo form_input($data).'<br>';

$data = array(
'type'  => 'hidden',
'name'  => 'letra',
'id'    => 'letra',
'value' => $letra);
echo form_input($data).'<br>';


$options= array();
foreach ($periodos as $periodo)
{
$options[$periodo->tipoperi_id]= $periodo->tipoperi_periodo;
}
echo 'Periodo :'. form_dropdown('tipoperi_id', $options, '','class="form-control"').'<br>';

$options = array(
'2011'         => '2011',
'2012'         => '2012',
'2013'         => '2013',
'2014'         => '2014',
'2015'         => '2015',
'2016'         => '2016',
'2017'         => '2017',
'2018'         => '2018',
'2019'         => '2019',
'2020'         => '2020',
'2021'         => '2021'

);
echo 'Año:'.form_dropdown('car_anio', $options, '','class="form-control"').'<br>';


$options= array();
foreach ($areas as $area)
{
$options[$area->are_id]= $area->are_nombre;

}
echo 'Área :'. form_dropdown('are_id', $options, '','class="form-control"').'<br>';

$data = array(
'type'  => 'text',
'name'  => 'car_grupo_tutorado',
'id'    => 'car_grupo_tutorado',
'placeholder' => 'p.ej 2 A turno vespertino',
'class' => 'form-control');
echo 'Grupo tutorado: '.form_input($data).'<br>';


$data = array(
'type'  => 'text',
'name'  => 'car_hrs_frente_grupo',
'id'    => 'car_hrs_frente_grupo',
'placeholder' => 'p.ej 5',
'class' => 'form-control');
echo 'Total de Horas frente a grupo: '.form_input($data).'<br>';


$data = array(
'type'  => 'text',
'name'  => 'car_hrs_estadia',
'id'    => 'car_hrs_estadia',
'placeholder' => 'p. ej 2',
'class' => 'form-control');
echo 'Total de Horas de estadía: '.form_input($data).'<br>';


             
$data = array(
'type'  => 'text',
'name'  => 'car_hrs_desarrollo_mat_didactico',
'id'    => 'car_hrs_desarrollo_mat_didactico',
'placeholder' => 'p.ej 4',
'class' => 'form-control');
echo 'Total de Horas desarrollo material didáctico: '.form_input($data).'<br>';

             
$data = array(
'type'  => 'text',
'name'  => 'car_hrs_academia_ca',
'id'    => 'car_hrs_academia_ca',
'placeholder' => 'p.ej 1',
'class' => 'form-control');
echo 'Total de Horas de academia:'.form_input($data).'<br>';
    
$data = array(
'type'  => 'text',
'name'  => 'car_hrs_apoyo_academ_admin',
'id'    => 'car_hrs_apoyo_academ_admin',
'placeholder' => 'p. ej 5 ',
'class' => 'form-control');
echo 'Total de Horas de apoyo académico '.form_input($data).'<br>';

$data = array(
'type'  => 'text',
'name'  => 'car_hrs_total_hsm',
'id'    => 'car_hrs_total_hsm',
'placeholder' => 'p.ej 31',
'class' => 'form-control');
echo 'Horas total h/s/m: '.form_input($data).'<br>';

$data = array(
'type'  => 'date',
'name'  => 'car_entrega_pro_rep_direccion',
'id'    => 'car_entrega_pro_rep_direccion',
'placeholder' => 'p. ej 2015-12-10',
'class' => 'form-control');
echo 'Fecha de entrega de reporte a Dirección: '.form_input($data).'<br>';  
    

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


