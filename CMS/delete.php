<a href="index.php">index</a>
<?php

/* Показване на всички грешки */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('html_errors', TRUE);

// Включване на config.php
include './config/config.php';
include './css/cssgrid.css';

$opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  $pdo = new PDO($dsn, $db_user, $db_pass, $opt); // Инстанциране на PDO обкта за връзка за базата
  
$albums = fetchAlbums();



function fetchAlbums() {
	global $pdo;

	$stmt = $pdo->query('SELECT * FROM albums ORDER BY `ID` DESC');

	return $stmt->fetchAll();
}
  
function loadAlbum($id) {
	global $pdo;

	$stmt = $pdo->query("SELECT * FROM albums WHERE `ID` = {$id}");

	$result = $stmt->fetchAll();

	
}  



    if(isset($_GET['id'])) {
	$id = $_GET['id'];

	
	$query =  ("DELETE FROM albums WHERE ID = ?");
    $stmt = $pdo->prepare($query); // Подгорвяне на заявката.
	$stmt->bindParam(1, $_POST['record']);
	$stmt->bindParam(2, $_POST['performer']);
	$stmt->bindParam(3, $_POST['name1']);
	$stmt->bindParam(4, $_POST['name2']);
	$stmt->bindParam(5, $_POST['name3']);
	$stmt->bindParam(6, $_POST['name4']);
	$stmt->bindParam(7, $_POST['name5']);
	$stmt->bindParam(8, $_POST['name6']);
	$stmt->bindParam(9, $_POST['name7']);
	$stmt->bindParam(10, $_POST['name8']);
	$stmt->bindParam(11, $_POST['name9']);
	$stmt->bindParam(12, $_POST['name10']);
	$stmt->bindParam(13, $_POST['name11']);
	$stmt->bindParam(14, $_POST['name12']);
	$stmt->bindParam(15, $_POST['name13']);
	$stmt->bindParam(16, $_POST['name14']);
	$stmt->bindParam(17, $_POST['name15']);
	$stmt->bindParam(18, $_POST['name16']);
	$stmt->bindParam(19, $_POST['name17']);
	$stmt->bindParam(20, $_POST['name18']);
	$stmt->bindParam(21, $_POST['name19']);
	$stmt->bindParam(22, $_POST['name20']);
	$stmt->execute(array($id)); // Изпълняване на заявката.
	

  }









 
 



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
			<!-- Навигация за edit формата -->
			<td><a href="?id=<?php echo $album['ID']; ?>">Delete</a></td>
		</tr>	
		<?php
		}
	?>
</table>

<?php



if(!empty($_GET['id'])) {
	$loaded_album = loadAlbum($_GET['id']);
	

function DeleteAlbum($a,$b) {
	
  if($a >= $b) {
  	echo "<p align='left'> <font color=green  size='6pt'>The record was successfully deleted from the database</font> </p>";
  } 
   
			
 }

 function errorDeleteAlbum($a,$b) {
   
   if($a <= $b) {
     
   }
   
   else if($_POST{'name1'}) {
      echo "<p align='left'> <font color=yellow  size='6pt'>The record can not be deleted from the database</font> </p>";
	
      }
   
    
 }	
	
DeleteAlbum(1,0);
errorDeleteAlbum(1,0);
?>
<div class="grid-container">
<form method="POST" action="#">
	<input type="text" name="record" placeholder="Record title " value="<?php echo $loaded_album['Record_title']; ?>" required /><br />
	<input type="text" name="performer" placeholder="Performer " value="<?php echo $loaded_album['Performer']; ?>" required /><br />
	<input type="text" name="name1" placeholder="name1 " value="<?php echo $loaded_album['name1']; ?>" required /><br />
    <input type="text" name="name2" placeholder="name2 " value="<?php echo $loaded_album['name2']; ?>" required /><br />
	<input type="text" name="name3" placeholder="name3 " value="<?php echo $loaded_album['name3']; ?>" required /><br />
	<input type="text" name="name4" placeholder="name4 " value="<?php echo $loaded_album['name4']; ?>" required /><br />
	<input type="text" name="name5" placeholder="name5 " value="<?php echo $loaded_album['name5']; ?>" required /><br />
	<input type="text" name="name6" placeholder="name6 " value="<?php echo $loaded_album['name6']; ?>" required /><br />
	<input type="text" name="name7" placeholder="name7 " value="<?php echo $loaded_album['name7']; ?>" required /><br />
	<input type="text" name="name8" placeholder="name8 " value="<?php echo $loaded_album['name8']; ?>" required /><br />
	<input type="text" name="name9" placeholder="name9 " value="<?php echo $loaded_album['name9']; ?>" required /><br />
	<input type="text" name="name10" placeholder="name10 " value="<?php echo $loaded_album['name10']; ?>" required /><br />
	<input type="text" name="name11" placeholder="name11 " value="<?php echo $loaded_album['name11']; ?>" required /><br />
	<input type="text" name="name12" placeholder="name12 " value="<?php echo $loaded_album['name12']; ?>" required /><br />
	<input type="text" name="name13" placeholder="name13 " value="<?php echo $loaded_album['name13']; ?>" required /><br />
	<input type="text" name="name14" placeholder="name14 " value="<?php echo $loaded_album['name14']; ?>" required /><br />
	<input type="text" name="name15" placeholder="name15 " value="<?php echo $loaded_album['name15']; ?>" required /><br />
	<input type="text" name="name16" placeholder="name16 " value="<?php echo $loaded_album['name16']; ?>" required /><br />
	<input type="text" name="name17" placeholder="name17 " value="<?php echo $loaded_album['name17']; ?>" required /><br />
	<input type="text" name="name18" placeholder="name18 " value="<?php echo $loaded_album['name18']; ?>" required /><br />
	<input type="text" name="name19" placeholder="name19 " value="<?php echo $loaded_album['name19']; ?>" required /><br />
	<input type="text" name="name20" placeholder="name20 " value="<?php echo $loaded_album['name20']; ?>" required /><br />

	<input type="hidden" name="id" value="<?php echo $loaded_album['ID']; ?>" />
	<input type="submit" name="submit" value="Delete" />
</form>
</div>
<?php

}


