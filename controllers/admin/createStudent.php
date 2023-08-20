<?php
require_once '../../core/functions.php';
require_once '../../core/Database.php';

$config = require_once('../../core/config.php');

$db = new Database($config);

// dd($_FILES);

// upload the file in image folder
if(isset($_FILES['imageToUpload'])) {
    $errors = array();

    $file_name = $_FILES['imageToUpload']['name'];
    $file_size = $_FILES['imageToUpload']['size'];
    $file_tmp = $_FILES['imageToUpload']['tmp_name'];
    $file_type = $_FILES['imageToUpload']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['imageToUpload']['name'])));
    $extensions = array("jpeg", "jpg", "png");

    if(in_array($file_ext, $extensions) === false){
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if($file_size > 2097152){
        $errors[] = 'File size must be excately 2 MB';
    }

    if(empty($errors) === true){
        move_uploaded_file($file_tmp, "../images/".$file_name);
    }else{
        print_r($errors);
        redirect('register.php');
    }

}

session_start();

//get all the form data and stores in the variable
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$password = sha1($_POST['password']);
$confirmPassword = sha1($_POST['confirmPassword']);



//check if the password and confirm password are same
if($password != $confirmPassword){
    $_SESSION['error'] = "Password and Confirm Password are not same";
    redirect('admin-createStudent.php');
    die();
}


//check if the username already exists
$query = "SELECT * FROM students WHERE username = '$username'";
$statement = $db->query($query);
$user = $statement->fetch();

if($user){
    $_SESSION['error'] = "Username already exists";
    redirect('admin-createStudent.php');
    die();
}

//check if the email already exists
$query = "SELECT * FROM students WHERE email = '$email'";
$statement = $db->query($query);
$user = $statement->fetch();

if($user){
    $_SESSION['error'] = "Email already exists";
    redirect('admin-createStudent.php');
    die();
}



//insert the data into the database
$query = "INSERT INTO students (username, name, email, contact_no, address, password, confirm_password, img) VALUES ('$username', '$name', '$email', '$contact', '$address', '$password', '$confirmPassword', '$file_name')";
$statement = $db->query($query);

//check if the data is inserted or not
if($statement){
    $_SESSION['success'] = "Student Created Successfully";
    redirect('admin.php');
    die();
}else{
    $_SESSION['error'] = "Student Creation Failed";
    redirect('admin-createStudent.php');
    die();
}




?>