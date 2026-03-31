<?php
require_once __DIR__  . '/config.php';
require_once __DIR__  . '/helpers.inc.php';
require_once __DIR__ . '/db.inc.php';
$sql = "SELECT * from address";
$st = doQuery($pdo, $sql, 'fail');
$rows = $st->fetchAll(PDO::FETCH_ASSOC); 

include TEMPLATE . 'head.html.php'; ?>
<h1>Jumpstart</h1>
<ul>
    <?php
    foreach ($rows as $row) {

        $fname = $row['address'];
        $lname = $row['postcode'];
        include TEMPLATE . '_list.html.php';
    } ?>

</ul>
<?php

include TEMPLATE . 'footer.html.php'; ?>