<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Miembros Academia</h3><br><br>
<div  style="text-align:right">
</div>
<?php if (count($listar)>0) { ?>
<div class="table-responsive">
<table class="table table-striped">

	<thead>
		<tr>
			<th><small>Periodo</small></th>
			<th><small>Año</small></th>
			<th><small>Academia</small></th>
			<th><small>Nombre Completo</small></th>
			<th><small>Estatus</small></th>
		</tr>

	<?php for ($i=0; $i < count($listar) ; $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $listar[$i]->tipoperi_periodo; ?></small></td>
				<td><small><?php echo $listar[$i]->anio; ?></small></td>
				<td><small><?php echo $listar[$i]->aca_nombre; ?></small></td>
				<td><small><?php echo $listar[$i]->doc_nombres.' '.$listar[$i]->doc_paterno.' '.$listar[$i]->doc_materno; ?></small></td>
				<td><small><?php if($listar[$i]->aca_mie_estatus>0){ ?><?php echo 'Activo' ?><?php } else{ ?><?php echo 'Inactivo' ?> <?php }?></small></td>
				
		
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
