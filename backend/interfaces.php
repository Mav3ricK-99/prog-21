<?php

interface IArchivo
{
    public function GuardarEnArchivo(string $nombreArchivo);
    public function TraerDeArchivo(string $nombreArchivo);
}


?>