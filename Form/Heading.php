<?php

namespace Form;

class Heading
{
    protected $value;
    
    public function __construct($value, $label, $required = false)
    {
        $this->value = $value;
    }
    
    public function isValid()
    {
        return true;
    }
    
    
    public function toHtmlLine()
    {
        return "<div style='margin-top:20px;font-size:16px;font-weight:bold;'>" . $this->value . "</div>";
    }
    
}