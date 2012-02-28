<?php
namespace ConSeats\Models
{
    use ConSeats\Domain\Event;

    class PresentationModel implements PresentationModelInterface
    {
        protected $event;

        public function __construct(Event $event)
        {
            $this->event = $event;
        }

        public function getNumberOfAvailableSeats()
        {
            return htmlentities($this->event->getNumberOfAvailableSeats());
        }
    }
}
