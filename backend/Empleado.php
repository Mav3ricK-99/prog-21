<?php

class Empleado extends Persona{


    private int $_legajo;
    private float $_sueldo;
    private string $_turno;

    public function __construct(string $nombre, string $apellido, int $dni, string $sexo, int $legajo, float $sueldo, string $turno){

        parent::__construct($nombre, $apellido, $dni, $sexo);
        $this->_legajo = $legajo;
        $this->_sueldo = $sueldo;
        $this->_turno = $turno;
    }

    public function GetLegajo(){
        return $this->_legajo;
    }

    public function GetSueldo(){
        return $this->_sueldo;
    }
    
    public function GetTurno(){
        return $this->_turno;
    }

    public function Hablar(array $idiomas){
       
        echo "El empleado habla ";
        foreach($idiomas as $idioma){
            echo $idioma . " ";
        }
    }

    public function ToString(){
        $empleadoStr = $this->_legajo ." ". $this->GetApellido() ." ". $this->GetNombre() ." ". $this->GetDNI();
        $empleadoStr .= " ". $this->GetSexoCompleto();
        $empleadoStr .= " ". $this->_sueldo ." ". $this->_turno;

        return $empleadoStr;
    }

}


?>