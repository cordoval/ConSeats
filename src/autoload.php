<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'conseats\\backends\\eventpersistenceinterface' => '/Backends/EventPersistenceInterface.php',
                'conseats\\backends\\eventstore' => '/Backends/EventStore.php',
                'conseats\\backends\\exception' => '/Backends/Exception.php',
                'conseats\\backends\\persistenceinterface' => '/Backends/PersistenceInterface.php',
                'conseats\\configuration' => '/Configuration/Configuration.php',
                'conseats\\configurationexception' => '/Configuration/ConfigurationException.php',
                'conseats\\configurationinterface' => '/Configuration/ConfigurationInterface.php',
                'conseats\\decorators\\htmldecorator' => '/Decorators/HtmlDecorator.php',
                'conseats\\domain\\event' => '/Domain/Event.php',
                'conseats\\domain\\exception' => '/Domain/Exception.php',
                'conseats\\domain\\room' => '/Domain/Room.php',
                'conseats\\domain\\seat' => '/Domain/Seat.php',
                'conseats\\factory' => '/Factory/Factory.php',
                'conseats\\factoryexception' => '/Factory/FactoryException.php',
                'conseats\\factoryinterface' => '/Factory/FactoryInterface.php',
                'conseats\\models\\presentationmodel' => '/Models/PresentationModel.php',
                'conseats\\models\\presentationmodelinterface' => '/Models/PresentationModelInterface.php',
                'conseats\\views\\view' => '/Views/View.php',
                'conseats\\views\\viewinterface' => '/Views/ViewInterface.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd