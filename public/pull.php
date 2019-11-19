<?php

require '../pull.php';

if ($_POST['payload']) {
    print("<pre>" . getPull("git pull https://github.com/maulanakevinp/etalase.git master") . "</pre>");
}

?>

<title>ETALASE</title>