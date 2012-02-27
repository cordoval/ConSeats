<?php

namespace ConSeats\Backends
{
    class NoSqlStore implements NoSqlStoreInterface
    {
        protected $dataDir;

        public function __construct($dataDir)
        {
            $this->dataDir = $dataDir;
        }

        public function store($object, $id = null)
        {
            if (!is_object($object)) {
                throw new Exception('Object expected');
            }

            if ($id === null) {
                $id = uniqid('', true);
            }

            file_put_contents($this->getFilename($id), serialize($object));

            return $id;
        }

        public function retrieve($id)
        {
            $filename = $this->getFilename($id);
            
            if (!file_exists($filename)) {
                throw new Exception('Document ID "' . $id . '" not found');
            }
        
            return unserialize(file_get_contents($filename));
        }

        protected function getFilename($id)
        {
            return $this->dataDir . '/' . $id;
        }
    }
}
