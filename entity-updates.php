<?php
/**
 * Performs entity updates.
 */

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s entup -y', $alias);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}
