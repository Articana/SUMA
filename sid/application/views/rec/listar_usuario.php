<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Usuarios</h3><br><br>
<div  style="text-align:right">
</div>
<?php if (count($usuario)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">
			<thead>
			<tr>
				<th><small>Nombre del usuario</small></th>
				<th><small>Contraseña del usuario</small></th>
				<th><small>Privilegio</small></th>
				<th><small>Número de empleado</small></th>
			</tr>

	 <?php for ($i=0; $i < count ($usuario); $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $usuario[$i]->usu_nombre; ?></small></td>
                <td><small><?php echo $usuario[$i]->usu_contrasena; ?></small></td>
                <td><small><?php if($usuario[$i]->usu_permiso == 1 ){ echo 'Docente';}
                 if($usuario[$i]->usu_permiso == 5) { echo 'Coordinación';} 
                 if($usuario[$i]->usu_permiso == 3) { echo'Rectoría'; }?></small></td>
                <td><small><?php echo $usuario[$i]->doc_numemp; ?></small></td>
			</tr> <?php } ?>

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
