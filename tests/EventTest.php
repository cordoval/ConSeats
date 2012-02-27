<?php
namespace ConSeats\Domain\Tests;

use ConSeats\Domain\Event;

class EventTest extends \PHPUnit_Framework_TestCase
{
    protected $event;
    protected $room;

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
     * @covers ConSeats\Domain\Event::__construct
     */
    public function testIsCorrectlyConstructed()
    {
        $this->assertEquals(
          'Advanced PHP Training', $this->event->getName()
        );

        $this->assertEquals('2012-02-27', $this->event->getDate());
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
}
