<?php
    include("parts/conn.php");
    $sql = "select * from patient_more_info where login_id=2";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(!$row){
        echo "NO data";
    }

?>