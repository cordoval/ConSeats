<pre>
<?php

require __DIR__ . '/../src/autoload.php';

$room = new ConSeats\Domain\Room(15);
$event = new ConSeats\Domain\Event('Advanced PHP Training', '2012-02-27', $room);

for($t=0; $t<15; $t++) {
    $seat = new ConSeats\Domain\Seat();
    $room->addSeat($seat);
}

$seat = $event->reserveSeat();


$store = new ConSeats\Backends\EventStore('/tmp');
$id = $store->store($event);

$event2 = $store->retrieve($id);
var_dump($event2);
