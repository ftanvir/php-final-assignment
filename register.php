<?php
require './partials/header-view.php';
require_once 'core/functions.php';

// session_start();

if(isset($_SESSION['error'])){
    //display the error message
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    // dd($_SESSION['error']);
    unset($_SESSION['error']);


}

if(isset($_SESSION['success'])){
    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}

?>

<main>

        <div class="container m-5 mx-auto">

            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    
                    <form action="controllers/register-controller.php" method="POST" enctype="multipart/form-data">
                        <h2>Student Registration</h2>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact No</label>
                            <input type="number" class="form-control" name="contact" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Choose Profile Image</label>
                            <input type="file" class="form-control" name="imageToUpload">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

            

        </div>


</main>


<?php
require 'partials/footer-view.php';
?>