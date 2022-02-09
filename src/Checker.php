<?php

namespace App;

    use PHPUnit\Runner\AfterLastTestHook;
    use App\Tests\CourseTest;

final class Checker implements AfterLastTestHook
{
    public function executeAfterLastTest(): void
    {
        new CourseTest();
    }
}
