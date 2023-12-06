<?php
namespace Traits;

use BadFunctionCallException;

trait GetterTrait {
    public function getClassVariable(string $variableName): mixed{
        try{
            if (!isset($this->$variableName)) {
                throw new BadFunctionCallException("Class variable {$variableName} does not exist.");
            }
            return $this->$variableName;
        }
        catch(BadFunctionCallException $e){
            echo "Bad function call exception called: {$e}", PHP_EOL;
        }
    }
}
