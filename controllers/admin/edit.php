<?php

require_once '../../core/functions.php';
require_once '../../core/Database.php';
session_start();
// dd($_POST);

$config = require_once('../../core/config.php');
// dd($config);

$db = new Database($config);

$id = $_POST['id'];
$name = $_POST['name'];
$contact = $_POST['contact'];
$address = $_POST['address'];







//edit the data into the database
$query = "UPDATE students SET name = '$name', contact_no = '$contact', address = '$address' WHERE id = '$id'";

$statement = $db->query($query);

//check if the data is inserted or not
if($statement){
    $_SESSION['success'] = "Student Updated Successfully";
    
    redirect('admin.php');
}else{
    $_SESSION['error'] = "Student Updation Failed";
    redirect('admin.php');
}