<?php

namespace ConSeats\Decorators
{
    use ConSeats\Models\PresentationModelInterface;

    class HtmlDecorator implements PresentationModelInterface
    {
        protected $model;
        
        public function __construct(PresentationModelInterface $model)
        {
            $this->model = $model;
        }
    
        public function getNumberOfAvailableSeats()
        {
            return htmlentities($this->model->getNumberOfAvailableSeats());
        }
    }
}
