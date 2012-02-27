<?php
namespace ConSeats\Domain\Tests;

use ConSeats\Domain\Seat;

class SeatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ConSeats\Domain\Seat::isAvailable
     */
    public function testIsInitiallyAvailable()
    {
        $seat = new Seat;
        $this->assertTrue($seat->isAvailable());
    }

    /**
     * @covers ConSeats\Domain\Seat::isReserved
     */
    public function testIsInitiallyNotReserved()
    {
        $seat = new Seat;
        $this->assertFalse($seat->isReserved());
    }
}
