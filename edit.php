<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Baza danych produktów</title>
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
		<h2>Początkowa strona</h2>
		<p>Witam <?php Print "$user"?>!</p> <!--Displays user's name-->
		<a href="logout.php">Wylogować się</a><br/><br/>
		<a href="home.php">Powrot do początkowej</a>
		<h2 align="center">Obecnie wybrane</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Szczegoly</th>
				<th>Czas Wpisu</th>
				<th>Czas Edytowania</th>
				<th>Publiczny</th>
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					include "db_connect.php";
					$query = mysql_query("SELECT * from list Where id='$id'"); // SQL Query
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['id'] . "</td>";
								Print '<td align="center">'. $row['szczegoly'] . "</td>";
								Print '<td align="center">'. $row['data_wpisu']. " - ". $row['czas_wpisu']."</td>";
								Print '<td align="center">'. $row['data_edytowania']. " - ". $row['czas_edytowania']. "</td>";
								Print '<td align="center">'. $row['publiczny']. "</td>";
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
		<?php
		if($id_exists)
		{
		Print '
		<form action="edit.php" method="POST">
			Nowy opis: <input type="text" name="szczegoly"/><br/>
			Nowy dostawca:'; 
				$result = mysql_query("SELECT nazwa FROM dostawca"); 
				 echo "<select name='dostawca'>"; 
				 while($row = mysql_fetch_assoc($result)) 
				 { 
				    echo "<option value = '".$row[nazwa]."'>".$row[nazwa]."</option>"; 
				 }
				 echo "</select>";				
		Print '
			czy publiczny? <input type="checkbox" name="publiczny[]" value="yes"/><br/>
			<input type="submit" value="Aktualizowac Liste"/>
		</form>
		';
		}
		else
		{
			Print '<h2 align="center">Niema danych do edytowania.</h2>';
		}
		?>
	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include "db_connect.php";
		$details = mysql_real_escape_string($_POST['szczegoly']);
		$public = "no";
		$id = $_SESSION['id'];
		$time = strftime("%X");//time
		$date = strftime("%B %d, %Y");//date
		//$vendor = mysql_real_escape_string($_POST['dostawca']);
		foreach($_POST['publiczny'] as $list)
		{
			if($list != null)
			{
				$public = "yes";
			}
		}
		mysql_query("UPDATE list SET szczegoly='$details', publiczny='$public', data_edytowania='$date', czas_edytowania='$time' WHERE id='$id'") ;
		header("location: home.php");
	}
?>