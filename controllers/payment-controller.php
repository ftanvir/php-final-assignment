<?php
session_start();

require_once '../core/functions.php';
require '../core/Database.php';

// dd(isset($POST['submit']));

$config = require_once('../core/config.php');

$db = new Database($config);

$date = $_POST['date'];
$amount = $_POST['amount'];
$student_id = $_SESSION['user_id'];

$query = "INSERT INTO payments (date, amount, student_id) VALUES ('$date', '$amount', '$student_id')";

$statement = $db->query($query);

if($statement){
    $_SESSION['success'] = "Payment Successful";
    redirect('details.php');
}else{
    $_SESSION['error'] = "Payment Failed";
    redirect('index.php');
}
