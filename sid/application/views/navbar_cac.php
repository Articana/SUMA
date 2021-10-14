<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Bienvenido&nbsp;<?php echo $current_user; ?></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('cac'); ?>">Inicio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Docentes&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('cac/vcdocente'); ?>">Agregar Docente</a></li>
							<li><a href="" data-toggle="modal" data-target="#busqueda-numemp" >Búsqueda por número de empleado</a></li>
							<li><a href="<?php echo base_url('cac/listado_docusuario'); ?>">Listado Docente-Usuario</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Directores&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('cac/vcdirector'); ?>">Agregar Director</a></li>
							<li><a href="" data-toggle="modal" data-target="#busqueda-numempdire" >Búsqueda por número de empleado</a></li>
							<li><a href="<?php echo base_url('cac/vrdirector'); ?>">Listado Directores</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('cac/vracademia') ;?>">Academias</a></li>
							<li><a href="<?php echo base_url('cac/vracademiamiembros') ;?>">Miembros Academia</a></li>
							<li><a href="<?php echo base_url('cac/vrinstitucion') ;?>">Instituciones</a></li>
							<li><a href="<?php echo base_url('cac/vrarea') ;?>">Áreas</a></li>
							<li><a href="<?php echo base_url('cac/vrcarrera') ;?>">Plan Educativo</a></li>
							<li><a href="<?php echo base_url('cac/vrcuerpoacademico') ;?>">Cuerpo Académico</a></li>
							<li><a href="<?php echo base_url('cac/vrcuerpo_academico_miembros') ;?>">Miembros Cuerpo Académico</a></li>
							<li><a href="<?php echo base_url('cac/vrestado') ;?>">Estado</a></li>
							<li><a href="<?php echo base_url('cac/vrmunicipio') ;?>">Municipio</a></li>
							<li><a href="<?php echo base_url('cac/vrnivel');?>">Nivel Académico</a></li>
							<li><a href="<?php echo base_url('cac/vrtipocategoria');?>">Categoría</a></li>
							<li><a href="<?php echo base_url('cac/vrdocentecategoria');?>">Categoría Docente</a></li>
							<li><a href="<?php echo base_url('cac/vrtipoformacion');?>">Grado de Formación</a></li>
							<li><a href="<?php echo base_url('cac/vrmodalidad') ;?>">Modalidad Formación</a></li>
							<li><a href="<?php echo base_url('cac/vrtipo_nivel_habilitacion');?>">Niveles de Habilitación</a></li>
							<li><a href="<?php echo base_url('cac/vrtipo_nombramiento');?>">Nombramientos</a></li>
							<li><a href="<?php echo base_url('cac/vrtipoperiodo');?>">Periodos</a></li>
							<li><a href="<?php echo base_url('cac/vrtipo_titulo');?>">Titulos</a></li>
							<li><a href="<?php echo base_url('cac/vrusuario');?>">Usuarios</a></li>
							<li><a href="<?php echo base_url('cac/vrdocentedirectorio');?>">Docente-Directorio</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url('cac/vucontrasena'); ?>">Cambiar Contraseña</a></li>
					<li><a href="<?php echo base_url('sec/invalidar'); ?>">Salir</a></li>
				</ul>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>
<div style="padding:24px;">&nbsp;</div>
<!-- .modal -->
<div class="modal fade" id="busqueda-numemp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Búsqueda de Docente por número de empleado</h4>
      </div>
      <?php echo form_open(base_url() . 'cat/Buscar/empleado'); ?>
      <div class="modal-body">
      	<div class="form-group">
      	<div class="input-group">
      	<div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
        <?php
        	$prop = array(
				'type'  		=> 'input',
				'name'  		=> 'doc_numemp',
				'id'    		=> 'doc_numemp',
				'placeholder' 	=> 'Número de empleado',
				'class' 		=> 'form-control',
				'maxlength'		=> '4'
			);
			echo form_input($prop) . '<br>';
		?>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancelar</button>
        <?php
        	$prop = array(
				'type'  		=> 'submit',
				'class' 		=> 'btn btn-success btn-xs',
				'value'			=> 'Buscar docente'
			);
			echo form_input($prop);
		?>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      <?php echo form_close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="busqueda-numempdire">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Búsqueda de Director por número de empleado</h4>
      </div>
      <?php echo form_open(base_url() . 'cat/Buscar/empleadire'); ?>
      <div class="modal-body">
      	<div class="form-group">
      	<div class="input-group">
      	<div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
        <?php
        	$prop = array(
				'type'  		=> 'input',
				'name'  		=> 'res_numemp',
				'id'    		=> 'res_numemp',
				'placeholder' 	=> 'Número de empleado',
				'class' 		=> 'form-control',
				'maxlength'		=> '4'
			);
			echo form_input($prop) . '<br>';
		?>
		</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancelar</button>
        <?php
        	$prop = array(
				'type'  		=> 'submit',
				'class' 		=> 'btn btn-success btn-xs',
				'value'			=> 'Buscar Director'
			);
			echo form_input($prop);
		?>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      <?php echo form_close(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
