<?php
    include_once '../Connection.php';

    $result = mysqli_query($conn, "select * from tbl_society where lid = " . $_POST["id"]);

    $object = array();
    while ($row = mysqli_fetch_assoc($result)){
        $object[] = array(
            "id" =>  $row["sid"],
            "name" => $row["sname"]
        );
    }
    // = ['Name' => 'Nachiket Panchal', 'Link' => 'errorsea.com'];
    header("content-type: application/json");
    echo json_encode($object); 
?>
 
