<?php

namespace ConSeats\Backends
{
    interface PersistenceInterface
    {
        public function store($object, $id = null);
        public function retrieve($id);
        public function exists($id);
    }
}
