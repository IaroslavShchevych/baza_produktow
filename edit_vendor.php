<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"> 
		<title>Baza danych dostawców</title>
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['imie']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['imie']; //assigns user value
	$id_exists = false;
	?>
	<body>
	
	<div id="wrapper">
		<h3>Edytuj dostawce</h3>
		<div id="header" style="text-align:right">
			<p>Witam, <?php Print "$user"?>!</p> <!--Displays user's name-->
			<a href="logout.php">Wylogować się</a><br/>
			<a href="home.php">Powrot do początkowej</a>
		</div>
		<h4>Obecnie wybrany:</h4>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Nazwa</th>
				<th>Kontakt</th>
				<th>Kraj</th>			
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					include "db_connect.php";
					$query = mysql_query("SELECT * FROM dostawca WHERE id='$id'"); // SQL Query
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['id'] . "</td>";
								Print '<td align="center">'. $row['nazwa'] . "</td>";
								Print '<td align="center">'. $row['kontakt']. "</td>";
								Print '<td align="center">'. $row['kraj']. "</td>";
								
							Print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
	<div id="edit">
		<?php
		if($id_exists)
		{
		Print '
		<form action="edit_vendor.php" method="POST">
			Wprowadż nową nazwę: <input type="text" name="nazwa" required/><br/>
			Wprowadż nowy kontakt: <input type="text" name="kontakt" required/><br/>
			Wprowadż nowy kraj: <input type="text" name="kraj" required/><br/>
		<input type="submit" value="Aktualizuj dostawcę"/>
		';
		}
		else
		{
			Print '<h2 align="center">Niema danych do edytowania.</h2>';
		}
		?>
	</div>
		<div id="footer">
				<p><a href="https://sites.google.com/site/infoteczka/" >(c) ŻAK. Wrocław, 2017 </a></p>
		</div>
	</div>
	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include "db_connect.php";
		$id = $_SESSION['id'];
		$name = mysql_real_escape_string($_POST['nazwa']);
        $contact = mysql_real_escape_string($_POST['kontakt']);
        $state = mysql_real_escape_string($_POST['kraj']);
		
		mysql_query("UPDATE dostawca SET nazwa='$name', kontakt='$contact', kraj='$state' WHERE id='$id'") ;
		header("location: home.php");
	}
?>