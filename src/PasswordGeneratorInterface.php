<?php

namespace App;

interface PasswordGeneratorInterface
{
    public function generatePassword($length, $options);
}
