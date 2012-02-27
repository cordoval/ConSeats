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

    /**
     * @covers  ConSeats\Domain\Seat::reserve
     * @depends testIsInitiallyNotReserved
     */
    public function testCanBeReserved(Seat $seat)
    {
        $seat->reserve();
        $this->assertTrue($seat->isReserved());

        return $seat;
    }

    /**
     * @covers            ConSeats\Domain\Seat::reserve
     * @depends           testCanBeReserved
     * @expectedException ConSeats\Domain\Exception
     */
    public function testReservingAnAlreadyReservedSeatRaisesAnException(Seat $seat)
    {
        $seat->reserve();
    }

    /**
     * @covers  ConSeats\Domain\Seat::cancelReservation
     * @depends testCanBeReserved
     */
    public function testCancellingAReservedSeatWorks(Seat $seat)
    {
        $seat->cancelReservation();
        $this->assertFalse($seat->isReserved());
    }

    /**
     * @covers            ConSeats\Domain\Seat::cancelReservation
     * @depends           testIsInitiallyNotReserved
     * @expectedException ConSeats\Domain\Exception
     */
    public function testTryingToCancelASeatThatIsNotReservedRaisesAnException(Seat $seat)
    {
        $seat->cancelReservation();
    }
}
