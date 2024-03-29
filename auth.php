<?php
require_once 'rb.php';

function connect_db(string $host, string $dbname, string $user, string $password) {
    try {
        return R::setup("pgsql:host=$host;dbname=$dbname", $user, $password);
    } catch (Exception $e) {
        throw new $e;
        
        return false;
    }
}

function login(string $email, string $password) {
    $failed = [
        'status' => false,
        'message' => 'Invalid email or password!'
    ];
    $user = R::find('user', 'email = :email', [ 'email' => $email ]);
    if (count($user) != 1) {
        return $failed;
    }
    $user = array_values($user)[0];
    if (!password_verify($password, $user->password)) {
        return $failed;
    }
    return [
        'status' => true,
        'message' => 'Login successful!'
    ];
}

function signup(string $name, string $email, string $password, string $number)
{
    $failed = [
        'status' => false,
        'message' => 'Registration failed!'
    ];
    $user = R::find('user', 'email = :email', [ 'email' => $email ]);
    if (count($user) > 0) {
        return [
            'status' => false,
            'message' => 'This email has been used before on this platform!'
        ];
    }
    $user = R::dispense('user');
    $user->name = $name;
    $user->email = $email;
    $user->password = password_hash($password, PASSWORD_DEFAULT);
    $user->number = $number;
    R::store($user);
    return [
        'status' => true,
        'message' => 'Registration successful!'
    ];
}

function set_up()
{
    $user = R::dispense('user');
    $user->email = 'photizo@hng.com';
    $user->password = password_hash('1234', PASSWORD_DEFAULT);
    R::store($user);
    // print_r('expression');
}

connect_db('ec2-184-73-232-93.compute-1.amazonaws.com','d7o4t6ds4parku','wrhvksgoxcqzpo','75a892a211781e65baa4fdb5f64696de751a1182560962c96907bab2a0e6c5a3');
// set_up();