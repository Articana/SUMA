<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Miembros de Cuerpo Académico</h3><br><br>
<div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vccuerpo_academico_miembros"> + Crear</a>
</div>
<?php if (count($miembro)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
	<thead>
		<tr>
				<th><small>Nombre Cuerpo academico</small></th>
				<th><small>Nombre Completo</small></th>
				<th><small>Tipo Miembro</small></th>
				<th><small>Acciones</small></th>
		</tr>
 
	<?php for ($i=0; $i < count($miembro) ; $i++) { ?>
	</thead>
		<tbody>
			<tr>

				<td><small><?php echo $miembro[$i]->cue_nombre; ?></small></td>
				<td><small><?php echo $miembro[$i]->doc_nombres.' '.$miembro[$i]->doc_paterno.' '.$miembro[$i]->doc_materno ?></small></td>
				<td><small><?php echo $miembro[$i]->tmc_tipomiembro; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdcuerpo_academico_miembros/' . $miembro[$i]->cam_id;?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url().'cac/vucuerpo_academico_miembros/' . $miembro[$i]->cam_id;?>" title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
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