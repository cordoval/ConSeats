<?php
namespace ConSeats\Domain\Tests;

use ConSeats\Domain\Seat;

class SeatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ConSeats\Domain\Seat::isReserved
     */
    public function testIsInitiallyNotReserved()
    {
        $seat = new Seat;
        $this->assertFalse($seat->isReserved());

        return $seat;
    }

    /**
     * @covers  ConSeats\Domain\Seat::isAvailable
     * @depends testIsInitiallyNotReserved
     */
    public function testIsInitiallyAvailable(Seat $seat)
    {
        $this->assertTrue($seat->isAvailable());
    }
}
