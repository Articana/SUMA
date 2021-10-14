<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Nivel Académico</h3><br><br>
<div  style="text-align:right">
</div>
	<?php if (count($listar)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

			<thead>
			<tr>
				<th><small>Nivel Académico</small></th>
			</tr>

	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $listar[$i]->nivel_desc; ?></small></td>
			</tr> <?php } ?>

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
