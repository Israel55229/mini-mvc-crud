<?php 
    require_once "../includes/autoloader.php";
    require_once __DIR__ . "/layout/header.php";
    $title = "Student Detail";

    if(!isset($_GET['id'])) {
        echo "Invalid student ID";
    }


    $controller = new StudentController();
    $stud_Id = $controller->showSingleStudent((int)$_GET['id']);

?>


    <h1 class="mt-5 text-center">Student Detail</h1>

    <div class="card text-center mt-3">
        <?php if($stud_Id): ?>
            <div class="card-header">
                <?php echo htmlspecialchars($stud_Id['fullname']); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($stud_Id['program']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($stud_Id['email']); ?></p>
                <p class="card-text"><?php echo htmlspecialchars($stud_Id['phone']); ?></p>
                <a href="index.php" class="btn btn-primary">Go Home</a>
            </div>
            <div class="card-footer text-muted">
                <?php echo htmlspecialchars(date($stud_Id['created_at'])); ?>
            </div>
        <?php else: ?>
            <p>No Student Available.</p>
        <?php endif; ?>
    </div>




<?php require_once __DIR__ . "/layout/footer.php"; ?>

