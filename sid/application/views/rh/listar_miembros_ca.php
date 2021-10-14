<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Miembros de Cuerpo Académico</h3><br><br>
<div  style="text-align:right">
</div>
	<?php if (count($miembro)>0) { ?>
	<div class="table-responsive">
	<table class="table table-striped">

	<thead>
		<tr>
				<th><small>Nombre Cuerpo academico</small></th>
				<th><small>Nombre Completo</small></th>
				<th><small>Tipo Miembro</small></th>
		</tr>
 
	<?php for ($i=0; $i < count($miembro) ; $i++) { ?>
	</thead>
		<tbody>
			<tr>

				<td><small><?php echo $miembro[$i]->cue_nombre; ?></small></td>
				<td><small><?php echo $miembro[$i]->doc_nombres.' '.$miembro[$i]->doc_paterno.' '.$miembro[$i]->doc_materno ?></small></td>
				<td><small><?php echo $miembro[$i]->tmc_tipomiembro; ?></small></td>
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
