<?php

namespace Form;

class Phone extends Field
{
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        return preg_match("#^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$#", $this->value) ? true : false;
    }
    
    public function toHtmlLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": <a href='tel:" . $this->value . "'>" . $this->value . "</a><br>";
        }
        return "";
    }
    
}