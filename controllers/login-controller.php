<?php 

require_once '../core/Database.php';
require '../core/functions.php';

$config = require_once('../core/config.php');

$db = new Database($config);

$emailAddress = $_POST['email'];
$password = sha1($_POST['password']);

$query = "SELECT * FROM students WHERE email = '$emailAddress' AND password = '$password'";
$statement = $db->query($query);
$user = $statement->fetch();

// dd($user['id']);

if($user){
    session_start();
    $_SESSION['user_id'] = $user['id'];
    redirect('index.php');
    // die();
}else{
    session_start();
    $_SESSION['error'] = "Invalid Email or Password";
    redirect('login.php');
    die();
}




