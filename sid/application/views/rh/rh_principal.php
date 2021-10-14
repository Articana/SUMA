
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
	<h3>Listado de Docentes</h3>
	<nav class="text-center">
			<ul class="pagination pagination-sm">
			  <li><a href="<?php echo base_url('rh/filtro/A'); ?>">A</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/B'); ?>">B</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/C'); ?>">C</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/CH'); ?>">CH</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/D'); ?>">D</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/E'); ?>">E</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/F'); ?>">F</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/G'); ?>">G</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/H'); ?>">H</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/I'); ?>">I</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/J'); ?>">J</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/K'); ?>">K</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/L'); ?>">L</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/LL'); ?>">LL</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/M'); ?>">M</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/N'); ?>">N</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/O'); ?>">O</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/P'); ?>">P</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/Q'); ?>">Q</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/R'); ?>">R</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/S'); ?>">S</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/T'); ?>">T</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/U'); ?>">U</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/V'); ?>">V</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/W'); ?>">W</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/X'); ?>">X</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/Y'); ?>">Y</a></li>
			  <li><a href="<?php echo base_url('rh/filtro/Z'); ?>">Z</a></li>
			</ul>
	</nav>
</div>
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th><small># de Empleado</small></th>
				<th><small>Nombre completo</small></th>
				<th><small>Carrera de Adscripción</small></th>
				<th><small>Ver</small></th>
				<th><small>Imprimir</small></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($docentes as $doc) { ?>
			<tr>
				<td><small><?php echo $doc->doc_numemp; ?></small></td>
				<td><small><?php echo $doc->doc_nombres .' '. $doc->doc_paterno .' '. $doc->doc_materno; ?></small></td>
				<td><small><?php echo $doc->carr_nombre; ?></small></td>

				<td>
				<a class="btn btn-xs btn-success" href="<?php echo base_url('rh/vrdetalle/'.$doc->doc_id.'/'.$letra); ?>">Detalle</a>
				<a class="btn btn-xs btn-success" href="<?php echo base_url('cat/cargar/cvdoc/'.$doc->doc_numemp); ?>" target="_blank">CV</a>
				</td>

				<td>
				<a class="btn btn-xs btn-danger" href="<?php echo base_url('pdf/dficha/'.$doc->doc_id); ?>" target="_blank">Ficha</a>
				<a class="btn btn-xs btn-danger" href="<?php echo base_url('pdf/dtrayectoria/'.$doc->doc_id); ?>" target="_blank">Trayectoria</a>
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
</div>
</div>
</div>

