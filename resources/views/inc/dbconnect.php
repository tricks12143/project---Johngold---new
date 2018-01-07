<?php

$con = mysqli_connect("localhost","root","","chat");

function db_connect()
{

  date_default_timezone_set("Asia/Taipei");

  

  $link = mysqli_connect("localhost", "root", "")
            or die('Could not connect: ' . mysqli_error());
  mysqli_select_db("samplechat") or die('Could not select database');
  return true;
}



function isdate($d)
{
   $ret = true;
   try
   {
       $x = date("d",$d);
   }
   catch (Exception $e)
   {
       $ret = false;
   }
   echo $x;
   return $ret;
}

 
?>
