<?php

interface DataProcessorInterface
{
    public function execute(array $inputData);
}

abstract class AbstractDataProcessor implements DataProcessorInterface
{
    public function execute(array $inputData)
    {
        $valid = this->validate($inputData);
        
        if ($valid) {
            $this->doStuff($inputData);
        } else {
            $this->createErrorMessages();
        }
    }
    
    abstract protected function validate(array $inputData);
    abstract protected function doStuff(array $inputData);
    abstract protected function createErrorMessages();
}

class ConcreteDataProcessor extends AbstractDataProcessor
{
    protected function validate(array $inputData)
    {
    }

    protected function doStuff(array $inputData)
    {
    }
    
    protected function createErrorMessages()
    {
    }
}

class EvenMoreConcreteDataProcessor extends ConcreteDataProcessor
{
    protected function doStuff(array $inputData)
    {
        parent::doStuff($inputData);
        // ... additional stuff
    }
}
