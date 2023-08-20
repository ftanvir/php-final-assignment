<?php require './partials/header-view.php'; 

require_once 'core/functions.php';
require_once './core/Database.php';

if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true){

    redirect('index.php');
}


// $config = require_once('./core/config.php');

// $db = new Database($config);

$query = "SELECT * FROM students WHERE isAdmin = 0";

$statement = $db->query($query);

$students = $statement->fetchAll();
$i = 1;




?>

<main>


        <div class="container mt-5">

        <?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>

        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php } ?>

            <div class="row">

                <div class="col-md-4">

                    <ul class="list-group">
                        <li class="list-group-item bg-success"><a href="admin.php"
                                style="text-decoration: none; color: aliceblue;">Student List</a></li>
                        <li class="list-group-item bg-success"><a href="admin-createStudent.php"
                                style="text-decoration: none; color: aliceblue;">Create New Student</a></li>

                    </ul>

                </div>

                <div class="col-md-8">

                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            foreach($students as $student){
                        ?>

                            <tr>
                                <td ><?php echo $i++; ?></td>
                                <td><?php echo $student['name']; ?></td>
                                <td><?php echo $student['address']; ?></td>
                                <td>
                                    <a href="details.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-info">Details</a>
                                    <a href="admin-edit.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="controllers/admin/delete.php?id= <?php echo $student['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                </div>


            </div>

        </div>


    </main>


<?php require 'partials/footer-view.php'; ?>