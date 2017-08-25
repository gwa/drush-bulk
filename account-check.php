<?php
/**
 * Outputs user info for every site alias.
 * Drush command: uinf
 */

if ($argc !== 4) {
    echo 'Usage: [group] account-check [email]';
    exit(0);
}

$email = $argv[3];

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s uinf %s', $alias, $email);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}
