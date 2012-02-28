<pre>
<?php

require __DIR__ . '/../src/autoload.php';

$configuration = new ConSeats\Configuration(parse_ini_file(__DIR__ . '/../config/config.ini'));
$factory = new ConSeats\Factory($configuration);

$room = new ConSeats\Domain\Room(15);
$event = new ConSeats\Domain\Event('Advanced PHP Training', '2012-02-27', $room);

for($t=0; $t<15; $t++) {
    $seat = new ConSeats\Domain\Seat();
    $room->addSeat($seat);
}

$seat = $event->reserveSeat();

$store = $factory->getInstanceFor('persistence');
$id = $store->store($event);

$event2 = $store->retrieve($id);
var_dump($event2);
