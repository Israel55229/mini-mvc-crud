<?php
    session_start();
    require_once __DIR__ . "/layout/header.php";
    require_once "../includes/autoloader.php";

    $title = "Edit Student";



    // instantiate StudentController
    $controller = new StudentController();


    if(!isset($_GET["id"])){
        die("Invalid student id");
    }

    $id = (int)$_GET["id"];

    // Fetching an existing student based on the id
    $student = $controller->showSingleStudent($id);

    if(!$student) {
        die("Student not found");
    }

    $fullname = $student['fullname'];
    $email = $student['email'];
    $program = $student['program'];
    $phone = $student['phone'];

    $errors = [
        'fullname' => "",
        'email' => "",
        'program' => "",
        'phone' => ""
    ];


    // Now validation start
    if($_SERVER["REQUEST_METHOD"] === "POST") {

        if(empty($_POST['fullname'])) {
            $errors['fullname'] = "This field is required";
        }
        else {
            $fullname = htmlspecialchars(trim($_POST['fullname']));
            if(!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
                $errors['fullname'] = "Only letters and white space is allowed";
            }
        }

        if(empty($_POST['email'])) {
            $errors['email'] = "This field is required";
        }
        else {
            $email = htmlspecialchars(trim($_POST['email']));
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Enter a valid email address";
            }
        }

        if(empty($_POST['program'])) {
            $errors['program'] = "This field is required";
        }
        else {
            $program = htmlspecialchars(trim($_POST['program']));
            if(!preg_match("/^[a-zA-Z\s]+$/", $program)) {
                $errors['program'] = "Only letters and white space is allowed";
            }
        }

        if(empty($_POST['phone'])) {
            $errors['phone'] = "This field is required";
        }
        else {
            $phone = htmlspecialchars(trim($_POST['phone']));
            if(!preg_match("/^[0-9\s]+$/", $phone)) {
                $errors['phone'] = "Enter a valid phone number";
            }
        }

        if(!array_filter($errors)) {
            $controller->editStudent($id, $fullname, $email, $program, $phone);

            $_SESSION['message'] = "Student updated successfully";
            header("location: index.php");
            exit;
        }
    }




?>


    <div>
        <div class="card mx-auto" style="width: 640px">
            <div class="card-header bg-primary text-center fs-3">
                Update Student
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo htmlspecialchars($fullname); ?>">
                        <div class="text-danger fst-italic fw-semibold"><?php echo $errors['fullname']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" aria-describedby="email">
                        <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                        <div class="text-danger fst-italic fw-semibold"><?php echo $errors['email']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="program" class="form-label">Program</label>
                        <input type="text" class="form-control" name="program" id="program" value="<?php echo htmlspecialchars($program); ?>">
                        <div class="text-danger fst-italic fw-semibold"><?php echo $errors['program']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" aria-describedby="phone">
                        <div id="phone" class="form-text">We'll never share your contact number with anyone else.</div>
                        <div class="text-danger fst-italic fw-semibold"><?php echo $errors['phone']; ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100">Update</button>
                </form>
            </div>
        </div>
    </div>



<?php require_once __DIR__ . "/layout/footer.php"; ?>

