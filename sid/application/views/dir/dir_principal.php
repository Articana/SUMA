<div class="container">
<div class="panel panel-default">
<div class="panel-heading" id="panel_principal">
</div>
<div class="panel-body" ng-app="app" ng-controller="ComboController">
  <h3>Listado de Docentes
  <?php if (count($resp)>0) {
 echo '('.$resp[0]->carr_abreviatura.')'; }?></h3>

<div class="row">
<div class="col-md-5 col-md-offset-3">
    <script type="text/javascript">
    var app = angular.module('app', []);
    app.controller('ComboController', function($scope, $window){
      $scope.selectedCombo = 0;
      $scope.cambio = function(){
         $window.location.href = "<?php echo base_url('dire/carrera_dire/'); ?>" + '/' + $scope.selectedCombo;
      }
      });
  </script>

   <ul><strong>Carrera:</strong>
   
   <select class="form-control" ng-model="selectedCombo" ng-init="selectedCombo=<?php echo $carr_id; ?>" ng-change="cambio()">
    <?php foreach ($carrera as $car) { ?>
     <option value="<?php echo $car->carr_id;?>" >
       <?php echo $car->carr_nombre;?>
     </option>
     <?php }?>
    </select>
  
   </ul>
   </div>
</div>

     <nav class="text-center">

      <ul class="pagination pagination-sm">
        <li><a href="<?php echo base_url('dire/filtro/A'); ?>">A</a></li>
        <li><a href="<?php echo base_url('dire/filtro/B'); ?>">B</a></li>
        <li><a href="<?php echo base_url('dire/filtro/C'); ?>">C</a></li>
        <li><a href="<?php echo base_url('dire/filtro/CH');?>">CH</a></li>
        <li><a href="<?php echo base_url('dire/filtro/D'); ?>">D</a></li>
        <li><a href="<?php echo base_url('dire/filtro/E'); ?>">E</a></li>
        <li><a href="<?php echo base_url('dire/filtro/F'); ?>">F</a></li>
        <li><a href="<?php echo base_url('dire/filtro/G'); ?>">G</a></li>
        <li><a href="<?php echo base_url('dire/filtro/H'); ?>">H</a></li>
        <li><a href="<?php echo base_url('dire/filtro/I'); ?>">I</a></li>
        <li><a href="<?php echo base_url('dire/filtro/J'); ?>">J</a></li>
        <li><a href="<?php echo base_url('dire/filtro/K'); ?>">K</a></li>
        <li><a href="<?php echo base_url('dire/filtro/L'); ?>">L</a></li>
        <li><a href="<?php echo base_url('dire/filtro/LL'); ?>">LL</a></li>
        <li><a href="<?php echo base_url('dire/filtro/M'); ?>">M</a></li>
        <li><a href="<?php echo base_url('dire/filtro/N'); ?>">N</a></li>
        <li><a href="<?php echo base_url('dire/filtro/O'); ?>">O</a></li>
        <li><a href="<?php echo base_url('dire/filtro/P'); ?>">P</a></li>
        <li><a href="<?php echo base_url('dire/filtro/Q'); ?>">Q</a></li>
        <li><a href="<?php echo base_url('dire/filtro/R'); ?>">R</a></li>
        <li><a href="<?php echo base_url('dire/filtro/S'); ?>">S</a></li>
        <li><a href="<?php echo base_url('dire/filtro/T'); ?>">T</a></li>
        <li><a href="<?php echo base_url('dire/filtro/U'); ?>">U</a></li>
        <li><a href="<?php echo base_url('dire/filtro/V'); ?>">V</a></li>
        <li><a href="<?php echo base_url('dire/filtro/W'); ?>">W</a></li>
        <li><a href="<?php echo base_url('dire/filtro/X'); ?>">X</a></li>
        <li><a href="<?php echo base_url('dire/filtro/Y'); ?>">Y</a></li>
        <li><a href="<?php echo base_url('dire/filtro/Z'); ?>">Z</a></li>
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
          <a class="btn btn-xs btn-success" href="<?php echo base_url('dire/vrdetalle/'.$doc->doc_id); ?>">Detalle</a>
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
