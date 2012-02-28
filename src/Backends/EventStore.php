<?php
/**
 * This is a very limited and partly problematic implementation.
 * It has been decided, though, not to refactor this during the training.
 */
namespace ConSeats\Backends
{
    class EventStore implements EventPersistenceInterface
    {
        protected $dataDir;
        protected $eventIndex;

        public function __construct($dataDir)
        {
            $this->dataDir = $dataDir;
        }

        public function store($object, $id = null)
        {
            if (!$object instanceOf \ConSeats\Domain\Event) {
                throw new Exception('Event object expected');
            }

            if ($id === null) {
                $id = uniqid('', true);
            }

            file_put_contents($this->getFilename($id), serialize($object));

            $index = $this->loadIndex();
            $index[$object->getName()] = $id;
            $this->saveIndex($index);

            return $id;
        }

        public function retrieve($id)
        {
            if (!$this->exists($id)) {
                throw new Exception('Document ID "' . $id . '" not found');
            }

            return unserialize(file_get_contents($this->getFilename($id)));
        }

        public function exists($id)
        {
            return file_exists($this->getFilename($id));
        }

        public function retrieveByName($name)
        {
            $index = $this->loadIndex();

            if (!isset($index[$name])) {
                throw new Exception('Event with name "' . $name . '" not found');
            }

            return $index[$name];
        }

        protected function getIndexFilename()
        {
            return $this->dataDir . '/eventindex.dat';
        }

        protected function loadIndex()
        {
            $filename = $this->getIndexFilename();

            if (!file_exists($filename)) {
                return array();
            }

            return unserialize(file_get_contents($filename));
        }

        protected function saveIndex(array $index)
        {
            file_put_contents($this->getIndexFilename(), serialize($index));
        }

        protected function getFilename($id)
        {
            return $this->dataDir . '/' . base64_encode($id);
        }
    }
}
