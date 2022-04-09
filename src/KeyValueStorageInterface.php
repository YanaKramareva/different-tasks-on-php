<?php

/*
 * В этом задании используется класс InMemoryKV, с которым вы недавно работали.
 * Теперь мы добавим ему интерфейс и дополнительно реализуем сериализацию.

src/KeyValueStorageInterface.php
Реализуйте интерфейс KeyValueStorageInterface, который расширяет интерфейс \Serializable
и имеет следующие методы:

set($key, $value);
get($key, $default = null);
unset($key);
toArray();
src/InMemoryKV.php
Реализуйте в классе InMemoryKV интерфейс \Serializable, который встроен в PHP.
Этот интерфейс позволяет применять к объектам методы serialize и unserialize.
Функция serialize позволяет представить объект строкой и сохранить его куда-нибудь в файловую систему
 или передать по сети.
Функция unserialize выполняет обратную операцию и восстанавливает сериализованный объект.
Для сериализации используйте json_encode, для десериализации json_decode.
 interface KeyValueStorageInterface extends \Serializable
{
    public function set($key, $value);
    public function get($key, $default = null);
    public function unset($key);
    public function toArray();
}
*/
namespace App;

interface KeyValueStorageInterface extends \Serializable
{
    public function set($key, $value);

    public function get($key, $default = null);

    public function unset($key);

    public function toArray();

    public function serialize();

    public function unserialize($db);

    public function getData();
}
