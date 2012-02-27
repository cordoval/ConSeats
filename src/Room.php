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

        public function addSeat(Seat $seat)
        {
            if ($this->getAvailableCapacity() < 1) {
                throw new Exception("Room capacity limit reached.");
            }

            $this->seats[] = $seat;
        }

        public function getAvailableCapacity()
        {
            return $this->capacity - count($this->seats);
        }

        public function reserveSeat()
        {
            $seat = $this->getNextAvailableSeat();
            $seat->reserve();
            return $seat;
        }

        protected function getNextAvailableSeat()
        {
            foreach($this->seats as $seat) {
                if ($seat->isAvailable()) {
                    return $seat;
                }
            }
            throw new Exception("No availbale seat found.");
        }
    }
}
