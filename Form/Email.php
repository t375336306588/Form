<?php

namespace Form;

class Email extends Field
{
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        return preg_match("/.+@.+\..+/i", $this->value) ? true : false;
    }
    
    public function toHtmlLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": <a href='mailto:" . $this->value . "'>" . $this->value . "</a><br>";
        }
        return "";
    }
    
}