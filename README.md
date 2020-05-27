# Logger

Basic PSR-3 compliant logger implementation.


### Installation

Use composer:

```
composer require unicate/logger
```

### Example

#### v1.0

```php
<?php

require_once "vendor/autoload.php";

$logger = new \Unicate\Logger\Logger();
$logger->debug('test some very detailed debug log {data}', ['data' => '...some data...']);
$logger->info('test loggin some info {kind} stuff', ['kind' => 'crazy']);
$logger->notice('Just for your notification.', []);
$logger->warning('Just be warned', []);
$logger->error('some error: {exception}', ['exception' => 'stack trace...']);
$logger->critical('A mission critical log entry!', ['exception' => 'Stack trace')]);
$logger->alert('Aleeeerrrrtt', []);
$logger->emergency('Its an Emergency', []);

```