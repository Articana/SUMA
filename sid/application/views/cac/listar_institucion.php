<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Instituciones</h3><br><br>

  <div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vcinstitucion"> + Crear</a>
</div>
<?php if (count($institucion)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>

				<th><small>Nombre de la Institución</small></th>
				<th><small>Acciones</small></th>
			</tr>

	<?php for ($i=0; $i < count ($institucion); $i++) { ?>

		</thead>
		<tbody>
			<tr>

				<td><small><?php echo $institucion[$i]->inst_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdinstitucion/'.$institucion[$i]->inst_id ;?> "title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url().'cac/vuinstitucion/'.$institucion[$i]->inst_id ;?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
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
