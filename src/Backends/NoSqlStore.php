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
            if (!$this->exists($id)) {
                throw new Exception('Document ID "' . $id . '" not found');
            }
            return unserialize(file_get_contents($this->getFilename($id)));
        }
        
        public function exists($id)
        {
            return file_exists($this->getFilename($id));
        }

        protected function getFilename($id)
        {
            return $this->dataDir . '/' . base64_encode($id);
        }
    }
}
