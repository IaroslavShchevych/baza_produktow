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
        $name = mysql_real_escape_string($_POST['nazwa']);
        $contact = mysql_real_escape_string($_POST['kontakt']);
        $state = mysql_real_escape_string($_POST['kraj']);
                
        mysql_query("INSERT INTO dostawca (nazwa, kontakt, kraj) VALUES ('$name','$contact','$state')"); //SQL query
        header("location: home.php");
        
    }
    else
    {
        header("location:home.php"); //redirects back to home
    }
	
	
?>