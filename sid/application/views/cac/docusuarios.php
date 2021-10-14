<!DOCTYPE html>
<html>
<head>
        <title>Sistema de Información Docente | SID</title>
        <style>
        @page { margin: 80px 50px; }
        #header { 
            position: fixed; 
            left: 0px; top: -80px; 
            right: 0px; 
            height: 32px; 
            background-color: #fff; 
            color: #000;
            text-align: left;
        }
        #imgtitulo{
        text-align: center;
        vertical-align: middle;
        }
        #footer { 
            left: 0px; 
            position: fixed; 
            right: 0px; 
            bottom: -80px; 
            height: 32px; 
            background-color: #fff; 
            color: #333;
        }
        p.page{
                font-size: 8pt;
        }
        #footer .page:after { 
            content: counter(page, arabig); 
        }
        body{
                font-family: 'Helvetica';
        }
        p{
                font-size: 10pt;
        }
        table{
                text-align: center;
                font-size: 10pt;
                width: 100%;
                border: 0px;
        }
       table, th, td
       {
         border: 1px solid #333;
        border-collapse: collapse;
       }
       thead
       {
        background: white;
       }
        </style>
</head>
<body>

<div id="header">
    <p><img src="images/logo.png" style = "heigth:50px; width:50px;"/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<strong>SID (SISTEMA DE INFORMACIÓN DOCENTE)</strong> </p>

</div>


<p align='center'> LISTADO DE USUARIOS</p>
    
    <p>Carrera: <?php if(sizeof($docusuarios)>0) echo $docusuarios[0]->carr_nombre;?><br>
    Responsable: <?php if(sizeof($docusuarios)>0) echo $docusuarios[0]->res_nombres.' '.$docusuarios[0]->res_paterno.' '.$docusuarios[0]->res_materno;?></p>
        <table>
                <thead>
                        <tr>
                                <th><small># de Empleado</small></th>
                                <th><small>Nombre completo</small></th>
                                <th><small>Nombre de Usuario</small></th>
                                <th><small>Contraseña</small></th>
                        </tr>
                </thead>
                <tbody>
                        <?php foreach ($docusuarios as $doc) {?>
                        <tr>
                                <td><small><?php echo $doc->doc_numemp;?></small></td>
                                <td><small><?php echo $doc->doc_nombres.' '.$doc->doc_paterno.' '.$doc->doc_materno;?></small></td>
                                <td><small><?php echo $doc->usu_nombre;?></small></td>
                                <td><small><?php echo $doc->usu_contrasena;?></small></td>
                        </tr>
                        <?php } ?>
                </tbody>
        </table>

        
    

   <div id="footer">
        <p class="page">Universidad Tecnológica del Estado de Zacatecas, página </p>
    </div>


</body>
</html>