<?php

namespace ConSeats
{
    class Configuration implements ConfigurationInterface
    {    
        protected $settings = array();

        public function __construct(array $settings)
        {
            $this->settings = $settings;
        }

        public function get($key)
        {
            if (!array_key_exists($key, $this->settings)) {
                throw new ConfigurationException('Key "' . $key . '" does not exist');
            }
        
            return $this->settings[$key];
        }
    }
}
