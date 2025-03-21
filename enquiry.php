<?php 
$dbname = "yashika";
$servername = "localhost";
$username = "root";
$password = "";
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $row = "SELECT * FROM `student` WHERE email='$email'";
    $roww = mysqli_query($con, $row);
    $num = mysqli_num_rows($roww);
    $msg="";
    if ($num > 0) {
        // Email already exists
        $msg = "<script>
            Swal.fire({
                title: 'Error!',
                text: 'This email already exists.',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'login.php'; // Redirect back to form
            });
        </script>";
    } else {
        // Insert new user
        $sql = "INSERT INTO `student` (`first`, `last`, `email`, `password`) VALUES ('$first', '$last', '$email', '$password')";
        if ($run = mysqli_query($con, $sql)) {
            // Success alert
            $msg = "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Your account has been saved!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'login.php'; // Redirect to login
            });
        </script>";} 
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .box {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main {
            height: 500px;
            width: 400px;
            box-shadow: 1px 2px 10px 3px lavender;
        }

        form {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        input {
            height: 40px;
            width: 100%;
            border: 2px solid rgb(196, 194, 194);
        }

        label {
            font-size: 20px;
            color: rgb(136, 133, 133);
            font-weight: 100;
        }

        .text {
            height: 80px;
            width: 80%;
            margin-top: 20px;
        }

        button {
            height: 40px;
            width: 100%;
            color: white;
            background-color: #3498db;
            border: 0px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="main">
            <form action="enquiry.php" method="POST">
                <div class="text contain">
                    <label for="">First name</label>
                    <input type="text" name="first" required>
                </div>

                <div class="text contain2">
                    <label for="">Last name</label>
                    <input type="text" name="last" required>
                </div>
                <div class="text contain3">
                    <label for="">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="text">
                    <label for="">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="text">
                    <button class="button" name="button" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
    <?php if ($msg) echo $msg; // Output the alert script here ?>

</body>

</html>
