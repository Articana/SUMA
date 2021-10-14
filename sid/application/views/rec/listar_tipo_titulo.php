<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Tipo Título</h3><br><br>
<div  style="text-align:right">
</div>
	<?php if (count($titulo)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>
				<th><small>Nombramiento</small></th>
			</tr>
		</thead>
			 <?php for ($i=0; $i < count($titulo) ; $i++) {  ?>
		<tbody>
			<tr>
				<td><small><?php echo $titulo[$i]->tipotitulo_nombre; ?></small></td>
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