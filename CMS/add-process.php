<?php

/* Показване на всички грешки */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
ini_set('html_errors', TRUE);


include './config/config.php';
include "./css/cssgrid.css";




$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $db_user, $db_pass, $opt); 



if(!empty($_POST['record']) && !empty($_POST['performer']) && !empty($_POST['name1']) && !empty($_POST['name2']) && !empty($_POST['name3']) && !empty($_POST['name3']) && !empty($_POST['name4']) && !empty($_POST['name5']) && !empty($_POST['name6']) && !empty($_POST['name7']) && !empty($_POST['name8']) && !empty($_POST['name9']) && !empty($_POST['name10']) && !empty($_POST['name11']) && !empty($_POST['name12']) && !empty($_POST['name13']) && !empty($_POST['name14']) && !empty($_POST['name15']) && !empty($_POST['name16']) && !empty($_POST['name17']) && !empty($_POST['name18']) && !empty($_POST['name19']) && !empty($_POST['name20'])) {
	$query = 
		"INSERT INTO albums
			(`ID`, `Record_title`, `Performer` ,`name1`,`name2`,`name3`,`name4`,`name5`,`name6`,`name7`,`name8`,`name9`,`name10`,`name11`,`name12`,`name13`,`name14`,`name15`,`name16`,`name17`,`name18`,`name19`,`name20`)
		VALUES
			(NULL, '{$_POST['record']}', '{$_POST['performer']}', '{$_POST['name1']}', '{$_POST['name2']}', '{$_POST['name3']}', '{$_POST['name4']}', '{$_POST['name5']}', '{$_POST['name6']}', '{$_POST['name7']}', '{$_POST['name8']}', '{$_POST['name9']}', '{$_POST['name10']}', '{$_POST['name11']}', '{$_POST['name12']}', '{$_POST['name13']}', '{$_POST['name14']}', '{$_POST['name15']}', '{$_POST['name16']}', '{$_POST['name17']}', '{$_POST['name18']}', '{$_POST['name19']}', '{$_POST['name20']}')"; // Конструиране на заявката за вкарване на потребител.
	NewAlbum($query);

	$pdo->query($query); // Записване на потребителя в базата.
}

// Заявка за взимане на всички потребители от базата.
$stmt = $pdo->query('SELECT * FROM albums ORDER BY `ID` DESC');
$albums = $stmt->fetchAll();


function errorAlbum($a) {
	if($a < 1) {
   	 return false;
   }
	   if($_POST{'name1'}) {
      echo "<p align='left'> <font color=red  size='6pt'>An album can not be saved without at least one song.</font> </p>";
	
  }
       
}


	


function NewAlbum() {
	echo "<p align='left'> <font color=green  size='6pt'>Record successfully added to the database</font> </p>";

}

NewAlbum();



function Album($a){
   if($a >=1) {
   	  return true;
     }
}



Album(1);


?>

<a href="index.php">index</a>
<br>
<a href="add.php">add</a>