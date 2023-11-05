<?php

use yii\helpers\VarDumper;

    $myServer = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];
?>

<div>
    Hello Vitalik! You are creator number <?= $data ?>!
    <a href="<?= $myServer . $_SERVER['REQUEST_URI'] ?>">index</a>
    <a href="<?= $myServer . '/web/test/test' ?>">test</a>
    <a href="<?= $myServer . '/web/test/no-test' ?>">no-test</a>
    <a href="<?= $myServer . '/web/test/no-my-page' ?>">no-my-page</a>

</div>

<?php   
    VarDumper::dump($this, 10, true);
    echo $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . '/test';
    var_dump($_SERVER);
    
?>