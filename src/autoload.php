<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'conseats\\backends\\exception' => '/Backends/Exception.php',
                'conseats\\backends\\nosqlstore' => '/Backends/NoSqlStore.php',
                'conseats\\backends\\persistenceinterface' => '/Backends/PersistenceInterface.php',
                'conseats\\domain\\event' => '/Event.php',
                'conseats\\domain\\exception' => '/Exception.php',
                'conseats\\domain\\room' => '/Room.php',
                'conseats\\domain\\seat' => '/Seat.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    }
);
// @codeCoverageIgnoreEnd