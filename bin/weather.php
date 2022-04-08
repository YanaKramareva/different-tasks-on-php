<?php

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}

use App\WeatherService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;

// BEGIN (write your solution here)
$weather = new WeatherService(new \GuzzleHttp\Client());
$data = $weather->lookup($argv[1]);
echo "Temperature in {$data['name']}: {$data['temperature']}C";
// END
