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
		<h3 align="center">Edytuj produkt</h3>
		<div id="header" style="text-align:right">
			<p>Witam <?php Print "$user"?>!</p> <!--Displays user's name-->
			<a href="logout.php">Wylogować się</a><br/>
			<a href="home.php">Powrot do początkowej</a>
		</div>
		<h4 align="center">Obecnie wybrane:</h4>
		<table border="1px" width="100%">
			<tr>
				<th>ID</th>
				<th>Szczegoly</th>
				<th>Czas Wpisu</th>
				<th>Czas Edytowania</th>
				<th>Publiczny Zapis</th>
				<th>Dostawca</th>
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					include "db_connect.php";
					/* MySQL request for data of product and its vendor */
					$query = mysql_query("SELECT list.*, dostawca.* FROM list, dostawca WHERE list.product_id='$id' AND dostawca.id=list.dostawca_id");
					$count = mysql_num_rows($query);

					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['product_id'] . "</td>";
								Print '<td align="center">'. $row['szczegoly'] . "</td>";
								Print '<td align="center">'. $row['data_wpisu']. " - ". $row['czas_wpisu']."</td>";
								Print '<td align="center">'. $row['data_edytowania']. " - ". $row['czas_edytowania']. "</td>";
								Print '<td align="center">'. $row['publiczny']. "</td>";
								Print '<td align="center">'. $row['nazwa']. "</td>";
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
			Czy publiczny? <input type="checkbox" name="publiczny[]" value="tak"/>			
			<input type="submit" value="Aktualizowac Liste"/>
		</form>
		';
		}
		else
		{
			Print '<h2 align="center">Niema danych do edytowania.</h2>';
		}
		?>
	<div id="footer" style="clear:both; padding:7px; text-align:center">
				<p><a href="https://sites.google.com/site/infoteczka/" >(c) ŻAK. Wrocław, 2017 </a></p>
	</div>
	</body>
</html>

<?php
	
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include "db_connect.php";
		$id = $_SESSION['id'];
		$details = mysql_real_escape_string($_POST['szczegoly']);
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

		mysql_query("UPDATE list SET szczegoly='$details', data_edytowania='$date', publiczny='$public', czas_edytowania='$time' WHERE product_id='$id'") ;
		header("location: home.php");
	}
		
?>
