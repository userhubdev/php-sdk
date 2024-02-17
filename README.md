# UserHub PHP SDK

Stability: alpha

### Requirements

* PHP 8.1 or later

### Getting Started

Install SDK

```sh
composer require userhub/sdk
```

Example

```php
<?php

require __DIR__.'/vendor/autoload.php';

use UserHub\AdminApi;

$adminApi = new AdminApi('sk_123...');

$res = $adminApi->users->list(pageSize: 5);

foreach ($res->users as $user) {
    echo $user->id.' '.$user->displayName.PHP_EOL;
}
```

See the `examples` directory for more examples.
