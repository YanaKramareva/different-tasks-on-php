<?php

namespace App\User;

/*
 * В задании необходимо реализовать пользователей которым можно добавлять адреса.
 *  Такое часто встречается в интернет магазинах, когда у одного пользователя может быть набор разных адресов
 *  для доставки. Пользователь и адрес представлены двумя классами:

App\User\Address
App\User
src/User/Address.php
Реализуйте следующие публичные методы:

__construct($country, $city, $street)
getCountry() — возвращает страну.
getCity() — возвращает город.
getStreet() — возвращает улицу.
setCountry($country) — устанавливает страну.
setCity($city) — устанавливает город.
setStreet($street) — устанавливает улицу.
namespace App\User;

// BEGIN
class Address
{
    private $country;
    private $city;
    private $street;

    public function __construct($country, $city, $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }
}
 */

class Address
{
    private array $address;
private string $country;
private string $city;
private string $street;

    public function __construct($country, $city, $street)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->address = ['country' => $this->country, 'city' => $this->city, 'street' => $this->street];
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getSreet()
    {
        return $this->street;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function setStreet($street): void
    {
        $this->street = $street;
    }
}