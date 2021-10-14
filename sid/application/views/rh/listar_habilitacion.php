<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Nivel Habilitación</h3><br><br>

  <div  style="text-align:right">
</div>
<?php if (count($nivel)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>

				<th><small>Descripción</small></th>
			</tr>

	<?php for ($i=0; $i < count ($nivel); $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $nivel[$i]->tnh_descripcion; ?></small></td>
				
			</tr><?php } ?>

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
