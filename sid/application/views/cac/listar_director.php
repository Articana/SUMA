<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Directores</h3><br><br>
<div  style="text-align:right">

</div>

<?php if (count($listar)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

		<thead>
			<tr>
				<th><small>Número de Empleado</small></th>
				<th><small>Nombre Completo</small></th>
				<th><small>Nombre de Usuario</small></th>
				<th><small> Acciones</small></th>
			</tr>
 
	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $listar[$i]->res_numemp; ?></small></td>
				<td><small><?php echo $listar[$i]->res_nombres.' '.$listar[$i]->res_paterno.' '.$listar[$i]->res_materno; ?></small></td>
				<td><small><?php echo $listar[$i]->usu_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fddirector/'.$listar[$i]->res_id ;?> "title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url().'cac/vudirector/'.$listar[$i]->res_id ;?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
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

