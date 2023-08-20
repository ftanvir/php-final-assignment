<?php require_once 'partials/header-view.php'; 

require_once 'core/functions.php';

require_once 'core/Database.php';

if(!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != true){

    redirect('index.php');
}


$sid = $_GET['id'];

$query = "SELECT * FROM students WHERE id = $sid";

$statement = $db->query($query);

$student = $statement->fetch();


// dd($student['id']);


?>


<main>

        <div class="container m-5 mx-auto">

        

            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    
                    <form action="controllers/admin/edit.php" method="POST">
                        <h2>Edit Student Details</h2>

                        <input type="hidden" name="id" value="<?php echo $student['id'];  ?>">

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $student['username'];  ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $student['name'];  ?>" required >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $student['email'];  ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contact No</label>
                            <input type="number" class="form-control" name="contact" value="<?php echo $student['contact_no'];  ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $student['address'];  ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $student['password'];  ?>" disabled>
                        </div>
                    
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="<?php echo $student['confirm_password'];  ?>" disabled>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>

            

        </div>


</main>


<?php require 'partials/footer-view.php' ?>