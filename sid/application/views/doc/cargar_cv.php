<div style="padding:24px;">&nbsp;</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Cargar Currículum Vitae</h3>
<p><small>IMPORTANTE: Si ya cargaste un CV, este será reemplazado.</small></p>
<p><small>Pulsa el siguiente botón para seleccionar un archivo(Únicamente archivos con extensión PDF):</small></p>
<div class="col-md-4">
<?php if($this->session->flashdata('upload_error')){ echo '<br><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>Error</strong><small>' . $this->session->flashdata('upload_error') . '</small></div>';}?>
<?php if($this->session->flashdata('upload_msg')){ echo '<br><div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Información</strong>&nbsp;<small>' . $this->session->flashdata('upload_msg') . '</small></div>';}?>
<?php
	echo form_open_multipart('cat/cargar/cv');
	$prop = array('name' => 'archivo', 'type' => 'file');
	echo form_input($prop) . '<br>';
	$prop = array('value' => 'Cargar CV', 'type' => 'submit', 'class' => 'btn btn-success');
	echo form_submit($prop);
	echo form_close();
?>
</div>
</div>
</div>
</div>
