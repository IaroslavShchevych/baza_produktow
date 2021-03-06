<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css"> 
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
	<div id="wrapper">
		<h3>Edytuj produkt</h3>
		<div id="header">
			<p>Witam <?php Print "$user"?>!</p> <!--Displays user's name-->
			<a href="logout.php">Wylogować się</a><br/>
			<a href="home.php">Powrot do początkowej</a>
		</div>
		<h4>Obecnie wybrane:</h4>
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
							$det_row = [$row['szczegoly'], $row['publicny']];
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
		?>
		<form action="edit.php" method="POST">
			Nowy opis: <input type="text" name="szczegoly" value="<?php echo ($det_row[0]); ?>"/><br/>
			Czy publiczny? <input type="checkbox" name="publiczny[]" value="yes"/>			
			<input type="submit" value="Aktualizowac Liste"/>
		</form>
		<?php
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
		$details = mysql_real_escape_string($_POST['szczegoly']);
		$time = strftime("%X");//time
		$date = strftime("%B %d, %Y");//date
		$public = "no";
		//$vendor = mysql_real_escape_string($_POST['dostawca']); 
		
		foreach($_POST['publiczny'] as $list)
		{
			if($list != null)
			{
				$public = "yes";
			} else {
				$public= "no";
			}
		}

		mysql_query("UPDATE list SET szczegoly='$details', data_edytowania='$date', publiczny='$public', czas_edytowania='$time' WHERE product_id='$id'") ;
		header("location: home.php");
	}
		
?>
