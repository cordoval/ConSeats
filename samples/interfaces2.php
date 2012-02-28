<?php

class FileLogger implements LoggerInterface
{
    protected $logfile;

    public function __construct($logfile)
    {
        $this->logfile = $logfile;
    }

    public function log($message, $code = null, $level = null)
    {
        file_put_contents($this->logfile, $message)
    }
}

class DatabaseLogger implements LoggerInterface
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function log($message, $code = null, $level = null)
    {
        $this->db->insert($message);
    }
}

class Whatever_Framework_Logger
{
    public function log($message, $code, $level)
    {
        // ...
    }
}

class WhateverFrameworkAdapterLogger implements LoggerInterface
{
    protected $logger;

    public function __construct(Whatever_Framework_Logger $logger)
    {
        $this->logger = $logger;
    }
    
    public function log($message, $code = null, $level = null)
    {
        if ($code == null) {
            $code = $defaultCode;
        }
        
        if ($level == null) {
            $level = LEVEL_THREE_CONSTANT;
        }
    
        $this->logger->log($message, $code, $level);
    }
}


interface LoggerInterface
{
    public function log($message, $code = null, $level = null);
}

class DummyLogger implements LoggerInterface
{
    public function log($message)
    {
    }
}


class BusinessLogic
{
    protected $logger;

    public function acceptLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute()
    {
        $this->log($message);
    }

    protected function log($message)
    {
        if ($this->logger === null) {
            return;
        }
    
        $this->logger->log($message);
    }
}

$frameworkLogger = new Whatever_Framework_Logger();
$logger = new WhateverFrameworkAdapterLogger($frameworkLogger);

$logger = new DatabaseLogger();

$logger = new FileLogger();

$logger = new DummyLogger();


$logic = new BusinessLogic($logger);

