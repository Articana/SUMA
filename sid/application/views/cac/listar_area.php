<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Áreas</h3><br><br>

  <div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vcarea"> + Crear</a>
</div>
<?php if (count($area)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>

				<th><small>Áreas</small></th>
				<th><small>Acciones</small></th>
			</tr>

	<?php for ($i=0; $i < count ($area); $i++) { ?>

		</thead>
		<tbody>
			<tr>

				<td><small><?php echo $area[$i]->are_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdarea/'.$area[$i]->are_id ;?> "title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url().'cac/vuarea/'.$area[$i]->are_id ;?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
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
