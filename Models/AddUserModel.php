<?php

namespace Models;

use App\App;
use App\Model;

class AddUserModel extends Model
{
    public $age;
    public $name;
    public $city;

    public function getAllCities() : array
    {
        return App::$db->execute('SELECT * FROM `cities`');
    }

    private function isValidCity(string $city) : bool
    {
        foreach ($this->getAllCities() as $value) {
            if($city === $value['id']) return true;
        }

        return false;
    }

    public function processFormData() {
        if($this->age <= 9 || $this->age >= 100) {
            $this->addError('invalid age');
        } else if(strlen($this->name) < 1 || strlen($this->name) > 99) {
            $this->addError('invalid name');
        } else if(strlen($this->city) < 1 || strlen($this->city) > 99 || !$this->isValidCity($this->city)) {
            $this->addError('invalid city');
        } else { // all data is correct...
            $this->saveUser();
        }
    }

    private function saveUser() : void
    {
        $query = "INSERT INTO `users` (`name`, `age`, `city_id`) VALUES (:name, :age, :city_id);";
        App::$db->execute($query, [
            'name' => $this->name,
            'age' => $this->age,
            'city_id' => $this->city,
        ]);
    }
}