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
				<a class="navbar-brand"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $current_user; ?></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url('doc'); ?>">Inicio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Docentes&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('doc/vccargarcv') ;?>">Cargar curriculum vitae</a></li>
							<li><a href="<?php echo base_url('doc/vcdomicilio') ;?>">Dirección (Opcional)</a></li>
							<li><a href="<?php echo base_url('doc/vcdocenteformacion') ;?>">Formación académica</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Catálogos&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('doc/vucontrasena') ;?>">Cambiar Contraseña</a></li>
							<li><a href="<?php echo base_url('doc/vcinstitucion') ;?>">Instituciones</a></li>
							<li><a href="<?php echo base_url('doc/vcmunicipio') ;?>">Municipios</a></li>
						</ul>
					</li>
					<!--
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reportes&nbsp;<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Currículum Docente</a></li>
						</ul>
					</li>
					-->
					<li><a href="<?php echo base_url('sec/invalidar'); ?>">Salir</a></li>
				</ul>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>