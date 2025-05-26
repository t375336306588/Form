<?php

namespace Form;

class Rating extends Field
{
    
    public function __construct($name, $label, $required = false)
    {
        $this->name = trim($name);
        $this->label = trim($label);
        $this->value = "";
        $this->required = $required;
        
        if (isset($_POST[$this->name])) {
            $this->value = trim(htmlentities(strip_tags($_POST[$this->name])));
            $this->value = (int) $this->value;
            if ($this->value < 1) {
                $this->value = 1;
            }
            if ($this->value > 5) {
                $this->value = 5;
            }
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