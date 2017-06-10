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