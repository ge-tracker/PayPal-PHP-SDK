#!/usr/bin/env php
<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

require __DIR__ . '/vendor/autoload.php';

$generator = new \JamesAusten\Dev\PayPalApiGenerator(__DIR__, [
    'apiTarget'  => __DIR__ . '/lib/PayPal/Api',
    'testTarget' => __DIR__ . '/tests/PayPal/Test/Api',
]);

$generator->make();

$paths = $generator->getWrittenPaths();

echo "Paths written:\n\n";
echo '- ' . implode("\n- ", $paths);
echo "\n\n";
