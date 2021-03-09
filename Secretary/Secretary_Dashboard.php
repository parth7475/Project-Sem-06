<?php session_start();
    if($_SESSION['mid'] == "")
    {
        header("location:home.php");
    }
?>
