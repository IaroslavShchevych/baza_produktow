		<h2>Lista produktów</h2>
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
			include "db_connect.php";
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
		<div id="add">
			<h4>Dodać produkt do listy produktów:</h4>
			<form action="add.php" method="POST" style="width:30%">
			<span>Dodać do listy produktów:</span> <input type="text" name="szczegoly" style="width:100%" required><br/>
			<span>Zaznacz dostawcę:</span>
			<?php
				include "db_connect.php";
				$result = mysql_query("SELECT id, nazwa FROM dostawca"); 
				 echo "<select name='dostawca' style='width:100%' required>"; 
				 while($row = mysql_fetch_array($result)) 
				 { 
				    echo "<option value='" . $row['id'] . "'>". $row['nazwa'] . "</option>";
				 }
				 echo "</select>"
			?> <br/>
			<span>Czy publiczny zapis? </span> <input type="checkbox" name="publiczny[]" value="" style="width:10%"/><br/>
			<input type="submit" value="Dodaj do listy" style="margin:7px" />
			</form>
		</div>
		