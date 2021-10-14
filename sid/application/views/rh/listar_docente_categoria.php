<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Categoría Docente</h3><br><br>
<div  style="text-align:right">
</div>
<?php if (count($listar)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>

				<th><small>Nombre Completo</small></th>
				<th><small>Nombramiento</small></th>
				<th><small>Categoría</small></th>
				<th><small>Fecha</small></th>
			</tr>
 
	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>

				<td><small><?php echo $listar[$i]->doc_nombres.' '.$listar[$i]->doc_paterno.' '.$listar[$i]->doc_materno; ?></small></td>
				<td><small><?php echo $listar[$i]->tiponomb_nombre; ?></small></td>
				<td><small><?php echo $listar[$i]->tipocat_nombre; ?></small></td>
				<td><small><?php echo $listar[$i]->doccat_fecha; ?></small></td>
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
