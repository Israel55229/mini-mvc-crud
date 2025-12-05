<?php
    require_once __DIR__ . "/layout/header.php";
    require_once "../includes/autoloader.php";

    // instantiate the StudentController class
    $controller = new StudentController();

    if(!isset($_GET['id'])) {
        die("Invalid student ID");
    }

    $id = (int)$_GET['id'];

    $student = $controller->showSingleStudent($id);

    if(!$student) {
        echo "Student not found";
    }

    // if user clicked on the 'Confirm' button
    if(isset($_POST['confirm'])) {
        $controller->delete($id);
        $_SESSION['message'] = "Student deleted successfully";

        header('location: index.php');
        exit;
    }

    // If user clicks on 'Cancel'
    if(isset($_POST['cancel'])){
        header('location: index.php');
        exit;
    }



?>


<div class="card">
    <div class="card-header text-light bg-danger text-center fw-bold">
        Confirm Delete
    </div>
    <div class="card-body">
        <form action="" method="post">
            <p>Are you sure you want to delete this student</p>
            <p><?php echo htmlspecialchars($student['fullname']); ?></p>
            <p><strong>Email address</strong>: <?php echo htmlspecialchars($student['email']); ?></p>
            <button class="btn btn-danger me-2" name="confirm" type="submit">Confirm</button>
            <button type="submit" name="cancel" class="btn btn-secondary">Cancel</button>
        </form>
    </div>
</div>







<?php require_once __DIR__ . "/layout/footer.php"; ?>
