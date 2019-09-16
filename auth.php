<?php

function connect_db(string $host, string $dbname, string $user, string $password) {
    try {
        return new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    } catch (Exception $e) {
        throw new $e;
        
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


function set_up()
{
    $db = connect_db('ec2-184-73-232-93.compute-1.amazonaws.com','d7o4t6ds4parku','wrhvksgoxcqzpo','75a892a211781e65baa4fdb5f64696de751a1182560962c96907bab2a0e6c5a3');
    $tbl_sql = "CREATE TABLE `users` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(70) NOT NULL , PRIMARY KEY (`id`)) ";
    $db->query($tbl_sql);
    $rec_sql = "INSERT INTO `users` (`email`, `password`) VALUES ('photizo@hng.com', '$2y$10$7X0xb6ghz4yPLfTaaXazz.Hp08wsJ.DwxsQVK5734gzWjsV3sXxiO')";
    $db->query($rec_sql);
    print_r('ok');
}

// $db = connect_db('localhost', 'hng', 'root', '');
// $l = login($db, 'photizo', '1234');
// print_r($l);
// set_up();