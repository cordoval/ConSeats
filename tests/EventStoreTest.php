<?php

namespace ConSeats\Backends\Tests
{
    use ConSeats\Backends\EventStore;
    use ConSeats\Backends\Tests\DomainObject;

    class EventStoreTest extends \PHPUnit_Framework_TestCase
    {
        protected $store;

        public static function setUpBeforeClass()
        {
            \vfsStream::setup('EventStoreTest');
        }

        /**
         * @covers ConSeats\Backends\EventStore::__construct
         */
        protected function setUp()
        {
            $this->store = new EventStore(
              \vfsStream::url('EventStoreTest') . '/'
            );
        }

        /**
         * @covers            ConSeats\Backends\EventStore::store
         * @covers            ConSeats\Backends\Exception
         * @expectedException ConSeats\Backends\Exception
         */
        public function testStoringNonObjectRaisesException()
        {
            $this->store->store('this-is-not-an-object');
        }

        /**
         * @covers            ConSeats\Backends\EventStore::retrieve
         * @covers            ConSeats\Backends\Exception
         * @expectedException ConSeats\Backends\Exception
         */
        public function testRetrievingNonexistingIdRaisesException()
        {
            $this->store->retrieve('this-is-not-a-valid-id');
        }

        /**
         * @covers ConSeats\Backends\EventStore::store
         * @covers ConSeats\Backends\EventStore::exists
         * @covers ConSeats\Backends\EventStore::getFilename
         */
        public function testStoresObject()
        {
            $object = $this->getEvent();
            $id = $this->store->store($object);

            $this->assertTrue($this->store->exists($id));

            return array($object, $id);
        }

        /**
         * @covers  ConSeats\Backends\EventStore::retrieve
         * @covers  ConSeats\Backends\EventStore::getFilename
         * @depends testStoresObject
         */
        public function testRetrievesObject(array $data)
        {
            $this->assertEquals($data[0], $this->store->retrieve($data[1]));
        }

        /**
         * @covers ConSeats\Backends\EventStore::store
         */
        public function testReturnsIdWhenNewObjectsAreStored()
        {
            $object = $this->getEvent();        
            $this->assertNotNull($this->store->store($object));
        }
        
        protected function getEvent()
        {
            return $this->getMockBuilder('ConSeats\\Domain\\Event')
                        ->disableOriginalConstructor()
                        ->getMock();
        }
    }
}
