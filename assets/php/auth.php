<?php

function connect_db(string $host, string $dbname, string $user, string $password) {
    try {
        return new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    } catch (Exception $e) {
        return false;
    }
}

function login(PDO $db_connect, string $email, string $password) {
    $failed = [
        'status' => false,
        'message' => 'Invalid email or password!'
    ];
    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $stmnt = $db_connect->prepare($sql);
    $stmnt->execute([ 'email' => $email ]);
    $data = $stmnt->fetchAll(PDO::FETCH_OBJ);
    if (!((is_array($data) and (count($data) == 1)))) {
        return $failed;
    }
    $data = array_values($data)[0];
    if (!password_verify($password, $data->password)) {
        return $failed;
    }
    return [
        'status' => true,
        'message' => 'Login successful!'
    ];
}

// $db = connect_db('localhost', 'hng', 'root', '');
// $l = login($db, 'photizo', '1234');
// print_r($l);