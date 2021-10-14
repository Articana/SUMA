<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body" ng-app="app" ng-controller="ComboController" >
<h3>Listado de Cuerpo Académico <?php if (count($miembro)>0) {
 echo '('.$miembro[0]->carr_abreviatura.')'; }?>
  </h3>

<div class="row">
<div class="col-md-5 col-md-offset-3">
   <strong align="center">Carrera:</strong>
   <select class="form-control" ng-model="selectedCombo"  ng-init="selectedCombo=<?php echo $car_id; ?>" ng-change="cambio()">
    <?php foreach ($carrera as $car) { ?>
     <option value="<?php echo $car->carr_id;?>" >
       <?php echo $car->carr_nombre;?>
     </option>
     <?php }?>
    </select>
    </div>
</div> <br>
<script type="text/javascript">
    var app = angular.module('app', []);
    app.controller('ComboController', function($scope, $window){
      $scope.selectedCombo = 0;
      $scope.cambio = function(){
         $window.location.href = "<?php echo base_url('dire/carrera_cuerpo/'); ?>" + '/' + $scope.selectedCombo;
      }
      });
  </script>

<div class="">
	<?php if (count($miembro)>0) { ?>
<div class="table-responsive">
	<table class="table table-striped">

	<thead>
		<tr>
				<th><small>Nombre Cuerpo Académico</small></th>
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
</div>