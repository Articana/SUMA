<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado Tipo Título</h3><br><br>
<div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vctipo_titulo"> + Crear</a>
</div>
<?php if (count($titulo)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
	
		<thead>
			<tr>
				<th><small>Nombramiento</small></th>
				<th><small>Acciones</small></th>
			</tr>
		</thead>
			 <?php for ($i=0; $i < count($titulo) ; $i++) {  ?>
		<tbody>
			<tr>
				<td><small><?php echo $titulo[$i]->tipotitulo_nombre; ?></small></td>
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url() . 'cac/fdtipo_titulo/' . $titulo[$i]->tipotitulo_id;  ?>" title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					
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
