<?php

namespace App;

// TODO: использование идентификатора errors в форме пользователя может испортить нам вечеринку.
// Надо бы, что-то с этим сделать... Наверное...
class Model
{
    private $errors = [];

    public function load() : bool
    {
        $changed = false;
        foreach ($_POST as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
                $changed = true;
            }
        }

        return $changed;
    }

    public function hasErrors() : bool
    {
        return count($this->errors);
    }

    public function getErrors() : array
    {
        return $this->errors;
    }

    public function addError(String $errMessage) : void
    {
        $this->errors[] = $errMessage;
    }

    public function reset() : void
    {
        foreach (get_class_vars(get_class($this)) as $propName => $value) {
            if($propName === 'error') {
                $this->$propName = [];
            } else {
                $this->$propName = null;
            }
        }
    }
}