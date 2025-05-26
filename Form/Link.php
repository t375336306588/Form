<?php

namespace Form;

class Link extends Field
{
    public function isValid()
    {
        if (!$this->required) {
            return true;
        }
        return filter_var($this->value, FILTER_VALIDATE_URL) ? true : false;
    }
    
    public function toHtmlLine()
    {
        if ($this->isValid($this->value) && mb_strlen($this->value)) {
            return $this->label . ": <a href='" . $this->value . "'>" . parse_url($this->value, PHP_URL_PATH) . "</a><br>";
        }
        return "";
    }
    
}