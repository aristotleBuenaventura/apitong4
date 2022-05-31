<?php
    include "connectionRegistration.php";

    error_reporting(0);
    
    if (isset($_SESSION['username'])) {
        header("Location: index.html");
    }

    if (isset($_POST['submit'])) {
        session_start();
        
        $_SESSION['email'] = $_POST['email'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // $role = $_POST['role'];
        $result = getUserByEmail($conn, $email, $password);
        $user = mysqli_fetch_row($result);
        $user = $_POST['username'];
        if ($result->num_rows > 0) {
                    $row = mysqli_fetch_row($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: index.php");
                } else {
                    echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                }


    }
    
    function getUserByEmail($conn, $email, $password) {
        $sql = "SELECT * FROM registration WHERE email='$email' AND password= '$password'";
        return mysqli_query($conn, $sql);
    }


    include 'login.html';

  

?>