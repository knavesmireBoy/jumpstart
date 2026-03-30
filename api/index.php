<?php
require_once __DIR__  . '/config.php';
require_once __DIR__  . '/helpers.inc.php';
require_once __DIR__ . '/db.inc.php';
$sql = "SELECT * from employee";
$st = doQuery($pdo, $sql, 'fail');
$rows = $st->fetchAll(PDO::FETCH_ASSOC); 
include TEMPLATE . 'head.html.php'; ?>
<h1>Jumpstart</h1>
<ul>
    <?php
    foreach ($rows as $row) {

        $fname = $row['first_name'];
        $lname = $row['last_name'];
        include './templates/_list.html.php';
    } ?>

</ul>
<?php

include 'templates/footer.html.php'; ?>