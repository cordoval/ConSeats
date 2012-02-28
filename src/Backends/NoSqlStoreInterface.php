<?php

namespace ConSeats\Backends
{
    interface NoSqlStoreInterface
    {
        public function store($object, $id = null);
        public function retrieve($id);
        public function exists($id);
    }
}
