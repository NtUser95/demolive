<?php

namespace App;

// Вызовы геттеров и сеттеров упразднить через магические методы
class User
{
    private $flashes = [];
    /**
     * @var string
     */
    private $cityName;
    /**
     * @var string
     */
    private $name;
    /**
     * @var integer
     */
    private $age;

    public function __construct() {
    }

    public function setFlash(String $type, String $msg) : void
    {
        $this->flashes[] = ['type' => $type, 'message' => $msg];
    }

    public function getFlashes() : array
    {
        return $this->flashes;
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param string $cityName
     */
    public function setCityName(string $cityName): void
    {
        $this->cityName = $cityName;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}