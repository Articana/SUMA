<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Directorio Docente</h3><br><br>
<div  style="text-align:right">
</div>

<?php if (count($listar)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

	

		<thead>
			<tr>

				<th><small>Número de Empleado</small></th>
				<th><small>Nombre Completo</small></th>
				<th><small>Directorio</small></th>
			</tr>
 
	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>

				<td><small><?php echo $listar[$i]->doc_numemp; ?></small></td>
				<td><small><?php echo $listar[$i]->doc_nombres.' '.$listar[$i]->doc_paterno.' '.$listar[$i]->doc_materno; ?></small></td>
				<td><small><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $listar[$i]->doc_cvdir; ?></small></td>
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
