<?php
/**
 * Neuron - DuckBrain
 *
 * Neuron, sirve para crear un objeto que alojará valores, pero
 * además tiene la característica especial de que al intentar
 * acceder a un atributo que no está definido devolerá nulo en
 * lugar de generar un error php notice que indica que se está
 * intentando acceder a un valor no definido.
 *
 * El constructor recibe un objeto o arreglo con los valores que
 * sí estarán definidos.
 *
 * @author KJ
 * @website https://kj2.me
 * @licence MIT
 */

namespace Libs;

class Neuron {

    private $data;

    public function __construct($data = []){
        $this->data = (array) $data;
    }

    public function __isset($index) {
        return isset($this->data[$index]);
    }

    public function __get($index){
        return (isset($this->data[$index]) && $this->data[$index] != '')
                                                                   ? $this->data[$index] : null;
    }
}

?>
