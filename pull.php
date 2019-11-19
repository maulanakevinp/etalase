<?php
function getPull($command) {
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        print($line . "\n");
    }
}