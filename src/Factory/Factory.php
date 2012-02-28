<?php

namespace ConSeats
{
    class Factory implements FactoryInterface
    {
        public function __construct(ConfigurationInterface $configuration)
        {
            $this->configuration = $configuration;
        }
    
        public function getInstanceFor($type)
        {
            switch (strtolower($type)) {
                case 'persistence':
                    return new \ConSeats\Backends\EventStore(
                        $this->configuration->get('dataDir')
                    );               
                case 'homeview':
                    return $this->getViewInstance($type);
                default:
                    throw new FactoryException('Unknown type "' . $type . '"');
            }
        }
        
        protected function getViewInstance($type)
        {
            // if (in_array($type, $supportedViews) ....
            return new \ConSeats\Views\View(
                __DIR__ . '/../../' . $this->configuration->get('viewDir') . '/' . $type . '.php'
            );
        }
    }
}
