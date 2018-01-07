<?php

    require_once('dbconnect.php');

     //db_connect();

     $msg = $_GET["msg"];
     $dt = date("Y-m-d H:i:s");
     $user = $_GET["name"];

     $sql="INSERT INTO chat(username,chatdate,msg) VALUES('" . $user . "','" . $dt . "','" . $msg . "')";

          echo $sql;

     $result = mysqli_query($con, $sql);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysqli_error());
        exit();
     }

     echo "FAK";
?>





