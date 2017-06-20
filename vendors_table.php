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
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">usuń</a> </td>';
					Print "</tr>";
				}
			?>
		</table>