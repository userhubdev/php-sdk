# UserHub PHP SDK

Stability: alpha

## Usage

```php
<?php

use UserHub\AdminApi;

$adminApi = new AdminApi('sk_123...');

$res = $adminApi->users->list(pageSize: 5);

foreach ($res->users as $user) {
    echo $user->id.' '.$user->displayName.PHP_EOL;
}
```
