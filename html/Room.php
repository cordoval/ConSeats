<?php

namespace ConSeats\Domain
{
    class Room
    {
        protected $capacity;
        protected $seats = array();
        
        public function __construct($capacity)
        {
            $this->capacity = $capacity;
        }
        
        public function getAvailableCapacity()
        {
            return $this->capacity - count($this->seats);
        }
        
        public function addSeat(Seat $seat)
        {
            if ($this->getAvailableCapacity() < 1) {
                throw new Exception("Room capacity limit reached.");
            }
            $this->seats[] = $seat;
        }
   
    }
}
