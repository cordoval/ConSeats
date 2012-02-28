<?php

namespace ConSeats\Views
{
    use ConSeats\Models\PresentationModelInterface;

    class View implements ViewInterface
    {
        protected $viewScript;
        
        public function __construct($viewScript)
        {
            $this->viewScript = $viewScript;
        }
    
        public function render(PresentationModelInterface $presentationModel)
        {
            ob_start();
            require $this->viewScript;
            return ob_get_clean();
        }
    }
}
