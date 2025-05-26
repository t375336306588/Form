<?php

namespace Form;

class Checkbox extends Field
{
    public function __construct($name, $label, $required = false)
    {
        $this->name = trim($name);
        $this->label = trim($label);
        $this->value = "";
        $this->required = $required;
        
        $this->value = "нет";
        if (isset($_POST[$this->name])) {
            $this->value = "да";
        }
    }
    
    public function isValid()
    {
        return true;
    }
    
    public function toHtmlLine()
    {
        return $this->label . ": " . $this->value . "<br>";
    }
    
}