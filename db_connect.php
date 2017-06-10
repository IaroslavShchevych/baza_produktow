<?php
	mysql_connect("localhost", "root","usbw") or die(mysql_error()); //Connect to server
	mysql_select_db("pierwsza_db") or die("Cannot connect to database"); //connect to database
?>