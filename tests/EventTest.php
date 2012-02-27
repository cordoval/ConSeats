<?php
namespace ConSeats\Domain\Tests;

use ConSeats\Domain\Event;

class EventTest extends \PHPUnit_Framework_TestCase
{
    protected $event;
    protected $room;

    /**
     * @covers ConSeats\Domain\Event::__construct
     * @covers ConSeats\Domain\Event::setRoom
     */
    protected function setUp()
    {
        $this->room = $this->getMockBuilder('ConSeats\\Domain\\Room')
                           ->disableOriginalConstructor()
                           ->getMock();

        $this->event = new Event(
          'Advanced PHP Training', '2012-02-27', $this->room
        );
    }

    /**
     * @covers ConSeats\Domain\Event::getName
     */
    public function testNameCanBeRetrieved()
    {
        $this->assertEquals(
          'Advanced PHP Training', $this->event->getName()
        );
    }

    /**
     * @covers ConSeats\Domain\Event::setName
     */
    public function testNameCanBeChanged()
    {
        $this->event->setName('Very Advanced PHP Training');

        $this->assertEquals(
          'Very Advanced PHP Training', $this->event->getName()
        );
    }

    /**
     * @covers ConSeats\Domain\Event::getDate
     */
    public function testDateCanBeRetrieved()
    {
        $this->assertEquals(
          '2012-02-27', $this->event->getDate()
        );
    }

    /**
     * @covers ConSeats\Domain\Event::setDate
     */
    public function testDateCanBeChanged()
    {
        $this->event->setDate('2013-02-25');
        $this->assertEquals('2013-02-25', $this->event->getDate());
    }

    /**
     * @covers ConSeats\Domain\Event::reserveSeat
     */ 
    public function testDelegatesSeatReservationToRoom()
    {
        $this->room->expects($this->once())
                   ->method('reserveSeat');
        $this->event->reserveSeat();
    }   
 
 
    public function testReserveSeatReturnsASeat()
    {
        $seat = $this->getMock('ConSeats\\Domain\\Seat');
        $this->room->expects($this->once())
                   ->method('reserveSeat')
                   ->will($this->returnValue($seat));
        $this->assertSame($seat, $this->event->reserveSeat());        
    }
    
}
