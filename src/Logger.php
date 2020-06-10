<?php

declare(strict_types=1);

namespace Unicate\Logger;

use Psr\Log\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface {

    private $logLevel;
    private $logsDir;
    private $logFileName;
    private $supportedLogLevels;

    function __construct(string $logLevel, string $logsDir = '', string $logFileName = '{Y-m-d}-log.txt') {
        $this->logLevel = $logLevel;
        $this->logsDir = $logsDir;
        $this->logFileName = $logFileName;

        // Ordered by importance! Only entries <= current LogLevel will be logged.
        $this->supportedLogLevels = [
            LogLevel::EMERGENCY, LogLevel::ALERT, LogLevel::CRITICAL,
            LogLevel::ERROR, LogLevel::WARNING, LogLevel::NOTICE,
            LogLevel::INFO, LogLevel::DEBUG
        ];

        if (!in_array($this->logLevel, $this->supportedLogLevels)) {
            throw new InvalidArgumentException("Log-Level \"$this->logLevel\" is not supported.");
        }
    }

    public function emergency($message, array $context = array()) {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array()) {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array()) {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array()) {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array()) {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array()) {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array()) {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array()) {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    private function logThisLevel($callerLogLevel): bool {
        // Decides if the entry should be logged, according to position in array $this->supportedLogLevels.
        $currentLogLevelInt = array_search($this->logLevel, $this->supportedLogLevels);
        $callerLogLevelInt = array_search($callerLogLevel, $this->supportedLogLevels);
        return $callerLogLevelInt <= $currentLogLevelInt;
    }

    private function interpolate($message, array $context = array()): string {
        // build a replacement array with braces around the context keys
        $replace = array();
        foreach ($context as $key => $val) {
            // check that the value can be casted to string
            if (!is_array($val) && (!is_object($val) || method_exists($val, '__toString'))) {
                $replace['{' . $key . '}'] = $val;
            }
        }
        // interpolate replacement values into the message and return
        return strtr($message, $replace);
    }

    public function log($level, $message, array $context = array()) {
        if ($this->logThisLevel($level)) {
            $message = $this->interpolate($message, $context);

            // If no LogsDir is provided we write to StdOut
            if (empty($this->logsDir)) {
                $this->writeToStdOut($level, $message);
            } else {
                $this->writeToFile($level, $message);
            }
            return $message;
        }
    }

    private function writeToStdOut(string $level, string $message) {
        $ts = (new \DateTimeImmutable('now'))->format('Y-m-d H:i:s');
        fwrite(STDOUT, $ts . ' ' . str_pad(strtoupper($level), 9) . ' ' . $message . PHP_EOL);
    }

    private function writeToFile(string $level, string $message) {
        // Create timestamp
        $now = new \DateTimeImmutable('now');
        $ts = $now->format('Y-m-d H:i:s.u');

        // Logfile entry line output
        $logEntry = $ts . ' ' . str_pad(strtoupper($level), 9) . ' ' . $message . ' ' . PHP_EOL;

        // Replace timestamp pattern in filename
        preg_match('/{(.*?)}/', $this->logFileName, $datePattern);
        $datePattern = count($datePattern) < 2 ? '' : $datePattern[1];
        $logFileName = str_replace('{'.$datePattern.'}', $now->format($datePattern), $this->logFileName);

        // Write file
        try {
            $fh = fopen($this->logsDir . '/' . $logFileName, 'a');
            fwrite($fh, $logEntry);
            fclose($fh);
        } catch (\Throwable $e) {
            throw new \RuntimeException("Could not open log file!", 0, $e);
        }
    }


}