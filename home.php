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
	?>
	<body>
		<h2>Początkowa strona</h2>
		<p>Witam, <?php Print "$user"?>!</p> <!--Displays user's name-->
		<a href="logout.php">Wylogować się</a><br/><br/>
		<form action="add.php" method="POST">
			Dodać do listy: <input type="text" name="szczegoly"/><br/>
			Czy publiczny wpis? <input type="checkbox" name="publiczny[]" value="yes"/><br/>
			Dostawca: 
			<?php
				include "db_connect.php";
				$result = mysql_query("SELECT nazwa FROM dostawca"); 
				 echo "<select name='dostawca'>"; 
				 while($row = mysql_fetch_assoc($result)) 
				 { 
				    echo "<option value = '".$row[nazwa]."'>".$row[nazwa]."</option>"; 
				 }
				 echo "</select>"
			?>
			<input type="submit" value="Dodaj do listy"/>
		</form>
		<h2 align="center">Lista produktów</h2>
		<table border="1px" width="100%">
			<tr>
				<th>ID</th>
				<th>Szczególy</th>
				<th>Czas Wpisu</th>
				<th>Czas Edytowania</th>
				<th>Edytuj</th>
				<th>Usuń</th>
				<th>Publiczny Wpis</th>
				<th>Dostawca</th>

			</tr>
			<?php
				$query = mysql_query("SELECT * FROM list INNER JOIN dostawca ON list.dostawca_id = dostawca.id");
				while($row = mysql_fetch_array($query))
				{
					Print '<tr>';
						Print '<td align="center">'. $row['id'] . '</td>';
						Print '<td align="center">'. $row['szczegoly'] . "</td>";
						Print '<td align="center">'. $row['data_wpisu']. " - ". $row['czas_wpisu']."</td>";
						Print '<td align="center">'. $row['data_edytowania']. " - ". $row['czas_edytowania']. "</td>";
						Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edytuj</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">usuń</a> </td>';
						Print '<td align="center">'. $row['publiczny']. "</td>";
						Print '<td align="center">'. $row['nazwa']. "</td>";
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Czy naprawde chcesz usunac ten zapis?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?id=" + id);
			  }
			}
		</script>
	</body>
</html>