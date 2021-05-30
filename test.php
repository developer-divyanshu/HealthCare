<?php
    include("parts/conn.php");
    $query = "Select * from live_token";
    $result = mysqli_query($mysqli,$query);
    $row = [];
    if($result!==False){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    }

    echo json_encode($row);
?>