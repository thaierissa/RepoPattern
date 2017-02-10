<?php

class Container {
    /**
     * The container storage
     * @var Array
     */
    private $container = [];
    /**
     * Class constructor
     */
    public function __construct() {
    }
    /**
     * Registers an object to the container
     *
     * @param string $name The key
     * @param object $class The object
     */
    public function Register($name, $class) {
        if(!is_string($name)) throw new Exception("Invalid Input");
        if(!is_object($class)) throw new Exception("Invalid input");
        if(array_key_exists($name,$this->container)) throw new Exception("Existing key");
        $this->container[$name] = $class;
    }
    /**
     * Resolves an object from the container
     *
     * @param string $name The key
     */
    public function Resolve($name) {
        if(!is_string($name)) throw new Exception("Invalid Input");
        if(array_key_exists($name,$this->container)) return $this->container[$name];
    }
}

?>