<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body">
<h3>Listado de Usuarios</h3><br><br>

<div  style="text-align:right">
<a class="btn btn-xs btn-primary" href="vcusuario"> + Crear</a>
</div>
	<?php if (count($usuario)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

			<thead>
			<tr>
				<th><small>Nombre del usuario</small></th>
				<th><small>Contraseña del usuario</small></th>
				<th><small>Privilegio en SID</small></th>
				<th><small>Acciones</small></th>
			</tr>

	 <?php for ($i=0; $i < count ($usuario); $i++) { ?>

		</thead>
		<tbody>
			<tr>
				<td><small><?php echo $usuario[$i]->usu_nombre; ?></small></td>
                <td><small><?php echo $usuario[$i]->usu_contrasena; ?></small></td>
                <td><small><?php if($usuario[$i]->usu_permiso == 1 ){ echo 'Docente';}
                 if($usuario[$i]->usu_permiso == 5) { echo 'Coordinación Académica';}
                 if($usuario[$i]->usu_permiso == 11) { echo 'Dirección de Carrera';} 
                 if($usuario[$i]->usu_permiso == 9) { echo 'Recursos Humanos';} 
                 if($usuario[$i]->usu_permiso == 3) { echo'Rectoría'; }?></small></td>
                
				<td>
					<small><a class="btn btn-xs btn-danger" href="<?php echo base_url().'cac/fdusuario/' . $usuario[$i]->usu_id; ?> "title="Eliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Eliminar</a></small>
					<small><a class="btn btn-xs btn-success" href="<?php echo base_url() . 'cac/vuusuario/' . $usuario[$i]->usu_id;  ?> " title="Modificar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Editar</a></small>
				</td> 
				
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
