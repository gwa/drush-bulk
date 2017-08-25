<?php
/**
 * Empties the cache for every site alias.
 */

foreach ($target_aliases as $alias) {
    $cmd = sprintf('drush %s cr', $alias);
    $output = execCommand($cmd);
    outputForAlias($output, $alias);
}
