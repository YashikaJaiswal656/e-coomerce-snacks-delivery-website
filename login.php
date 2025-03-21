<?php 
$dbname = "yashika";
$servername = "localhost";
$username = "root";
$password = "";
$con = new mysqli($servername, $username, $password, $dbname);
$msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $row = "SELECT * FROM `student` WHERE email='$email' ";
    $roww = mysqli_query($con, $row);
    $num = mysqli_num_rows($roww);
    
    if ($num > 0) {
        $rw=mysqli_fetch_assoc($roww);
        if($password==$rw['password']){
            
         session_start();
         $_SESSION['loggedin']=true;
         $_SESSION['email']=$email;
         $_SESSION['password']=$password;
        $msg = "<script>
            Swal.fire({
                title: 'Success!',
                text: 'succesfully log in',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'shop-grid.php'; 
            });
        </script>";
        }
        else{
            $msg = "<script>
            Swal.fire({
                title: 'error',
                text: 'your  password did not  match',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>";}
        
    } else {
        // Insert new user
            // Success alert
            $msg = "<script>
            Swal.fire({
                title: 'error',
                text: 'your email or password did not  match',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'enquiry.php'; // Redirect to login
            });
        </script>";} 
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
            <form action="login.php" method="POST">
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
