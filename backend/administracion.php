<?php

include_once('Persona.php');
include_once('Empleado.php');
include_once('Fabrica.php');

if(!isset($_POST['txtDni']) || !isset($_POST['txtApellido']) || !isset($_POST['txtNombre']) || !isset($_POST['cboSexo'])
|| !isset($_POST['txtLegajo']) || !isset($_POST['txtSueldo']) || !isset($_POST['rdoTurno'])){
    die();
}

$dni = (int)$_POST['txtDni'];
$legajo = (int)$_POST['txtLegajo'];
$sueldo = (float)$_POST['txtSueldo'];
$nuevoEmpleado = new Empleado($_POST['txtNombre'], $_POST['txtApellido'], $dni, $_POST['cboSexo'], $legajo, $sueldo, $_POST['rdoTurno']);

$fabrica = new Fabrica("TPs S.A", 7);
$fabrica->TraerDeArchivo('../archivos/empleados.txt');

if($fabrica->AgregarEmpleado($nuevoEmpleado)){
    $fabrica->GuardarEnArchivo('../archivos/empleados.txt');
    echo "<a href='mostrar.php'>Mostrar empleados</a>";
}else{
    echo "Hubo un error. <a href='index.php'>Regresar.</a>";
}

//$fabrica->ToString();

?>