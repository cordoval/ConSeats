<?php

namespace ConSeats
{
    class Factory implements FactoryInterface
    {
        public function getInstanceFor($type)
        {
            switch (strtolower($type)) {
                case 'persistence':
                    return new ConSeats\Backends\EventStore('/tmp');
            }
        }
    }
}
