<?php

namespace Planck\Pattern;



class Decorator
{
     private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }


    public function __call($methodName, $parameters)
    {
        
    }




}







