<?php

namespace ConSeats\Backends
{
    interface EventPersistenceInterface extends PersistenceInterface
    {
        public function retrieveByName($name);
    }
}
