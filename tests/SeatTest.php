<?php
namespace ConSeats\Domain\Tests;

use ConSeats\Domain\Seat;

class SeatTest extends \PHPUnit_Framework_TestCase
{
    public function testIsInitiallyAvailable()
    {
        $seat = new Seat;
        $this->assertTrue($seat->isAvailable());
    }
}
