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

        public function isAvailable()
        {
            return !$this->isReserved();
        }

        public function reserve()
        {
            if ($this->reserved) {
                throw new Exception('Seat is already reserved.');
            }

            $this->reserved = true;
        }

        public function cancelReservation()
        {
            if (!$this->reserved) {
                throw new Exception('Seat is not reserved.');
            }

            $this->reserved = false;
        }
    }
}
