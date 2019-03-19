<?php

namespace Planck\Pattern\Traits;



use Planck\Exception;
use Planck\Model\Entity;

trait Decorator
{
    /**
     * @var Entity
     */
    private $decoratedObject;

    public function decorate($object)
    {
        $this->decoratedObject = $object;

        foreach ($this->decoratedObject as $attribute => &$value) {
            $this->$attribute = &$value;
        }

    }

    public function getDecoratedObject()
    {
        return $this->decoratedObject;
    }


    public function __call($methodName, $parameters)
    {

        if(method_exists($this->decoratedObject, $methodName)) {
            $returnValue = call_user_func_array(
               array($this->decoratedObject, $methodName),
               $parameters
            );

            if($returnValue === $this->decoratedObject) {
                return $this;
            }
            else {
                return $returnValue;
            }

        }
        else {
            throw new Exception(
                '(In decorator '.get_class($this).') Call to undefined method '.get_class($this->decoratedObject).'::'.$methodName
            );
        }
    }




}







