<?php
    session_start();
    if($_SESSION['imie']){
    }
    else{
        header("location:index.php");
    }
    if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
    {
        include "db_connect.php";
        $details = mysql_real_escape_string($_POST['szczegoly']);
        $time = strftime("%X");//time
        $date = strftime("%B %d, %Y");//date
        $decision ="no";
        $vendor = mysql_real_escape_string($_POST['dostawca']);
        /*$ven = mysql_query("SELECT id FROM dostawca WHERE nazwa='$vendor");*/
        foreach($_POST['publiczny'] as $each_check) //gets the data from the checkbox
        {
            if($each_check !=null ){ //checks if the checkbox is checked
                $decision = "yes"; //sets teh value
            }
        }
        
        mysql_query("INSERT INTO list (szczegoly, data_wpisu, czas_wpisu, publiczny, dostawca_id) VALUES ('$details','$date','$time','$decision', '$vendor')"); //SQL query
        header("location: home.php");
        
    }
    else
    {
        header("location:home.php"); //redirects back to hom
    }
?>