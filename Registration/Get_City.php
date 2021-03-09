<?php
    include_once '../Connection.php';

    $id = $_POST['id'];
    $result = mysqli_query($conn, "select * from tbl_city where stid =". $id);

    $object = array();

    while ($row = mysqli_fetch_array($result)){
            $object[] = array(
                "id" =>  $row["cid"],
                "name" => $row["cname"]
            );
    }

    header("content-type: application/json");
    echo json_encode($object); 
?>
 
