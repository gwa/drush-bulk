#!/usr/local/bin/php
<?php
/**
 * Outputs a named drupal configuration for every site alias.
 * Drush command: config-list cli
 */

if ($argc !== 2) {
    echo 'Usage: account-check.php [email]';
    exit(0);
}

$email = $argv[1];

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/config/aliases.php';

foreach ($aliases as $alias) {
    $cmd = sprintf('drush %s uinf %s', $alias, $email);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
