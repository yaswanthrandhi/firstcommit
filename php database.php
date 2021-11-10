<?php
$connect=mysqli_connect("localhost","root","","userdatabase") or die("connection failed");
if (!empty($_POST['save']))
{
    $username = $_POST['un'];
    $password = $_POST['pw'];
    $query = "select * from userdatabase where username = '$username' and password = '$password'";
    $result = mysqli_query($connect,$query);
    $count = mysqli_num_rows($result);
    if($count>0)
    {
        echo "login successful";
    }
    else{
        echo "login not successful";
    }
}
?>

<form method="POST">
    Enter username<input type="text" name="un"/>
    <br/>
    Enter password<input type="password" name="pw"/>
    <br/>
    <input type="submit" name="save" value="login"/>
</form>
