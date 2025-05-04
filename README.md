# UserHub PHP SDK
[![Packagist Latest Version](https://poser.pugx.org/userhub/sdk/v/stable.svg)](https://packagist.org/packages/userhub/sdk)

The official [UserHub](https://userhub.com) PHP SDK.

### Requirements

* PHP 8.2 or later

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

$adminApi = new AdminApi('userhub_admin_123...');

$res = $adminApi->users->list(pageSize: 5);

foreach ($res->users as $user) {
    echo $user->id.' '.$user->displayName.PHP_EOL;
}
```

See the `examples` directory for more examples.
