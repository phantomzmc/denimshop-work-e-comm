<?php
			$sql="select * from pro_type";
			$result=mysql_db_query($dbname,$sql);
			echo "<ul>";
      while($rs=mysql_fetch_array($result)) {
      					$id_type=$rs[type_id];
      					$name_type=$rs[type_name];
      					echo "<li><a href='product_list.php?id_type=$id_type'>$name_type</a> </li>";
      				}
      		echo "</ul>";
      	?>
