<?php


use Unicate\Logger\Logger;
use PHPUnit\Framework\TestCase;
use \Psr\Log\LogLevel;

class LoggerTest extends TestCase {
    protected function setUp() {
        parent::setUp();

    }

    public function testName() {
        $logger = new Logger(LogLevel::ERROR, __DIR__ . '/../logs');
        $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {hallo}', ['hallo' => 'bla']);
        $logger->log(LogLevel::ALERT, 'ALERT message');
        $logger->log(LogLevel::CRITICAL, 'CRITICAL message');
        $logger->log(LogLevel::ERROR, 'ERROR message');
        $logger->log(LogLevel::WARNING, 'WARNING message');
        $logger->log(LogLevel::NOTICE, 'NOTICE message');
        $logger->log(LogLevel::INFO, 'INFO message');
        $logger->log(LogLevel::DEBUG, 'DEBUG message');

        $logger = new Logger(LogLevel::ERROR);
        $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {hallo}', ['hallo' => 'bla']);
        $logger->log(LogLevel::ALERT, 'ALERT message');
        $logger->log(LogLevel::CRITICAL, 'CRITICAL message');
        $logger->log(LogLevel::ERROR, 'ERROR message');
        $logger->log(LogLevel::WARNING, 'WARNING message');
        $logger->log(LogLevel::NOTICE, 'NOTICE message');
        $logger->log(LogLevel::INFO, 'INFO message');
        $logger->log(LogLevel::DEBUG, 'DEBUG message');

        $this->assertNotNull('asdf');
    }



}
