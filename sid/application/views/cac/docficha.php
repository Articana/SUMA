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
                font-size: 9pt;
                width: 100%;
        }
       table, th, td
       {
        border: 0px solid #333;
        font-family: 'Helvetica';
        text-align: left;
        font-size: 10pt;
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
<p><img src="images/logo.png" style = "heigth:50px; width:50px;"/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<strong>SID(SISTEMA DE INFORMACIÓN DOCENTE)</strong>   </p>
</div>
<p align='center'>FICHA DOCENTE</p>

<p><img style="height: 128px; width:128px;" src="<?php echo base_url('upload/'.$docficha[0]->doc_cvdir.'/'.$docficha[0]->doc_fotografia); ?>"></p>

<p><strong><?php if(sizeof($docficha)>0) echo 'Datos Personales:';?></strong></p>
        <?php foreach ($docficha as $doc) {?>
        <p>Nombre Completo: <?php echo $doc->doc_nombres.' '.$doc->doc_paterno.' '.$doc->doc_materno;?><br>
        Número de Empleado: <?php echo $doc->doc_numemp;?><br>
        Fecha de Nacimiento:<?php echo $doc->doc_fechanac;?><br>
        Fecha de Ingreso: <?php echo $doc->doc_fechain;?><br>
        Experiencia Laboral: <?php echo $doc->doc_explab.' '.'años';?><br>
        </p>
        <?php }?>

    <p><strong><?php if(sizeof($contacto)>0)  echo 'Información de Contacto:';?></strong></p>
        <?php foreach ($contacto as $con) {?>
        <p>Teléfono Institucional: <?php echo $con->con_teleinsti;?><br>
        Correo Institucional: <?php echo $con->con_emailinsti;?> <br>
        Teléfono Particular: <?php echo $con->con_teleparti;?><br>
        Correo Particular: <?php echo $con->con_emailparti;?><br>
        </p>
                 <?php } ?>

    <p><strong> Domicilios: </strong></p>
        <table>
        
        <?php if(sizeof($domicilio)>0) ?>
        <?php $contDom = 1; ?>
        <?php $c = 1; foreach ($domicilio as $dom) {?>
            <?php if ($contDom == 1) { ?>
            <tr>
            <?php } ?>

                <td>
                <strong><?php echo 'Domicilio ' . $c; ?></strong><br>
                Calle: <?php echo  $dom->dom_calle;?><br>
                Número: <?php echo  $dom->dom_numero;?><br>
                Fraccionamiento: <?php echo  $dom->dom_fraccionamiento;?><br>
                Municipio: <?php echo  $dom->mun_nombre;?><br>
                 
                </td>
                <?php $c++; ?>
            
            <?php if ($contDom == 3) { ?>
            </tr>
            <?php } ?>
            <?php $contDom++; if($contDom == 4){ $contDom = 1; } ?>

            <?php } ?> 
        </table>

<div id="footer">
        <p class="page">Universidad Tecnológica del Estado de Zacatecas, página </p>
    </div>



</body>
</html>






