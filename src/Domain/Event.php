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
            $this->setName($name);
            $this->setDate($date);
            $this->setRoom($room);
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

        public function setDate($date)
        {
            $this->date = $date;
        }

        protected function setRoom(Room $room)
        {
            $this->room = $room;
        }

        public function reserveSeat()
        {
            return $this->room->reserveSeat();
        }
    }
}
