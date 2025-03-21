<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yashika";
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "DELETE FROM `payment` WHERE 1";

if ($run = mysqli_query($con, $sql)) {

    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Success!",
                text: "Your product will be delivered soon",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        });
    </script>
    </body>
    </html>';
    exit();
} else {
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Error",
                text: "There was an error processing your request",
                icon: "error",
                confirmButtonText: "OK"
            });
        });
    </script>
    </body>
    </html>';
    exit();
}

$con->close();
?>
