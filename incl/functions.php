<?php

/**
 * Execute command and return output.
 *
 * @param string $cmd The command
 *
 * @return string The output
 */
function execCommand($cmd) {
    return implode(PHP_EOL, execCommandAndReturnArray($cmd));
}

/**
 * Execute command and return output.
 *
 * @param string $cmd The command
 * @return array The output
 */
function execCommandAndReturnArray($cmd) {
    $output = [];
    $return_var = null;
    exec($cmd, $output, $return_var);
    return $output;
}

/**
 * Outputs formatted output for an alias.
 *
 * @param string $output The output
 * @param string $alias  The alias
 */
function outputForAlias($output, $alias) {
    echo colorize('========') . PHP_EOL;
    echo colorize($alias) . PHP_EOL;
    echo colorize('--------') . PHP_EOL;
    echo $output . PHP_EOL;
}


/**
 * @param string $email
 * @param string $alias
 *
 * @return array
 */
function getRolesForUser($email, $alias) {
    $cmd = sprintf('drush %s uinf %s --format=json', $alias, $email);
    $output = execCommand($cmd);
    $output = json_decode($output, true);
    return $output[key($output)]['roles'];
}

function colorize($str) {
    return $str;
}
