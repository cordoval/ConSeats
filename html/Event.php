<?php

namespace ConSeats\Domain
{
    class Event
    {
        protected $name;
        protected $date;
        
        public function __construct($name, $date)
        {
            $this->name = $name;
            $this->date = $date;
        }
        
        public function setName($name)
        {
            $this->name = $name;
        }
    }
}
