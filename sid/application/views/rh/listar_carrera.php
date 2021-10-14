<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Plan Educativo</h3><br><br>

  <div  style="text-align:right">
</div>
<?php if (count($carrera)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
		
		<thead>
			<tr>
				<th><small>Nombre del Plan Educativo</small></th>
				<th><small>Abreviatura del Plan Educativo</small></th>
				<th><small>Responsable del Plan Educativo</small></th>
			</tr>
		</thead>
			  <?php for ($i=0; $i < count($carrera) ; $i++) {  ?>
		<tbody>
			<tr>
				<td><small><?php echo $carrera[$i]->carr_nombre; ?></small></td>
				<td><small><?php echo $carrera[$i]->carr_abreviatura; ?></small></td>
				<td><small><?php echo $carrera[$i]->res_nombres.' '.$carrera[$i]->res_paterno.' '.$carrera[$i]->res_materno; ?></small></td>
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
