<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos y Asignaturas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestión de Alumnos y Asignaturas</h1>
    
    <div class="container">
        <div class="alumnos">
            <h2>Alumnos</h2>
            <div id="alumnos-list">
            <?php 
            require("RF.php");
            $con = conectar_bd();
            echo consultar_datos($con);
            ?>
            </div>
        </div>
        
        <div class="asignaturas">
            <h2>Asignaturas</h2>
            <div id="asignaturas-list">
            <?php
            echo mostrar_asignaturas($con);
            ?>
            </div>
        </div>
    </div>
    
    <div class="stats">
        <h2>Total de Alumnos</h2>
        <div id="total-alumnos">
        <?php 
        echo contar_alumnos($con);
        ?>
        </div>
        
        <h2>Total de Asignaturas</h2>
        <div id="total-asignaturas">
        <?php 
        echo contar_asignaturas($con);
        ?>
        </div>
    </div>

    <h2>Asignaturas cursadas por el estudiante con el codigo igual a 3</h2>
    <div id="asignaturas-codigo3">
    <?php 
    echo asignaturas_codigo3($con);
    ?>
    </div>

</body>
</html>
