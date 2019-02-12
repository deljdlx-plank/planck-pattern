<?php

namespace Planck\Pattern;


class Compositor extends Decorator
{

    private $injectedObjects = [];


    public function inject($instance, $name = null)
    {
        if($name === null) {
            $this->injectedObjects[] = $instance;
        }
        else {
            $this->injectedObjects[$name] = $instance;
        }
        return $this;
    }

}


