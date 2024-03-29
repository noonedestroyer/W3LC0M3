<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
	table, tr, td {
		border: 1px solid black;
	}
</style>

<body>
    <?php
        //Refer to database 
        $db = parse_url(getenv("DATABASE_URL"));
        $pdo = new PDO("pgsql:" . sprintf(
            "host=%s;port=%s;user=%s;password=%s;dbname=%s",
            $db["host"],
            $db["port"],
            $db["user"],
            $db["pass"],
            ltrim($db["path"], "/")
        ));    
        $sql = "select * from products";
        //compile the sql
        $stmt = $pdo->prepare($sql);
        //execute the query on the server and return the result set
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
    ?>
    <table>
        <?php
            foreach ($resultSet as $row) {
            	?>
            	<tr>
            		<td> <?php echo $row["pid"]; ?> </td>
            		<td> <?php echo $row["name"]; ?> </td>
            		<td> <?php echo $row["price"]; ?> </td>
            		<td> <button type="button" onclick="location.href='delete.php?id= <?php echo $row["pid"] ?>'"> Delete!</button> </td>
            	</tr>
                
		<?php
            }
        ?>
    </table>
</body>
</html>