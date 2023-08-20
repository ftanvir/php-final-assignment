<?php

require_once '../../core/functions.php';
require_once '../../core/Database.php';

$config = require_once('../../core/config.php');

$db = new Database($config);

$deleteID = $_GET['id'];

$query = "DELETE FROM students WHERE id = '$deleteID'";

$statement = $db->query($query);

$_SESSION['success'] = "Student Deleted Successfully";

redirect('admin.php');



// dd($_GET['id']);