<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body" ng-app="app" ng-controller="ComboController" >
<h3>Listado de Miembros Academia <?php if (count($listar)>0) {
 echo '('.$listar[0]->carr_abreviatura.')'; }?> </h3>
<div class="row">
<div class="col-md-5 col-md-offset-3">
<script type="text/javascript">
    var app = angular.module('app', []);
    app.controller('ComboController', function($scope, $window){
      $scope.selectedCombo = 0;
      $scope.cambio = function(){
         $window.location.href = "<?php echo base_url('dire/carrera_acamiembros/'); ?>" + '/' + $scope.selectedCombo;
      }
      });
  </script>

   <strong>Carrera:</strong>
   
   <select class="form-control" ng-model="selectedCombo"  ng-init="selectedCombo=<?php echo $car_id; ?>" ng-change="cambio()">
    <?php foreach ($carrera as $car) { ?>
     <option value="<?php echo $car->carr_id;?>" >
       <?php echo $car->carr_nombre;?>
     </option>
     <?php }?>
    </select>
    </div>
 </div> 

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
