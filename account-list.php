#!/usr/local/bin/php
<?php
/**
 * Outputs all users for each site.
 */

require_once __DIR__ . '/incl/functions.php';
require_once __DIR__ . '/config/aliases.php';

function extractUserData($output, $alias) {
    $user_data = [];

    foreach ($output as $line) {
        if ($data = parseUserLine($line, $alias)) {
            $user_data[] = formatUserLine($data);
        } else {
            // Just add raw data if not matched.
            $user_data[] = $line;
        }
    }

    return implode(PHP_EOL, $user_data);
}

function parseUserLine($line, $alias) {
    $pattern = '/^(\d+)\s+([^\s]+)\s+([01])/';
    if (!preg_match($pattern, $line, $matches)) {
        return null;
    }

    $data = new \stdClass();
    $data->id = $matches[1];
    $data->email = $matches[2];
    $data->status = $matches[3];
    $data->roles = [];

    if ($data->id > 0) {
        $data->roles = getRolesForUser($data->email, $alias);
    }

    return $data;
}

function formatUserLine($data) {
    $line = sprintf('%s ', $data->status ? '•' : ' ');
    $line .= str_pad($data->id, 6);
    $line .= str_pad($data->email, 50, ' ', STR_PAD_RIGHT);
    $line .= implode(', ', $data->roles);
    return $line;
}

foreach ($aliases as $alias) {
    $cmd = sprintf('drush %s sqlq "select uid, mail, status from users_field_data"', $alias);
    $output = execCommandAndReturnArray($cmd);

    $output = extractUserData($output, $alias);

    outputForAlias($output, $alias);
}

exit(0);
