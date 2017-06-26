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
			include "db_connect.php";
			$query = mysql_query("SELECT * FROM dostawca");
			while($row = mysql_fetch_array($query))
			{
				Print '<tr>';
					Print '<td align="center">'. $row['id'] . '</td>';
					Print '<td align="center">'. $row['nazwa'] . "</td>";
					Print '<td align="center">'. $row['kontakt']. "</td>";
					Print '<td align="center">'. $row['kraj']. "</td>";
					Print '<td align="center"><a href="edit_vendor.php?id='. $row['id'] .'">edytuj</a> </td>';
					Print '<td align="center"><a href="#" onclick="myFunctionVen('.$row['id'].')">usuń</a> </td>';
					Print "</tr>";
				}
		?>
	</table>
	<div id="add"> 
		<form action="add_vendor.php" method="POST"  style="width:30%">
			<h4>Dodać dostawce do listy dostawców:</h4>
			<span>Wprowadż nazwę:</span> <input type="text" name="nazwa" style="width:100%" required /><br/>
			<span>Wprowadż kontakt: </span><input type="text" name="kontakt" style='width:100%' required /><br/>
			<span>Wprowadż kraj: </span><input type="text" name="kraj" style='width:100%'required /><br/>
		<input type="submit" value="Dodaj dostawcę" style="margin:7px" />
		</form>
	</div>