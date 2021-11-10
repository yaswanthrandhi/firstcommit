<?php
$username = $_POST['username'];
$password = $_POST['password'];

//database connection here
$con = new mysqli("localhost","root","","phpclasses");
if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
} else{
    $stmt = $con->prepare("select * from userdatabase where username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>login successfully</h2>";
        } else {
            echo "<h2> invalid username</h2>";
        }
    } else {
        echo "<h2> invalid username</h2>"
    }
}
?>