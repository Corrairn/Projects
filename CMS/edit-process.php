<?php

/* Показване на всички грешки */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('html_errors', TRUE);


include "./config/config.php";
include "./css/cssgrid.css";


$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $db_user, $db_pass, $opt);

if(!empty($_POST['id'])) {
	

	updateAlbum($_POST['id'], $_POST['record'], $_POST['performer'] , $_POST['name1'] , $_POST['name2'] , $_POST['name3'] , $_POST['name4'] , $_POST['name5'] , $_POST['name6'] , $_POST['name7'] , $_POST['name8'] , $_POST['name9'] , $_POST['name10'] , $_POST['name11'] , $_POST['name12'] , $_POST['name13'] , $_POST['name14'] , $_POST['name15'] , $_POST['name16'] , $_POST['name17'] , $_POST['name18'] , $_POST['name19'] , $_POST['name20']); 
}

/*
	Функция за взимане на всички потребители от базата.
*/
function fetchAlbums() {
	global $pdo;

	$stmt = $pdo->query('SELECT * FROM albums ORDER BY `ID` DESC');

	return $stmt->fetchAll();
}

/*
	Функция за взимане само на един потребител по ID.
*/
function loadAlbum($id) {
	global $pdo;

	$stmt = $pdo->query("SELECT * FROM albums WHERE `ID` = {$id}");

	$result = $stmt->fetchAll();

	return $result[0];
}



/*
	Функция за обновяване на данните на потребител.
*/
function updateAlbum($id, $Record_title, $Performer, $name1, $name2, $name3, $name4, $name5, $name6, $name7, $name8, $name9, $name10, $name11, $name12, $name13, $name14, $name15, $name16, $name17, $name18, $name19, $name20) {
	global $pdo;

	$query =
		"UPDATE
			albums
		SET
			`Record_title` = '{$Record_title}',
			`Performer` = '{$Performer}',
			`name1` = '{$name1}',
			`name2` = '{$name2}',
			`name3` = '{$name3}',
			`name4` = '{$name4}',
			`name5` = '{$name5}',
			`name6` = '{$name6}',
			`name7` = '{$name7}',
			`name8` = '{$name8}',
			`name9` = '{$name9}',
			`name10` = '{$name10}',
			`name11` = '{$name11}',
			`name12` = '{$name12}',
			`name13` = '{$name13}',
			`name14` = '{$name14}',
			`name15` = '{$name15}',
			`name16` = '{$name16}',
			`name17` = '{$name17}',
			`name18` = '{$name18}',
			`name19` = '{$name19}',
			`name20` = '{$name20}'
		WHERE
			`ID` = {$id};";

	$pdo->query($query);
}

$albums = fetchAlbums();

function Album($a){
   if($a >=1) {
   	  return true;
     }
   else if($a < 1) {
   	 return false;
   }
 }

function NewAlbum($a) {
	if($a >=1) {
	echo "<p align='left'> <font color=green  size='6pt'>Record ecsuccessfully added to the database</font> </p>";
	}
	
	function errorloadAlbum($a) {
      if($a < 1) {
	  
	  }
	  
	  if($_POST{'name1'}) {
      echo "<p align='left'> <font color=red  size='6pt'>The album specified can not be loaded for edit</font> </p>";
	
     }
  }

errorloadAlbum(1);
  }



Album(1);
NewAlbum(1);


?>

<table>
	<tr>
		<th>ID</th>
		<th>Record title</th>
		<th>Performer</th>
		<th>name1</th>
		<th>name2</th>
		<th>name3</th>
		<th>name4</th>
		<th>name5</th>
		<th>name6</th>
		<th>name7</th>
		<th>name8</th>
		<th>name9</th>
		<th>name10</th>
		<th>name11</th>
		<th>name12</th>
		<th>name13</th>
		<th>name14</th>
		<th>name15</th>
		<th>name16</th>
		<th>name17</th>
		<th>name18</th>
		<th>name19</th>
		<th>name20</th>
	</tr>
	<?php
		
		foreach ($albums as $album) {
			
		?>
		<tr>
			<td><?php echo $album['ID']; ?></td>
			<td><?php echo $album['Record_title']; ?></td>
			<td><?php echo $album['Performer']; ?></td>
			<td><?php echo $album['name1']; ?></td>
			<td><?php echo $album['name2']; ?></td>
			<td><?php echo $album['name3']; ?></td>
			<td><?php echo $album['name4']; ?></td>
			<td><?php echo $album['name5']; ?></td>
			<td><?php echo $album['name6']; ?></td>
			<td><?php echo $album['name7']; ?></td>
			<td><?php echo $album['name8']; ?></td>
			<td><?php echo $album['name9']; ?></td>
			<td><?php echo $album['name10']; ?></td>
			<td><?php echo $album['name11']; ?></td>
			<td><?php echo $album['name12']; ?></td>
			<td><?php echo $album['name13']; ?></td>
			<td><?php echo $album['name14']; ?></td>
			<td><?php echo $album['name15']; ?></td>
			<td><?php echo $album['name16']; ?></td>
			<td><?php echo $album['name17']; ?></td>
			<td><?php echo $album['name18']; ?></td>
			<td><?php echo $album['name19']; ?></td>
			<td><?php echo $album['name20']; ?></td>
			
		</tr>	
		<?php
		}
	?>
</table>

<a href="index.php">index</a>
<br>
<a href="edit.php">edit</a>
