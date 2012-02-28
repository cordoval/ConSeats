<?php

namespace ConSeats\Backends\Tests
{
    use ConSeats\Backends\NoSqlStore;
    use ConSeats\Backends\Tests\DomainObject;

    class NoSqlStoreTest extends \PHPUnit_Framework_TestCase
    {
        protected $store;

        public static function setUpBeforeClass()
        {
            \vfsStream::setup('NoSqlStoreTest');
        }

        /**
         * @covers ConSeats\Backends\NoSqlStore::__construct
         */
        protected function setUp()
        {
            $this->store = new NoSqlStore(
              \vfsStream::url('NoSqlStoreTest') . '/'
            );
        }

        /**
         * @covers            ConSeats\Backends\NoSqlStore::store
         * @covers            ConSeats\Backends\Exception
         * @expectedException ConSeats\Backends\Exception
         */
        public function testStoringNonObjectRaisesException()
        {
            $this->store->store('this-is-not-an-object');
        }

        /**
         * @covers            ConSeats\Backends\NoSqlStore::retrieve
         * @covers            ConSeats\Backends\Exception
         * @expectedException ConSeats\Backends\Exception
         */
        public function testRetrievingNonexistingIdRaisesException()
        {
            $this->store->retrieve('this-is-not-a-valid-id');
        }

        /**
         * @covers ConSeats\Backends\NoSqlStore::store
         * @covers ConSeats\Backends\NoSqlStore::exists
         * @covers ConSeats\Backends\NoSqlStore::getFilename
         */
        public function testStoresObject()
        {
            $object = new DomainObject();
            $id = $this->store->store($object);

            $this->assertTrue($this->store->exists($id));

            return array($object, $id);
        }

        /**
         * @covers  ConSeats\Backends\NoSqlStore::retrieve
         * @covers  ConSeats\Backends\NoSqlStore::getFilename
         * @depends testStoresObject
         */
        public function testRetrievesObject(array $data)
        {
            $this->assertEquals($data[0], $this->store->retrieve($data[1]));
        }

        /**
         * @covers ConSeats\Backends\NoSqlStore::store
         */
        public function testReturnsIdWhenNewObjectsAreStored()
        {
            $object = new DomainObject();
            $this->assertNotNull($this->store->store($object));
        }
    }
}
