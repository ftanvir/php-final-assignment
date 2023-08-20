<?php
// session_start();
require_once 'partials/header-view.php';
require_once 'core/functions.php';
require_once 'core/Database.php';

// $config = require_once('core/config.php');

// $db = new Database($config);



if(isset($_GET['id'])){
    $detailsID = $_GET['id'];
}else{
    $detailsID = $_SESSION['user_id'];
}

$i=1;

$query = "SELECT * FROM payments WHERE student_id = '$detailsID'";

$statement = $db->query($query);

$details = $statement->fetchAll();





?>


<main>

    <div class="container m-5 mx-auto">
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="row justify-content-center">
        <?php 
            $query = "SELECT * FROM students WHERE id = '$detailsID'";
            $statement = $db->query($query);
            $student = $statement->fetch();
            // dd($student['img']);
        ?>
            <div class="col-md-2">
                <img src="images/<?php echo $student['img'] ?>" class="img-thumbnail" alt="...">
            </div>

            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                
                                <tbody>
                                    <tr class="">
                                        <td scope="row" class="fw-bold">Name: </td>
                                        <td><?php echo $student['name']; ?></td>
                                    </tr>

                                    <tr class="">
                                        <td scope="row" class="fw-bold">Email: </td>
                                        <td><?php echo $student['email']; ?></td>
                                    </tr>

                                    <tr class="">
                                        <td scope="row" class="fw-bold">Contact No: </td>
                                        <td><?php echo $student['contact_no']; ?></td>
                                    </tr>

                                    <tr class="">
                                        <td scope="row" class="fw-bold">Address: </td>
                                        <td><?php echo $student['address']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-2">
                <?php if($detailsID== $_SESSION['user_id']) { ?>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Payment</button>

                <?php } ?>

            </div>

        </div>
    </div>

    <div class="container mx-auto">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col text">Payment Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $detail): ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $detail['date']; ?></td>
                    <td><?php echo $detail['amount']; ?></td>
                </tr>
                <?php endforeach; ?>

                <tr>
                    <th scope="row">Total Payment</th>
                    <td></td>
                    <?php 
                    $query = "SELECT SUM(amount) AS total FROM payments WHERE student_id = '$detailsID'";
                    $statement = $db->query($query);
                    $total = $statement->fetch();
                    ?>
                    <td><?php echo $total['total']; ?></td>

                </tr>

            </tbody>
        </table>

    </div>

</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="controllers/payment-controller.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Payment Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Payment Amount</label>
                        <input type="number" class="form-control" name="amount">
                    </div>
                

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>

                </form>
        </div>
    </div>
</div>


<?php
require 'partials/footer-view.php';
?>