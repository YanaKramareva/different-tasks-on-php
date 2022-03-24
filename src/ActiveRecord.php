<?php

namespace App;

interface ActiveRecord
{
    public function __construct(DbInterface $connection);

    public function save();
}
