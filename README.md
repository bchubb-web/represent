# represent
a simple unopinionated modelling library, allowing you to 'represent' your data in a usable, logical way while giving you the power to handle your data however you want.

## Installation

To install require the package to your project with composer
```bash
composer require bchubbweb/represent
```

## Usage

To create a model extend the `Model` class, and define any custom properties or methods you need.
```php
<?php

use Bchubbweb\Represent\Model;

class User extends Model
{
    ...
}
```

Then you can generate an instance, which returns a new instance of the model.

Represent does not create any persistant data, it is up to you to handle the data in whatever way you wish, but using some of our helper functions can make this easier for you.
```php
<?php

use Bchubbweb\Represent\Model;

$user = new User([
    'name' => 'Bob',
    'email' => 'bob@btinternet.com',
]);
$sql = $user->toSql(); // INSERT INTO users (name, email) VALUES ('Bob', 'bob@btinternet.com');
```

When a model is updated, the result of the `toSql` method will return an update statement, reflecting the changes made to the instance.
```php
