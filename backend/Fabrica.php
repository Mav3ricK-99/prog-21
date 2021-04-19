<?php
include_once('interfaces.php');
class Fabrica implements IArchivo{

    private int $_cantMaxima;
    private $_empleados;
    private string $_razonSocial;

    public function __construct(string $razonSocial,int $cantMaxima = 5){

        $this->_razonSocial = $razonSocial;
        $this->_cantMaxima = $cantMaxima;
        $this->_empleados = [];
    }

    public function AgregarEmpleado(Empleado $e){

        if(count($this->_empleados) <5){
            array_push($this->_empleados, $e);
        }
        
        $this->EliminarEmpleadoRepetido();
        return true;

    }

    public function TraerDeArchivo(string $nombreArchivo){

        //../archivos/empleados.txt
        $fp = fopen($nombreArchivo, "r");
        while ($line = fgets($fp)) {
            $datos = explode(" ", $line);
            $empleado = new Empleado($datos[2], $datos[1], (int)$datos[3], $datos[4], (int)$datos[0], (float)$datos[6], $datos[5]);
            $this->AgregarEmpleado($empleado);
        }
        fclose($fp);
    }

    function GuardarEnArchivo(string $nombreArchivo){
    
        $file = fopen($nombreArchivo, "w");
        foreach($this->_empleados as $empleado){
            fwrite($file, $empleado->ToString()."\r\n");
        }
        fclose($file);
    }

    public function CalcularSueldo(){

        $totalSueldoEmpleados = 0;
        foreach($this->_empleados as $empleado){
            $totalSueldoEmpleados += $empleado->GetSueldo();
        }

        return $totalSueldoEmpleados;
    }

    public function EliminarEmpleado(Empleado $e){
        
        $empleadoId = -1;
        for($i = 0;$i < count($this->_empleados); $i++){

            if($this->_empleados[$i]->GetDNI() == $e->GetDNI()){
                $empleadoId = $i;
                echo "E. ". $e->ToString() ." - Eliminado<br>";
            }
        }
        if($empleadoId >= 0){
            unset($this->_empleados[$empleadoId]);
            return true;
        }else{
            return false;
        }
    }

    private function EliminarEmpleadoRepetido(){
        
        array_unique($this->_empleados, 3);
    }

    public function ToString(){
        echo "{$this->_razonSocial} - Cantidad de empleados maxima {$this->_cantMaxima} - Cantidad empleados ";
        echo count($this->_empleados) ." <br><br>Empleados<br><br>";
        foreach($this->_empleados as $emp){
            $emp->ToString();
            echo "<br><br>";
        }
    }
}


?>