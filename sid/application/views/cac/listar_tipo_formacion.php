<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Grado de Formación</h3><br><br>
<div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vctipoformacion"> + Crear</a>
</div>
<?php if (count($listar)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>

				<th><small>Nombre</small></th>
				<th><small>Acciones</small></th>
			</tr>

	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>

				<td><small><?php echo $listar[$i]->tipoform_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdtipoformacion/'.$listar[$i]->tipoform_id ;?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
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
