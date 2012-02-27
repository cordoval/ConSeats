ConSeats
========

Demo application developed during "Advanced PHP Training" at ConFoo 2012.


Requirements
------------

* Persons
  * can reserve one or more seats
  * can cancel a reservation

* Events (Aggregate Root / Facade for rooms and seats)
  * have a date
  * have a name
  * happen in a room

* Rooms
  * have a list (or map) of seats

* Seats
  * are numbered
  * can be available
  * can be reserved

* List of seats
* Reservation
* Cancellation
