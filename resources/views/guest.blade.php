Internal Server Error

InvalidArgumentException
Unable to locate a class or view for component [guest-layout].
GET is4-php-production.up.railway.app
PHP 8.2.29 — Laravel 11.45.2

Expand
vendor frames
61 vendor frames collapsed

public/index.php
:17
require_once
1 vendor frame collapsed
public/index.php :17
// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';
 
// Bootstrap Laravel and handle the request...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());
