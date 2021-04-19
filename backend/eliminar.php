<?php

include_once('Persona.php');
include_once('Empleado.php');
include_once('Fabrica.php');

if(!isset($_GET['legajo'])){

    echo "No se ingreso un numero legajo.";
    header('location: index.html');
    die();
}

$empleadosTxt = "";

$fp = fopen("../archivos/empleados.txt", "r+");
$flagEncontrado = false;
while ($line = fgets($fp)) {
    $datos = explode(" ", $line);
    if($datos[0] == $_GET['legajo']){
        $flagEncontrado = true;

        $empleado = new Empleado($datos[2], $datos[1], (int)$datos[3], $datos[4], (int)$datos[0], (float)$datos[6], $datos[5]);
           
        $fabrica = new Fabrica("TPs S.A", 7);
        $fabrica->TraerDeArchivo('../archivos/empleados.txt');

        if(!$fabrica->EliminarEmpleado($empleado)){
            echo "Error al eliminar empleado<br>";
        }

        continue;
    }
    $empleadosTxt .= $line;
}
if($flagEncontrado){
    file_put_contents("../archivos/empleados.txt", $empleadosTxt);
}else{
    echo "El empleado no fue encontrado.<br>";
}
fclose($fp);

echo "<a href='../index.html'>Inicio</a> ";
echo "<a href='mostrar.php'>Mostrar</a>";

?>