#!/usr/local/bin/php
<?php
/**
 * Empties the cache for every site alias.
 */

if ($argc !== 1) {
    echo 'Usage: cache-rebuild.php';
    exit(0);
}

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/incl/aliases.php';

foreach ($aliases as $alias) {
    $cmd = sprintf('drush %s cr', $alias);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
