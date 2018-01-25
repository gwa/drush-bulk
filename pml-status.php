<?php
/**
 * Outputs a line if the module is enabled.
 * Drush command: config-list cli
 */

if ($argc !== 4) {
    echo 'Usage: [group] pml-status [config-name]';
    exit(0);
}

$module = $argv[3];

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s pml --status=Enabled | grep %s', $alias, $module);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}

exit(0);
