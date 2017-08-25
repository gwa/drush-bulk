<?php
/**
 * Removes role(s) for a user.
 */

if ($argc !== 5) {
    echo 'Usage: account-remove-role.php [role] [email]';
    exit(0);
}

$role = $argv[3];
$email = $argv[4];

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s urrol %s %s', $alias, $role, $email);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}
