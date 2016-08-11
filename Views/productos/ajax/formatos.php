<?php 
	while ($row=$datos->fetch(\PDO::FETCH_ASSOC)) {
		echo "<option value=".$row['id'].">".$row['formato']."</option>";
	}

 ?>