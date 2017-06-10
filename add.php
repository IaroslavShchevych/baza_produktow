<?php
    session_start();
    if($_SESSION['imie']){
    }
    else{
        header("location:index.php");
    }
    if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
    {
        $details = mysql_real_escape_string($_POST['szczegoly']);
        $time = strftime("%X");//time
        $date = strftime("%B %d, %Y");//date
        $decision ="no";
        mysql_connect("localhost", "root","usbw") or die(mysql_error()); //Connect to server
        mysql_select_db("pierwsza_db") or die("Cannot connect to database"); //Connect to database
        foreach($_POST['publiczny'] as $each_check) //gets the data from the checkbox
        {
            if($each_check !=null ){ //checks if the checkbox is checked
                $decision = "yes"; //sets teh value
            }
        }
        
        mysql_query("INSERT INTO list (szczegoly, data_wpisu, czas_wpisu, publiczny, dostawca_id) VALUES ('$details','$date','$time','$decision', '1')"); //SQL query
        header("location: home.php");
    }
    else
    {
        header("location:home.php"); //redirects back to hom
    }
?>
