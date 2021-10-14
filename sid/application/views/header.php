<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.2/angular.min.js"></script>
      
	<style type="text/css">
		.footer {
			width: 100%;
			position: fixed;
			bottom: 0;
			/* Set the fixed height of the footer here */
			height: 48px;
			/*background: url("<?php echo FCPATH.'images/bg.png';  ?>") repeat;*/
			background: rgba(169,3,41,1);
			background: -moz-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(169,3,41,1)), color-stop(44%, rgba(143,2,34,1)), color-stop(100%, rgba(109,0,25,1)));
			background: -webkit-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -o-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -ms-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: linear-gradient(to bottom, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019', GradientType=0 );
			color: white;
		}

		.navbar-inverse{
			background: rgba(169,3,41,1);
			background: -moz-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(169,3,41,1)), color-stop(44%, rgba(143,2,34,1)), color-stop(100%, rgba(109,0,25,1)));
			background: -webkit-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -o-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: -ms-linear-gradient(top, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			background: linear-gradient(to bottom, rgba(169,3,41,1) 0%, rgba(143,2,34,1) 44%, rgba(109,0,25,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a90329', endColorstr='#6d0019', GradientType=0 );

		}
		.navbar-inverse .navbar-brand{
			color:#EDEDED;
		}
		.navbar-inverse .navbar-brand:hover{
			color:white;
		}

		.navbar-inverse .navbar-nav>li>a{
			color:#EDEDED;
		}
		.navbar-inverse .navbar-nav>li>a:hover{
			color:#EDEDED;
		}

		/*.navbar-inverse .navbar-nav>.open>a:hover{
			color:#FFF;
			background-color: #6C0000;
		}*/
		.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
			background: rgba(255,255,255,1);
			background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(237,237,237,1)));
			background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=0 );
  			color: black;
  		}
        /*
  		.panel-default>#panel_principal {
  		background: rgba(98,125,77,1);
		background: -moz-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(98,125,77,1)), color-stop(100%, rgba(31,59,8,1)));
		background: -webkit-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -o-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -ms-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: linear-gradient(to bottom, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#627d4d', endColorstr='#1f3b08', GradientType=0 );
		
		border-color: background: rgba(98,125,77,1);
		background: -moz-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(98,125,77,1)), color-stop(100%, rgba(31,59,8,1)));
		background: -webkit-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -o-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: -ms-linear-gradient(top, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		background: linear-gradient(to bottom, rgba(98,125,77,1) 0%, rgba(31,59,8,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#627d4d', endColorstr='#1f3b08', GradientType=0 );
		}
        */

	</style>
</head>