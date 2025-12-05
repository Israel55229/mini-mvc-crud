<?php
    session_start();
    require_once __DIR__ . "/layout/header.php";
    require_once "../includes/autoloader.php";
    $title = "Student List";

    // Creating instance of the StudentController class
    $controller = new StudentController();
    $students = $controller->showAllStudents();

     {


    }

?>
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-success text-left fs-2 fw-bold" role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <h1 class="fs-1 float-start">All Students</h1>
    <div class="px-4 py-2 float-end">
        <a href="add.php" class="btn btn-primary text-light fs-3 text-decoration-none">Add Student</a>
    </div>
    <div class="mt-4">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Program</th>
                <th scope="col">Email Address</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($students)): ?>
                <?php foreach($students as $student): ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($student['id']); ?></th>
                        <td>
                            <a href="detail.php?id=<?= htmlspecialchars($student['id']); ?>" class="text-decoration-none"><?php echo htmlspecialchars($student['fullname']); ?></a>
                        </td>
                        <td><?php echo htmlspecialchars($student['program']); ?></td>
                        <td><?php echo htmlspecialchars($student['email']); ?></td>
                        <td>
                            <a href="edit.php?id=<?= htmlspecialchars($student['id']); ?>" class="btn btn-warning btn-sm px-3 py-2 text-decoration-none text-light">Update</a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo htmlspecialchars($student['id']); ?>" class="btn btn-danger btn-sm px-3 py-2 text-decoration-none text-light">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-danger">No Student Found.</p>
            <?php endif; ?>
            </tbody>
        </table>
    </div>



<?php require_once __DIR__ . "/layout/footer.php";?>

