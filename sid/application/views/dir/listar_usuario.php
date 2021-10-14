<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body" ng-app="app" ng-controller="ComboController" >
<h3>Listado de Usuarios <?php if (count($usuario)>0) {
 echo '('.$usuario[0]->carr_abreviatura.')'; }?> </h3>
<div class="row">
<div class="col-md-5 col-md-offset-3">
<script type="text/javascript">
    var app = angular.module('app', []);
    app.controller('ComboController', function($scope, $window){
      $scope.selectedCombo = 0;
      $scope.cambio = function(){
         $window.location.href = "<?php echo base_url('dire/carrera_usuarios/'); ?>" + '/' + $scope.selectedCombo;
      }
      });
  </script>

   <strong>Carrera:</strong>
   
   <select class="form-control" ng-model="selectedCombo" ng-init="selectedCombo=<?php echo $car_id; ?>" ng-change="cambio()">
    <?php foreach ($carrera as $car) { ?>
     <option value="<?php echo $car->carr_id;?>" >
       <?php echo $car->carr_nombre;?>
     </option>
     <?php }?>
    </select>
    </div>
    </div>

<?php if (count($usuario)>0) { ?>
<div  style="text-align:right">
</div>
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
