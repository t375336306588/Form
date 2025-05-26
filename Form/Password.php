<?php

namespace Form;

class Password extends Field
{
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        
        $number = preg_match('@[0-9]@', $this->value);
        $uppercase = preg_match('@[A-Z]@', $this->value);
        $lowercase = preg_match('@[a-z]@', $this->value);
        $specialChars = preg_match('@[^\w]@', $this->value);
        /* 
        echo "number:";
        var_dump($number);
        echo "<br>";
        
        echo "uppercase:";
        var_dump($uppercase);
        echo "<br>";
        
        echo "lowercase:";
        var_dump($lowercase);
        echo "<br>";
        
        echo "specialChars:";
        var_dump($specialChars);
        echo "<br>";
        
         */
        if (mb_strlen($this->value) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
            return false;
        }
        
        return true;
    }
    
    public function toHtmlLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": " . $this->hash() . "<br>";
        }
        return "";
    }
    
    public function toTextLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": " . $this->hash();
        }
        return "";
    }
    
    public function getValue()
    {
        return $this->hash();
    }
    
    public function hash()
    {
        return crypt($this->value, $_SERVER["SERVER_NAME"]);
    }
    
}