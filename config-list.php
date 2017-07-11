#!/usr/local/bin/php
<?php
/**
 * Outputs a named drupal configuration for every site alias.
 * Drush command: config-list cli
 */

if ($argc !== 2) {
    echo 'Usage: config-list.php [config-name]';
    exit(0);
}

$config = $argv[1];

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/config/aliases.php';

foreach ($aliases as $alias) {
    $cmd = sprintf('drush %s cget %s', $alias, $config);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
