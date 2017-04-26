<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>
<body>
<?php
	try {
		$base = new PDO("mysql:host=localhost; dbname=PreviaUca", "root", "matroska");
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :username AND PASSWORD= :password";
		$resultado=$base->prepare($sql);
		$username = htmlentities($_POST["username"]);
		$password = htmlentities($_POST["password"]);
		$resultado->bindValue(":username", $username);
		$resultado->bindValue(":password", $password);
		$resultado->execute();
		$numero_registro = $resultado->rowCount();
		if($numero_registro != 0) {
			echo "<h2>Entrasteee!</h2>";
		} else {
			echo "<h2>No entraste wachin</h2>";
			//header("location:login.php");
		}
	} catch(Exception $e) {
		die("Error: " . $e->getMessage());
	}
?>
</body>
</html>