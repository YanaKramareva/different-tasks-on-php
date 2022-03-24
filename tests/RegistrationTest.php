<?php

// Гипотетический пример
/*class RegistrationTest extends TestCase
{
    private $connect;

    public function setUp(): void
    {
        $this->connect = /* connect to db *//*;
        $this->connect->beginTransaction();
    }

    public function testRegisterUser(): void
    {
        // Внутри идет добавление данных в базу
        $id = registerUser(['name' => 'Mike']);
        $user = User::find($id);
        $this->assertEquals('Mike', $user->name);
    }

    public function tearDown(): void
    {
        // За счет отката база возвращается в исходное состояние
        $this->connect->rollbackTransaction();
    }
}
*/