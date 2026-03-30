<?php
try {
    $env = getenv();
    preg_match('/[^:]+:\/\/[^:]+:([^@]+)@(.+)/', $env['DATABASE_URL'] ?? '', $matches);
    $pwd = $matches[1] ?? null;
    $connect = $matches[2] ?? null;

    dump($env);
    if (!$pwd) {
         throw new Exception('Unable to connect to the database server innit');
    }

    //postgresql://neondb_owner:npg_mVCK8dWTiRB7@ep-little-band-ab6qi5hl-pooler.eu-west-2.aws.neon.tech/jumpstart?sslmode=require&channel_binding=require

    //note cannot get postgres drivers to work in home environment
    $params = ['host' => '127.0.0.1', 'port' => 5432, 'database' => 'uploads', 'user' => 'andrewjsykes', 'password' => 'covid19krauq'];
    $params = ['host' => $connect, 'port' => 5432, 'database' => 'uploads', 'user' => 'neondb_owner', 'password' => $pwd];
    $db = sprintf(
        "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
        $params['host'],
        $params['port'],
        $params['database'],
        $params['user'],
        $params['password']
    );
    // $pdo = new PDO($db);
    $pdo = new PDO('mysql:host=localhost;dbname=jumpstart', 'root', 'covid19krauq');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->exec('SET NAMES "utf8"');
    //$pdo->exec('SET search_path TO jumpstart');
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage();
    $error = $output;
    //  include TEMPLATE . 'output.html.php';
    exit();
}
