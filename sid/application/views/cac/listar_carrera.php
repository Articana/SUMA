<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Plan Educativo</h3><br><br>

  <div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vccarrera"> + Crear</a>
</div>
<?php if (count($carrera)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
		
		<thead>
			<tr>
				<th><small>Nombre del Plan Educativo</small></th>
				<th><small>Abreviatura del Plan Educativo</small></th>
				<th><small>Responsable del Plan Educativo</small></th>
			
				<th><small>Acciones</small></th>
			</tr>
		</thead>
			  <?php for ($i=0; $i < count($carrera) ; $i++) {  ?>
		<tbody>
			<tr>
				<td><small><?php echo $carrera[$i]->carr_nombre; ?></small></td>
				<td><small><?php echo $carrera[$i]->carr_abreviatura; ?></small></td>
				<td><small><?php echo $carrera[$i]->res_nombres.' '.$carrera[$i]->res_paterno.' '.$carrera[$i]->res_materno; ?></small></td>
				
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'cac/fdcarrera/' . $carrera[$i]->carr_id;  ?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url() . 'cac/vucarrera/' . $carrera[$i]->carr_id;  ?> " title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
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
