<?php
// session_start();
require './partials/header-view.php';
require_once 'core/functions.php';


$db = new Database($config);

$query = "SELECT * FROM students WHERE isAdmin = 0";

$statement = $db->query($query);

$students = $statement->fetchAll();

?>

<main>
    <?php $i=1; ?>

        <div class="container">

            <div class="table-responsive">
                <table class="table table-striped my-5">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Details</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($students as $student): ?>
                        <tr>

                            <td><?php echo $i++ ?> </td>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['address']; ?></td>
                            <td><a href="details.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Details</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>



    </main>

<?php
require 'partials/footer-view.php';
?>
