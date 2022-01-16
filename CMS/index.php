<?php
/**
 * @file
 * 	Главен файл на системата.
 */
session_start();

include "./config/config.php";
include "./functions/common.php";
include "./src/User.class.php";
include "./src/Page.class.php";
include "./css/cssgrid.css";


function fetchAlbums() {
	global $pdo;

	$stmt = $pdo->query('SELECT * FROM albums ORDER BY `ID` DESC');

	return $stmt->fetchAll();
}


$albums = fetchAlbums();

?>
<!DOCTYPE html>
<html>
	<?php
		include "./partials/header.php";
	?>
	<body class="page page-index">
	<a href="add.php">add</a>
	
	
	<a href="edit.php">edit</a>
	<a href="delete.php">delete</a>

		<?php
			include "./partials/navigation.php";
		?>
		<h1 class="page-title">My CMS</h1>

		<div class="content-list">
		<?php
			displayPagesTable(getPages());
			
		?>
		
		</div>
	</body>	
</html>