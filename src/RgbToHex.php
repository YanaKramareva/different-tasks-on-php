<?php

/*
 * Для задания цветов в HTML и CSS используются числа в шестнадцатеричной системе счисления. Чтобы не возникало путаницы в определении системы счисления, перед шестнадцатеричным числом ставят символ решетки #, например, #135278. Обозначение цвета (rrggbb) разбивается на три составляющие, где первые два символа обозначают красную компоненту цвета, два средних — зеленую, а два последних — синюю. Таким образом каждый из трех цветов — красный, зеленый и синий — может принимать значения от 00 до FF в шестнадцатеричной системе исчисления.

src/Solution.php
При работе с цветами часто нужно получить отдельные значения красного, зеленого и синего (RGB) компонентов цвета в десятичной системе исчисления и наоборот. Реализуйте функции rgbToHex и hexToRgb, которые конвертируют цвета в соответствующие представления.

Функция hexToRgb принимает строку с цветом в шестнадцатеричном формате и возвращает массив компонентов.

Функция rgbToHex принимает 3 параметра (цветные компоненты) и возвращает строку.

Примеры:
<?php
hexToRgb('#24ab00'); // ['r' => 36, 'g' => 171, 'b' => 0]

rgbToHex(36, 171, 0); // '#24ab00'

function rgbToHex($r, $g, $b)
{
    $hex = array_map(fn($channel) => str_pad(dechex($channel), 2, '0', STR_PAD_LEFT), [$r, $g, $b]);
    return '#' . implode('', $hex);
}

function hexToRgb($hex)
{
    $value = ltrim($hex, '#');
    [$r, $g, $b] = array_map(fn($color) => hexdec($color), str_split($value, 2));
    return ['r' => $r, 'g' => $g, 'b' => $b];
}
 */


namespace App\Solution;

function rgbToHex(int $r, int $g, int $b): string
{
    $input = "{$r} {$g} {$b}";
    $result = function ($c) {
        if (!$c) {
            return false;
        }
        $c = trim($c);
        $out = false;
        if (preg_match("/^[0-9ABCDEFabcdef]+$/i", $c)) {
            $c = str_replace('#', '', $c);
            $l = strlen($c) == 3 ? 1 : (strlen($c) == 6 ? 2 : false);

            if ($l) {
                unset($out);
                $out[0] = $out['r'] = $out['red'] = hexdec(substr($c, 0, 1 * $l));
                $out[1] = $out['g'] = $out['green'] = hexdec(substr($c, 1 * $l, 1 * $l));
                $out[2] = $out['b'] = $out['blue'] = hexdec(substr($c, 2 * $l, 1 * $l));
            } else {
                $out = false;
            }
        } elseif (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $c)) {
            $spr = str_replace(array(',',' ','.'), ':', $c);
            $e = explode(":", $spr);
            if (count($e) != 3) {
                return false;
            }
            $out = '#';
            for ($i = 0; $i < 3; $i++) {
                $e[$i] = dechex(($e[$i] <= 0) ? 0 : (($e[$i] >= 255) ? 255 : $e[$i]));
            }

            for ($i = 0; $i < 3; $i++) {
                $out .= ((strlen($e[$i]) < 2) ? '0' : '') . $e[$i];
            }

            $out = strtoupper($out);
        } else {
            $out = false;
        }

        return strtolower($out);
    };
    return $result($input);
}

function hexToRgb($hexstr)
{
    $int = hexdec($hexstr);

    return array("r" => 0xFF & ($int >> 0x10), "g" => 0xFF & ($int >> 0x8), "b" => 0xFF & $int);
}
