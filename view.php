<<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$db = parse_url(getenv("DATABASE_URL"));

		$pdo = new PDO("pgsql:" . sprintf(
	    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	    $db["host"],
	    $db["port"],
	    $db["user"],
	    $db["pass"],
	    ltrim($db["path"], "/")
		));
		$sql = "seelct * from products";
		//compile the sql
		$stmt = $pdo->prepare($sql);
		//execute the query
		$stmt->setFetchMode(PDO::fetch_assoc);
		$stmt->execute();
		$resultSet = $stmt->fetchAll();
	?>
	<ul>
		<?php 
			foreach ($resultSet as $row){
				echo "<li>" . 
					$row["name"] . "--" . $row["price"] . "</li>";
			}
		?>
	</ul>
</body>
</html>