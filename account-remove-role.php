#!/usr/local/bin/php
<?php
/**
 * Removes role(s) for a user.
 */

if ($argc !== 3) {
    echo 'Usage: account-remove-role.php [role] [email]';
    exit(0);
}

$role = $argv[1];
$email = $argv[2];

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/config/aliases.php';

foreach ($aliases as $alias) {
    $cmd = sprintf('drush %s urrol %s %s', $alias, $role, $email);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
