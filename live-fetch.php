<?php
    include("parts/conn.php");

    session_start();
    $patient_p_id = $_SESSION['p_id']; //Session is started on dashboard.php

    $query="select * from live_token where p_id='$patient_p_id'";
    $res = mysqli_query($mysqli,$query);
    $token_row=[];
    // Condition for checking that live_token table exists or not 
    $token_number=0;
    if($res!==False){
        $token_row = mysqli_fetch_array($res,MYSQLI_ASSOC);  
    }
    if(isset($token_row['token_no']))
    {
        $token_number = $token_row['token_no'];
    }

    $query_for_live_token = "Select token_no,is_started from live_token order by token_no asc limit 1";
    $get_live_token = mysqli_query($mysqli, $query_for_live_token);
    $live_token_row = [];
    if($get_live_token!==False){
        $live_token_row=mysqli_fetch_array($get_live_token,MYSQLI_ASSOC);
    }


    if(!$token_row){
        echo '<img src="assets/images/deny.png" /><h4>Live Token will be visible only after Booking an appointment!</h4>';
    }else{
        if($live_token_row['is_started']==0){
            echo '<p style="color: gold;">'.$live_token_row['token_no'].'</p>';
            echo '<h4 style="color: gold;">Waiting For Patient...</h4>';
        }
        else{
            echo '<p style="color: green;">'.$live_token_row['token_no'].'</p>';
            echo '<h4 style="color: green;">Consulting...</h4>';
        }
        
    }


?>