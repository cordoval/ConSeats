<?php

namespace ConSeats\Domain
{
    class Seat
    {
        protected $reserved = false;
        
        public function isReserved()
        {
            return $this->reserved;
        }
        
        public function reserve()
        {
            $this->reserved = true;
        }

        public function cancelReservation()
        {
            $this->reserved = false;
        }
    }
}
