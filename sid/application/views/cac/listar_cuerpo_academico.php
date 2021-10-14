<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Cuerpo Académico</h3><br><br>
<div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vccuerpoacedemico"> + Crear</a>
</div>

	<?php if (count($listar)>0) { ?>
	<div class="table-responsive">
	<table class="table table-striped">

	<thead>
		<tr>
			<th><small>Nivel de Habilitación</small></th>
			<th><small>Carrera</small></th>
			<th><small>Nombre del cuerpo Académico</small></th>
			<th><small>Acciones</small></th>
		</tr>
 
	<?php for ($i=0; $i < count($listar) ; $i++) { ?>
	</thead>
		<tbody>
			<tr>

				<td><small><?php echo $listar[$i]->tnh_descripcion; ?></small></td>
				<td><small><?php echo $listar[$i]->carr_nombre; ?></small></td>
				<td><small><?php echo $listar[$i]->cue_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdcuerpoacademico/'.$listar[$i]->cue_id ;?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url().'cac/vucuerpoacademico/'.$listar[$i]->cue_id ;?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
				</td> 
				
			</tr>

			<?php } ?>

		</tbody>
		<tfoot>
			<tr>
				<td colspan="5"></td>
			</tr>
		</tfoot>
	</table>
	<?php } ?>
</div>
</div>
</div>
</div>
