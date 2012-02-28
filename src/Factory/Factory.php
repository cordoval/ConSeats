<?php

namespace ConSeats
{
    class Factory implements FactoryInterface
    {
        public function __construct(Configuration $configuration)
        {
            $this->configuration = $configuration;
        }
    
        public function getInstanceFor($type)
        {
            switch (strtolower($type)) {
                case 'persistence':
                    return new \ConSeats\Backends\EventStore($this->configuration->get('dataDir'));
            }
        }
    }
}
