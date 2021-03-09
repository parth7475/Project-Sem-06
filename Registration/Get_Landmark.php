<?php
    include_once '../Connection.php';

    $result = mysqli_query($conn, "select * from tbl_landmark where cid = " . $_POST["id"]);

    $object = array();
    while ($row = mysqli_fetch_assoc($result)){
        $object[] = array(
            "id" =>  $row["lid"],
            "name" => $row["landmark"]
        );
    }
    // = ['Name' => 'Nachiket Panchal', 'Link' => 'errorsea.com'];
    header("content-type: application/json");
    echo json_encode($object); 
?>
 
