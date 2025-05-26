<?php

namespace Form;

class Field
{
    protected $name; //идентификатор в html
    protected $label; //название поля
    protected $value;
    protected $required;
    
    public function __construct($name, $label, $required = false)
    {
        $this->name = trim($name);
        $this->label = trim($label);
        $this->value = "";
        $this->required = $required;
        
        if (isset($_POST[$this->name])) {
            $this->value = trim(htmlentities(strip_tags($_POST[$this->name])));
            if ($this->value == "on") {
                $this->value = "+";
            }
        }
    }
    
    public function setValue($value)
    {
        $this->value = trim(htmlentities(strip_tags($value)));
    }
    
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        return mb_strlen($this->value) >= 1 ? true : false;
    }
    
    public function toHtmlLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": " . $this->value . "<br>";
        }
        return "";
    }
    
    public function toTextLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": " . $this->value;
        }
        return "";
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getLabel()
    {
        return $this->label;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function getRequired()
    {
        return $this->required;
    }
}