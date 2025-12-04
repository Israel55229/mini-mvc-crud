<?php
    session_start();
    require_once __DIR__ . '/layout/header.php';
    require_once "../includes/autoloader.php";



    $fullname  = $email = $program = $phone = "";

    // error message values as an associative arrays
    $errors = [
            "fullname" => "",
            "email" => "",
            "program" => "",
            "phone" => ""
    ];

    // Instantiating the StudentController class
    $insertStudentData = new StudentController();

    // instantiate the function from the controller folder or directory
    if($_SERVER["REQUEST_METHOD"] == "POST") {


        if(empty($_POST['fullname'])) {
            $errors['fullname'] = "this field is required";
        }
        else {
            $fullname = htmlspecialchars(trim($_POST['fullname']));
            if(!preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
                $errors['fullname'] = "Full name should be letters and white space only";
            }
        }

        /* Validating the email address */
        if(empty($_POST['email'])) {
            $errors['email'] = "this field is required";
        }
        else {
            $email = htmlspecialchars(trim($_POST['email']));
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email";
            }
        }

        // Validate the programe
        if(empty($_POST['program'])) {
            $errors['program'] = "This field is required";
        }
        else {
            $program = htmlspecialchars(trim($_POST['program']));
            if(!preg_match('/^[a-zA-Z\s]+$/', $program)) {
                $errors['program'] = "Program name should be letters and white space only";
            }
        }

        // validating the phone number
        if(empty($_POST['phone'])) {
            $errors['phone'] = 'This field is required';
        }
        else {
            $phone = htmlspecialchars(trim($_POST['phone']));
            if(!preg_match('/^[0-9]+$/', $phone)) {
                $errors['phone'] = "Enter a valid phone number";
            }
        }

        if(!array_filter($errors)) {
            $insertStudentData->insertStudent($fullname, $email, $program, $phone);
            $_SESSION["message"] = "{$fullname} added successfully";
            header("Location: index.php");
            exit();
        }

    }
?>


<div class="card  mt-5 mx-auto shadow" style="width: 647px">
    <div class="card-header bg-primary fw-bold fs-3 text-light text-center">
        Student Registration Form
    </div>
    <div class="card-body">
        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $_POST['fullname'] ?? ""; ?>">
                <p class="text-danger fst-italic fw-bold"><?php echo $errors['fullname']; ?></p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="email" value="<?php echo $_POST['email']  ?? ""; ?>">
                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                <p class="text-danger fst-italic fw-bold"><?php echo $errors['email']; ?></p>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label">Program</label>
                <input type="text" class="form-control" name="program" id="program" value="<?php echo $_POST['program']  ?? ""; ?>">
                <p class="text-danger fst-italic fw-bold"><?php echo $errors['program']; ?></p>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phone" value="<?php echo $_POST['phone']  ?? ""; ?>">
                <div id="phone" class="form-text">We'll never share your contact number with anyone else.</div>
                <p class="text-danger fst-italic fw-bold"><?php echo $errors['phone']; ?></p>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

</div>


<?php require_once __DIR__ . "/layout/footer.php"; ?>
