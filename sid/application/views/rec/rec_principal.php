
<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
	<h3>Listado de Docentes</h3>
	<nav class="text-center">
			<ul class="pagination pagination-sm">
			  <li><a href="<?php echo base_url('rec/filtro/A'); ?>">A</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/B'); ?>">B</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/C'); ?>">C</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/CH'); ?>">CH</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/D'); ?>">D</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/E'); ?>">E</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/F'); ?>">F</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/G'); ?>">G</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/H'); ?>">H</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/I'); ?>">I</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/J'); ?>">J</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/K'); ?>">K</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/L'); ?>">L</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/LL'); ?>">LL</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/M'); ?>">M</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/N'); ?>">N</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/O'); ?>">O</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/P'); ?>">P</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/Q'); ?>">Q</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/R'); ?>">R</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/S'); ?>">S</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/T'); ?>">T</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/U'); ?>">U</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/V'); ?>">V</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/W'); ?>">W</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/X'); ?>">X</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/Y'); ?>">Y</a></li>
			  <li><a href="<?php echo base_url('rec/filtro/Z'); ?>">Z</a></li>
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
					<a class="btn btn-xs btn-success" href="<?php echo base_url('rec/vrdetalle/'.$doc->doc_id); ?>">Detalle</a>
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
