<div class="container">
<div class="panel panel-default">
 <div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Academias</h3><br><br>
<div  style="text-align:right">
</div>
<?php if (count($academia)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
		
		<thead>
			<tr>
				<th><small>Nombre Academia</small></th>
			</tr>
		</thead>
			 <?php for ($i=0; $i < count($academia) ; $i++) {  ?>
		<tbody>
			<tr>
				<td><small><?php echo $academia[$i]->aca_nombre; ?></small></td>
					
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
