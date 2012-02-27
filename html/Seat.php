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
        
        public function setReserved($bool)
        {
            if (!is_bool($bool)) {
                throw new Exception("'$bool' is not boolean");
            }
            $this->reserved = $bool;
        }
    }
}
