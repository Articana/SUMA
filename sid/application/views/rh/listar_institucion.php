<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Instituciones</h3><br><br>

  <div  style="text-align:right">
</div>
<?php if (count($institucion)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>
			<th><small>Nombre de la Institución</small></th>
			</tr>

	<?php for ($i=0; $i < count ($institucion); $i++) { ?>

		</thead>
		<tbody>
			<tr>
			<td><small><?php echo $institucion[$i]->inst_nombre; ?></small></td>
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

