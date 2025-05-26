<?php

namespace Form;

class Ip extends Field
{
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        return filter_var($this->value, FILTER_VALIDATE_IP) ? true : false;
    }
    
}