<?php

namespace App\Tests;

use App\Course;
use PHPUnit\Framework\TestCase;

/*
 * Реализуйте тест CourseTest, проверяющий работоспособность метода getName() класса Course.

Подсказки
Класс Course можно найти в /src/Course.php

 */
// BEGIN (write your solution here)
class CourseTest extends TestCase
{
    public function testCourse()
    {
        $name = "Yana";
        $course = new Course($name);
        $this->assertEquals($name, $course->getName());
    }
}
// END
