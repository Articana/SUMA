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
    <p><img src="images/logo.png" style = "heigth:50px; width:50px;"/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<strong>SID(SISTEMA DE INFORMACIÓN DOCENTE)</strong> </p>

</div>


<p align='center'>TRAYECTORIA DOCENTE</p>

<p>Nombre del Docente: <?php if(sizeof($doctrayectoria)>0) echo $doctrayectoria[0]->doc_nombres.' '.$doctrayectoria[0]->doc_paterno.' '.$doctrayectoria[0]->doc_materno;?><br>
    Número de Empleado: <?php if(sizeof($doctrayectoria)>0) echo $doctrayectoria[0]->doc_numemp?>
    </p>

    <p><strong>Academia(s):</strong></p>
       
    <table cellpadding="7">
        <?php if(sizeof($acamiembro)>0) ?>
        <?php $contAca = 1; ?>
        <?php foreach ($acamiembro as $am) {?>
            <?php if ($contAca == 1) { ?>
            <tr>
            <?php } ?>

                <td><strong><?php echo $am->aca_nombre; ?></strong><br>
                Periodo:  <?php echo $am->tipoperi_periodo; ?><br>
                Estatus:  <?php if($am->aca_mie_estatus > 0){?><?php echo 'Activo' ?><br>
                <?php } else{ ?> <?php echo 'Inactivo' ?><br> <?php }?>
                Año: <?php echo $am->anio; ?><br></td>
            
            <?php if ($contAca == 3) { ?>
            </tr>
            <?php } ?>
            <?php $contAca++; if($contAca == 4){ $contAca = 1; } ?>

            <?php } ?> 
    </table>
            <br><br>
         <p><strong>Categoría(s):</strong></p>
       
    <table cellpadding="7">
        <?php if(sizeof($categoria)>0) ?>
        <?php $contCate = 1; ?>
        <?php foreach ($categoria as $cat) {?>
            <?php if ($contCate == 1) { ?>
            <tr>
            <?php } ?>

                <td>
                <strong><?php echo $cat->tipocat_nombre; ?></strong><br>
                Fecha: <?php echo $cat->doccat_fecha; ?><br>
                Tipo de nombramiento: <?php echo $cat->tiponomb_nombre; ?>
                </td>
            
            <?php if ($contCate == 3) { ?>
            </tr>
            <?php } ?>
            <?php $contCate++; if($contCate == 4){ $contCate = 1; } ?>

            <?php } ?> 
    </table>
    <br><br>

    <p><strong>Cuerpo Académico:</strong></p>
     <table cellpadding="7">
        <?php if(sizeof($cmiembro)>0) ?>
        <?php $contCac = 1; ?>
        <?php foreach ($cmiembro as $cm) {?>
            <?php if ($contCac == 1) { ?>
            <tr>
            <?php } ?>

                <td>
                <strong><?php echo 'Miembro de Cuerpo Académico' ?></strong><br> 
                    Cuerpo Académico: <?php echo $cm->cue_nombre; ?><br>
                    Tipo de Nombramiento: <?php echo $cm->tmc_tipomiembro; ?><br>
                </td>
            
            <?php if ($contCac == 2) { ?>
            </tr>
            <?php } ?>
            <?php $contCac++; if($contCac == 3){ $contCac = 1; } ?>

            <?php } ?> 
    </table> <br><br>

    <p><strong>Carga Académica(s):</strong></p>
     <table cellpadding="7">
        <?php if(sizeof($carga)>0) ?>
        <?php $contCar = 1; ?>
        <?php foreach ($carga as $car) {?>
            <?php if ($contCar == 1) { ?>
            <tr>
            <?php } ?>

                <td>
                 <strong>Carga Asignada</strong><br>
                        Periodo: <?php echo $car->tipoperi_periodo . ' ' . $car->car_anio; ?><br> 
                        Área: <?php echo $car->are_nombre; ?><br>
                        Grupo Tutorado: <?php echo $car->car_grupo_tutorado; ?><br>
                        Total de Horas frente a grupo: <?php echo $car->car_hrs_frente_grupo. ' ' . 'horas'; ?><br>
                        Total de Horas de estadia: <?php echo $car->car_hrs_estadia. ' ' . 'horas'; ?><br>
                        Total de Horas desarrollo material didactico: <?php echo $car->car_hrs_desarrollo_mat_didactico. ' ' . 'hrs'; ?><br>
                        Total de Horas de académia: <?php echo $car->car_hrs_academia_ca. ' ' . 'horas'; ?><br>
                        Total de Horas de apoyo académico: <?php echo $car->car_hrs_apoyo_academ_admin. ' ' . 'horas'; ?><br>
                        Horas total h/s/m: <?php echo $car->car_hrs_total_hsm. ' ' . 'horas'; ?><br>
                        Entrega de reporte a Dirección: <?php echo $car->car_entrega_pro_rep_direccion; ?>
                </td>
            
            <?php if ($contCar == 2) { ?>
            </tr>
            <?php } ?>
            <?php $contCar++; if($contCar == 3){ $contCar = 1; } ?>

            <?php } ?> 
    </table>
        
    

   <div id="footer">
        <p class="page">Universidad Tecnológica del Estado de Zacatecas, página </p>
    </div>


</body>
</html>