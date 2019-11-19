<?php
function getPull($command) {
    $result = array();
    shell_exec($command, $result);
    foreach ($result as $line) {
        print($line . "\n");
    }
}