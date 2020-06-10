# Logger

Basic PSR-3 compliant logger implementation.
See https://www.php-fig.org/psr/psr-3/

### Installation

Use composer:

```
composer require unicate/logger
```

### Example

- Use the constructor to pass the current loglevel.
- The path to the log directory is optional. If not provided it will be logged to StdOut.
- A filename including date pattern can also be passed optionally.
Default is '{Y-m-d}-log.txt'.
```php
<?php

require_once "vendor/autoload.php";

$logsDir = __DIR__ . '/../logs';

$logger = new \Unicate\Logger\Logger(LogLevel::ERROR, $logsDir, 'Appl-{Y-m-d}-test.txt');
```

- Methods for each loglevel are implemented.
- Data in {curly brackets} will be replaced with string in associative array and corresponding key.
```php
$logger->debug('test some very detailed debug log {data}', ['data' => '...some data...']);
$logger->info('test loggin some info {kind} stuff', ['kind' => 'crazy']);
$logger->notice('Just for your notification.', []);
$logger->warning('Just be warned', []);
$logger->error('some error: {exception}', ['exception' => 'stack trace...']);
$logger->critical('A mission critical log entry!', ['exception' => 'Stack trace')]);
$logger->alert('Aleeeerrrrtt', []);
$logger->emergency('Its an Emergency', []);

```