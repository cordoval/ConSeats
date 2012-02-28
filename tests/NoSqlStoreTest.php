<?php

namespace ConSeats\Backends\Tests
{
    /** @todo create autoload map for testdata */
    require_once __DIR__ . '/testdata/DomainObject.php';

    use ConSeats\Backends\NoSqlStore;
    use ConSeats\Backends\Tests\DomainObject;

    class NoSqlStoreTest extends \PHPUnit_Framework_TestCase
    {
        protected $store;

        protected function setUp()
        {
            $this->store = new NoSqlStore('/tmp');
        }

        /**
         * @expectedException ConSeats\Backends\Exception
         */
        public function testStoringNonObjectRaisesException()
        {
            $this->store->store('this-is-not-an-object');
        }

        /**
         * @expectedException ConSeats\Backends\Exception
         */
        public function testRetrievingNonexistingIdRaisesException()
        {
            $this->store->retrieve('this-is-not-a-valid-id');
        }

        public function testStoresObject()
        {
            $object = new DomainObject();
            $id = $this->store->store($object);

            $this->assertTrue($this->store->exists($id));

            return array($object, $id);
        }

        /**
         * @depends testStoresObject
         */
        public function testRetrievesObject(array $data)
        {
            $this->assertEquals($data[0], $this->store->retrieve($data[1]));
        }

        public function testReturnsIdWhenNewObjectsAreStored()
        {
            $object = new DomainObject();
            $this->assertNotNull($this->store->store($object));
        }
    }
}
