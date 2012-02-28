<?php
namespace ConSeats\Views
{
    use ConSeats\Models\PresentationModelInterface;

    interface ViewInterface
    {
        public function render(PresentationModelInterface $presentationModel);
    }
}
