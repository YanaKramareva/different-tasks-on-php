<?php

namespace App;

use Carbon\Carbon;

/*
 * Booking — процесс бронирования чего-либо. В интернете существует множество сайтов, предлагающих бронирование машин, квартир, домов, самолётов и многого другого. Несмотря на то, что такие сайты предлагают разные услуги, букинг везде работает почти идентично. Выбираются нужные даты и, если они свободны, производится бронирование.

src\Booking.php
Реализуйте класс Booking, который позволяет бронировать номер отеля на определённые даты.
 Единственный интерфейс класса — функция book(), которая принимает на вход две даты в текстовом формате.
Если бронирование возможно, то метод возвращает true
 и выполняет бронирование (даты записываются во внутреннее состояние объекта).

Класс CarbonPeriod не подключен в задаче по умолчанию, используйте интерфейс объекта Carbon для работы с датами.

Примеры
<?php

$booking = new Booking();
$booking->book('11-11-2008', '13-11-2008'); // true
$booking->book('12-11-2008', '12-11-2008'); // false
$booking->book('10-11-2008', '12-11-2008'); // false
$booking->book('12-11-2008', '14-11-2008'); // false
$booking->book('10-11-2008', '11-11-2008'); // true
$booking->book('13-11-2008', '14-11-2008'); // true
Подсказки
По обычаям гостиничного сервиса время заселения в номер — после полудня первого дня,
 а время выселения — до полудня последнего дня. Конкретные часы варьируются в разных отелях. Но в данной практике это не важно, главное понять принцип, по которому указываются даты:

<?php

$booking = new Booking();

// забронировать номер на два дня
$booking->book('10-11-2008', '12-11-2008');

// бронь невозможна, 11-го числа номер будет занят
$booking->book('11-11-2008', '15-11-2008');

// бронь возможна, потому что 12-го числа номер освободится
$booking->book('12-11-2008', '13-11-2008');

// бронь невозможна, съём, сроком менее одного дня, обычно не практикуется
$booking->book('17-11-2008', '17-11-2008');

// бронь возможна, съём номера на один день
$booking->book('17-11-2008', '18-11-2008');
class Booking
{
    private $dates = [];

    public function book($begin, $end)
    {
        $carbonNewBegin = new Carbon($begin);
        $carbonNewEnd = new Carbon($end);
        if ($this->canBook($carbonNewBegin, $carbonNewEnd)) {
            $this->dates[] = [$carbonNewBegin, $carbonNewEnd];
            return true;
        }

        return false;
    }

    public function canBook($begin, $end)
    {
        if ($begin >= $end) {
            return false;
        }

        foreach ($this->dates as [$bookedBegin, $bookedEnd]) {
            $isIntersected = $begin < $bookedEnd && $end > $bookedBegin;
            if ($isIntersected) {
                return false;
            }
        }
        return true;
    }
}
 */
/*class Booking
{
    private array $reservedDates;

    public function __construct()
    {
        $this->reservedDates = ['arrive' => [], 'departure' => []];
    }

    private function canBook(string $start, string $end): bool
    {
        $arriveDate = new Carbon($start);
        $departureDate = new Carbon($end);

        if ($arriveDate >= $departureDate){
            return false;
        }
        if ($arriveDate->EqualTo($this->reservedDates['arrive'])){
            return false;
        }
        if ($departureDate->EqualTo($this->reservedDates['departure'])){
            return false;
        }
        if ($arriveDate->isBetween($this->reservedDates['arrive'], $this->reservedDates['departure'], false)){
            return false;
        }
        if ($departureDate->isBetween($this->reservedDates['arrive'], $this->reservedDates['departure'], false)){
            return false;
        }
        if ($arriveDate->lessThan($this->reservedDates['arrive']) &&
            $departureDate->isBetween($this->reservedDates['arrive'], $this->reservedDates['departure'], false)) {
            return false;
        }
        if ($arriveDate->lessThan($this->reservedDates['arrive']) &&
            $departureDate->greaterThan( $this->reservedDates['departure'])) {
            return false;
        }
        if ($arriveDate->greaterThanOrEqualTo($this->reservedDates['arrive']) &&
            $departureDate->lessThanOrEqualTo( $this->reservedDates['departure'])) {
            return false;
        }
        return true;
    }

    public function book(string $start, string $end)
    {
        $arriveDate = new Carbon($start);
        $departureDate = new Carbon($end);

        if ( $this->canBook($start, $end)) {
            $this->reservedDates = ['arrive' => $arriveDate, 'departure' => $departureDate];
            return true;
        }
        return false;
    }
}*/

class Booking
{
    private $dates = [];

    public function book($begin, $end)
    {
        $carbonNewBegin = new Carbon($begin);
        $carbonNewEnd = new Carbon($end);
        if ($this->canBook($carbonNewBegin, $carbonNewEnd)) {
            $this->dates[] = [$carbonNewBegin, $carbonNewEnd];
            return true;
        }

        return false;
    }

    public function canBook($begin, $end)
    {
        if ($begin >= $end) {
            return false;
        }

        foreach ($this->dates as [$bookedBegin, $bookedEnd]) {
            $isIntersected = $begin < $bookedEnd && $end > $bookedBegin;
            if ($isIntersected) {
                return false;
            }
        }
        return true;
    }
}
