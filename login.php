<?php require 'partials/header-view.php';

?>

<main>

        <div class="container my-5">

            <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']); ?>

            <?php endif; ?>

            <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']); ?>

            <?php endif; ?>
            

            <div class="card p-4 w-50 mx-auto">
                <h4 class="card-title text-center">Login</h4>

                <br>
                <p>
                    <h6>Admin Login Details:</h6>
                    <p>Email Address: admin@admin.com</p><p>Password: admin</p>
                </p>

                <form action="controllers/login-controller.php" method="POST" class="mt-3">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>

            </div>


        </div>

        

</main>

<?php require 'partials/footer-view.php'; ?>