<?php

namespace App\Tests;

use App\Course2;
use App\Lesson;
use PHPUnit\Framework\TestCase;

class Course2Test extends TestCase
{
    public function test()
    {
        $lessons = [
            new Lesson('angular', 3),
            new Lesson('vue', 9),
            new Lesson('react', 2),
            new Lesson('redux', 4),
        ];
        $course = new Course2($lessons);
        $lesson = $course->maxBy(function ($l1, $l2) {
            return $l1->getDuration() <=> $l2->getDuration();
        });
        $this->assertEquals(9, $lesson->getDuration());
    }

    public function test2()
    {
        $lessons = [
        ];
        $course = new Course2($lessons);
        $lesson = $course->maxBy(function ($l1, $l2) {
            return $l1->getDuration() <=> $l2->getDuration();
        });
        $this->assertNull($lesson);
    }
}
