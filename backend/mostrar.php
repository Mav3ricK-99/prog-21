<?php

    include_once('Persona.php');
    include_once('Empleado.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Lista de Empleados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script src="javascript/funciones.js" async defer></script>
    <body>
        <h2>Listado de Empleados</h2>
        <section style="margin:auto;width:500px">
            <br><br>
            
            <h4>Info</h4>
            <br>
            <hr>
            <table>
            <?php
                $fp = fopen("../archivos/empleados.txt", "r");
                while ($line = fgets($fp)) {
                    $datos = explode(" ", $line);
                    $empleado = new Empleado($datos[2], $datos[1], (int)$datos[3], $datos[4], (int)$datos[0], (float)$datos[6], $datos[5]);
                    echo "<tr><td>".$empleado->ToString()."</td><th><a href='eliminar.php?legajo=". $datos[0] ."'>Eliminar</a></th></tr>";
                }
                fclose($fp);
            ?>
                
            </table>
            <a href='index.html'></a>
            <hr>
        </section>    
    </body>
</html>