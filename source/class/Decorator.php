<?php

namespace Planck\Pattern;



use Planck\Exception;

class Decorator
{
     private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function getDecoratedObject()
    {
        return $this->object;
    }


    public function __call($methodName, $parameters)
    {
        if(method_exists($this->object, $methodName)) {
            $returnValue = call_user_func_array(
               array($this->object, $methodName),
               $parameters
            );

            if($returnValue === $this->object) {
                return $this;
            }
            else {
                return $returnValue;
            }

        }
        else {
            throw new Exception(
                '(In decorator '.get_class($this).') Call to undefined method '.get_class($this->object).'::'.$methodName
            );
        }
    }




}







