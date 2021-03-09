<?php 
    include_once '../Connection.php';
    $id= $_GET['id']; 
    $action = $_GET['action'];

    if(strcmp($action,"approve") == 0)
    {
        $q = "update tbl_member set is_approved = 'Approved' where mid = $id";
        mysqli_query($conn,$q);
    }

    if(strcmp($action,"reject") == 0)
    {
        $q = "update tbl_member set is_approved = 'Rejected' where mid = $id";
        mysqli_query($conn,$q);
    }
?>