<?php


use Unicate\Logger\Logger;
use PHPUnit\Framework\TestCase;
use \Psr\Log\LogLevel;

class LoggerTest extends TestCase {
    protected function setUp() {
        parent::setUp();

    }

    public function testEmergency() {
        $logger = new Logger(LogLevel::EMERGENCY);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testAlert() {
        $logger = new Logger(LogLevel::ALERT);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testCritical() {
        $logger = new Logger(LogLevel::CRITICAL);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testError() {
        $logger = new Logger(LogLevel::ERROR);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ERROR message 1234',
            $logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testWarning() {
        $logger = new Logger(LogLevel::WARNING);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ERROR message 1234',
            $logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'WARNING message 1234',
            $logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testNotice() {
        $logger = new Logger(LogLevel::NOTICE);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ERROR message 1234',
            $logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'WARNING message 1234',
            $logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'NOTICE message 1234',
            $logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234']));
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testInfo() {
        $logger = new Logger(LogLevel::INFO);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ERROR message 1234',
            $logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'WARNING message 1234',
            $logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'NOTICE message 1234',
            $logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'INFO message 1234',
            $logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234'])
        );
        $this->assertNull($logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234']));
    }

    public function testDebug() {
        $logger = new Logger(LogLevel::DEBUG);
        $this->assertEquals(
            'EMERGENCY message 1234',
            $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ALERT message 1234',
            $logger->log(LogLevel::ALERT, 'ALERT message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'CRITICAL message 1234',
            $logger->log(LogLevel::CRITICAL, 'CRITICAL message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'ERROR message 1234',
            $logger->log(LogLevel::ERROR, 'ERROR message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'WARNING message 1234',
            $logger->log(LogLevel::WARNING, 'WARNING message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'NOTICE message 1234',
            $logger->log(LogLevel::NOTICE, 'NOTICE message {test}', ['test' => '1234'])
        );
        $this->assertEquals(
            'INFO message 1234',
            $logger->log(LogLevel::INFO, 'INFO message {test}', ['test' => '1234'])
        );

        $this->assertEquals(
            'DEBUG message 1234',
            $logger->log(LogLevel::DEBUG, 'DEBUG message {test}', ['test' => '1234'])
        );
    }

    public function testDir1() {
        $now = new \DateTimeImmutable('now');
        $ts = $now->format('Y-m-d');
        $logsDir = __DIR__ . '/../logs_1';
        $logger = new Logger(LogLevel::ERROR, $logsDir, 'Appl-{Y-m-d}-test.txt');
        $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234']);
        $logger->log(LogLevel::ALERT, 'ALERT message');
        $logger->log(LogLevel::CRITICAL, 'CRITICAL message');
        $logger->log(LogLevel::ERROR, 'ERROR message');
        $logger->log(LogLevel::WARNING, 'WARNING message');
        $logger->log(LogLevel::NOTICE, 'NOTICE message');
        $logger->log(LogLevel::INFO, 'INFO message');
        $logger->log(LogLevel::DEBUG, 'DEBUG message');

        $this->assertFileExists($logsDir . '/Appl-' . $ts . '-test.txt');
    }

    public function testDir2() {
        $logsDir = __DIR__ . '/../logs_2';
        $logger = new Logger(LogLevel::ERROR, $logsDir, 'test.txt');
        $logger->log(LogLevel::EMERGENCY, 'EMERGENCY message {test}', ['test' => '1234']);
        $logger->log(LogLevel::ALERT, 'ALERT message');
        $logger->log(LogLevel::CRITICAL, 'CRITICAL message');
        $logger->log(LogLevel::ERROR, 'ERROR message');
        $logger->log(LogLevel::WARNING, 'WARNING message');
        $logger->log(LogLevel::NOTICE, 'NOTICE message');
        $logger->log(LogLevel::INFO, 'INFO message');
        $logger->log(LogLevel::DEBUG, 'DEBUG message');
        $this->assertFileExists($logsDir . '/test.txt');
    }


}
