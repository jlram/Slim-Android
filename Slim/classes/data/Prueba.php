<?php

namespace data;


class Prueba {
    
    public $datoprimero, $datosegundo;
    
    function __construct($datoprimero = "Dato 1", $datosegundo = "Dato 2") {
        $this->datoprimero = $datoprimero;
        $this->datosegundo = $datosegundo;
    }
    
    function getDatos() {
        return $this->datoprimero . " y " . $this->datosegundo;
    }
    
}