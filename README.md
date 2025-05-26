# Form


```php
<?php

require_once "vendor/autoload.php";

$fields = [
    new \Form\Field('f1', "ФИО", true),
    new \Form\Phone('f2', "Номер телефона", true),
    new \Form\Email('f3', "Электронная почта", true),
    new \Form\Field('f4', "№ и дата заказа", true),
    new \Form\Field('f5', "Проблема", true),
];


$message = "";        

foreach ($fields as $field) {
    if (!$field->isValid()) {
       $response = "Некорректно заполнено поле '" . $field->getLabel() . "'!";
    }
    $message .= $field->toHtmlLine();        
}

```
