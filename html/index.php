<?php

$room = new ConSeats\Domain\Room(15);
$event = new ConSeats\Domain\Event('Advanced PHP Training', '2012-02-27', $room);

for($t=0; $t<15; $t++) {
    $seat = new ConSeats\Domain\Seat();
    $room->addSeat($seat);
}

var_dump($event);
