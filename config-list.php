<?php
/**
 * Outputs a named drupal configuration for every site alias.
 * Drush command: config-list cli
 */

if ($argc !== 4) {
    echo 'Usage: [group] config-list [config-name]';
    exit(0);
}

$config = $argv[3];

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s cget %s', $alias, $config);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
