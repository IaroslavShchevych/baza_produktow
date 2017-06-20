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
		<!-- HEADER -->
		<div name="id">
			<h2>Początkowa strona</h2>
			<p>Witam, <?php Print "$user"?>! <br/> <a href="logout.php">Wylogować się</a> </p> <!--Displays user's name-->		
		</div>
		
		<!-- MAIN AREA WITH TWO SIDEBARS -->

		<div id="wrapper" style="text-align:center;">
			<div id="left sidebar" style="border:1px solid #000; display:inline-block;"> 
				<h4> Wybierz Liste dla pracy </h4> 
				<a href="#">Lista produktów</a> <br/>
				<!-- >>>>DOES'N WORK LINE BELOW<<<<< -->
				<span onClick="StartFrame()"> Lista dostawców </span>
			</div>
			<div id="main_frame" style="border:1px solid red; display:inline-block;"> Some content  </div>
		</div>
		
		
<script type="text/javascript">
	function StartFrame(){
			document.getElementById("main_frame").innerHTML = '<?php include "vendors_table.php"; ?>' ;
	}

</script>
		
		<!-- CODE FOR REBUILDING -->
		
		<h6> CODE FOR REBUILDING </h6>
		<form action="add.php" method="POST">
			Dodać do listy produktów: <input type="text" name="szczegoly"/><br/>
			Czy publiczny zapis? <input type="checkbox" name="publiczny[]" value="yes"/><br/>
			Zaznacz dostawcę: 
			<?php
				include "db_connect.php";
				$result = mysql_query("SELECT id, nazwa FROM dostawca"); 
				 echo "<select name='dostawca'>"; 
				 while($row = mysql_fetch_array($result)) 
				 { 
				    /*echo "<option value = '".$row['id']."'>".$row['nazwa']."</option>";*/ 
				    echo "<option value='" . $row['id'] . "'>". $row['nazwa'] . "</option>";
				 }
				 echo "</select>"
			?> <br/>
			<input type="submit" value="Dodaj do listy"/>
		</form>
		<h2 align="center">Lista produktów</h2>
		<table border="1px" width="100%">
			<tr>
				<th>ID</th>
				<th>Szczególy</th>
				<th>Czas Wpisu</th>
				<th>Czas Edytowania</th>
				<th>Publiczny Zapis</th>
				<th>Dostawca</th>
				<th>Edytuj</th>
				<th>Usuń</th>

			</tr>
			<?php
				//$query = mysql_query("SELECT * FROM list INNER JOIN dostawca ON list.dostawca_id = dostawca.id");
			$query = mysql_query("SELECT list.*, dostawca.* FROM list, dostawca WHERE list.dostawca_id=dostawca.id");
				while($row = mysql_fetch_array($query))
				{
					Print '<tr>';
						Print '<td align="center">'. $row['product_id'] . '</td>';
						Print '<td align="center">'. $row['szczegoly'] . "</td>";
						Print '<td align="center">'. $row['data_wpisu']. " - ". $row['czas_wpisu']."</td>";
						Print '<td align="center">'. $row['data_edytowania']. " - ". $row['czas_edytowania']. "</td>";
						Print '<td align="center">'. $row['publiczny']. "</td>";
						Print '<td align="center">'. $row['nazwa']. "</td>";
						Print '<td align="center"><a href="edit.php?id='. $row['product_id'] .'">edytuj</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['product_id'].')">usuń</a> </td>';
					Print "</tr>";
				}
			?>
		</table>
		<hr>
		<!-- Work with dostawca DB -->
		<form action="add_vendor.php" method="POST">
			Dodać do listy dostawców: <br/> 
			Wprowadż nazwę: <input type="text" name="nazwa" required/><br/>
			Wprowadż kontakt: <input type="text" name="kontakt" required/><br/>
			Wprowadż kraj: <input type="text" name="kraj" required/><br/>
		<input type="submit" value="Dodaj dostawcę"/>
		<h2 align="center">Lista dostawców</h2>
		<table border="1px" width="100%">
			<tr>
				<th>ID</th>
				<th>Nazwa</th>
				<th>Kontakt</th>
				<th>Kraj</th>
				<th>Edytuj</th>
				<th>Usuń</th>
				
			</tr>
			<?php
				$query = mysql_query("SELECT * FROM dostawca");
				while($row = mysql_fetch_array($query))
				{
					Print '<tr>';
						Print '<td align="center">'. $row['id'] . '</td>';
						Print '<td align="center">'. $row['nazwa'] . "</td>";
						Print '<td align="center">'. $row['kontakt']. "</td>";
						Print '<td align="center">'. $row['kraj']. "</td>";
						Print '<td align="center"><a href="edit_vendor.php?id='. $row['id'] .'">edytuj</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">usuń</a> </td>';
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