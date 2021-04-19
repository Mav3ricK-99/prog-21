<?php

abstract class Persona{


    private string $_apellido, $_nombre;
    private int $_dni;
    private string $_sexo;

    public function __construct(string $nombre, string $apellido, int $dni, string $sexo){
        
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_dni = $dni;
        $this->_sexo = $sexo;

    }

    public function GetNombre(){
        return $this->_nombre;
    }

    public function GetApellido(){
        return $this->_apellido;
    }
    
    public function GetDNI(){
        return $this->_dni;
    }
    
    public function GetSexo(){
        return $this->_sexo;
    }

    public function GetSexoCompleto(){

        switch($this->_sexo){
            case 'H': return "Hombre";break;
            case 'M': return "Mujer";break;
            default:  return 'Boeing AH-64 Apache';break;
        }
    }

    abstract public function Hablar(array $idioma);

    abstract public function ToString();
    

}