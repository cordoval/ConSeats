<?php

namespace ConSeats\Backends\Tests
{
    class DomainObject
    {
        protected $relatedObjects;

        public function addRelatedObject($object)
        {
            $this->relatedObjects[] = $object;
        }

        public function getNumberOfRelatedObjects()
        {
            return count($this->relatedObjects);
        }
    }

    class RelatedObject
    {
    }
}
