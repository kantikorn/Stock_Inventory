<?php
session_start();
$conn = mysqli_connect("localhost","root","","inv-1");


if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
    $q = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($q);
    $data = mysqli_fetch_array($q);

    if($num == 1) {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['email'] = $data['email'];

        $location = Array("location"=>"managestock.php");
        echo json_encode($location);
            }
}
?>