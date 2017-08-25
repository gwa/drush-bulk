#!/usr/local/bin/php
<?php

if ($argc < 3) {
    echo 'Usage: index.php [aliasgroup] [method] ...args' . PHP_EOL;
    exit(1);
}

$group = $argv[1];
$method = $argv[2];

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/config/aliases.php';

if (!array_key_exists($group, $aliases)) {
    echo 'Alias group "' . $group . '" does not exist.' . PHP_EOL;
    exit(1);
}

$target_aliases = $aliases[$group];

$filename = $method . '.php';
if (!file_exists($filename)) {
    echo 'Method "' . $method . '" does not exist.' . PHP_EOL;
    exit(1);
}

require_once $filename;

exit(0);
