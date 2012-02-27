<?php
namespace ConSeats\Domain
{
    class Event
    {
        protected $name;
        protected $date;
        protected $room;

        public function __construct($name, $date, Room $room)
        {
            $this->name = $name;
            $this->date = $date;
            $this->room = $room;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function reserveSeat()
        {
            return $this->room->reserveSeat();
        }
    }
}
