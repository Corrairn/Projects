<?php
/**
 * @file
 * 	Файл за функции, които ще се изпозлват често в сайта.
 */

 /**
  * 
  */
function pre_dump($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}

function showMessages($message) {
	if(!empty($message)) {
	?>
	<div class="message"><?php echo $message; ?></div>
	<?php
	}
}

function isLoggedIn() {
	if(!empty($_SESSION['user'])) {
		return TRUE;
	}

	return FALSE;
}

function isAuthor($uid) {
	if(!empty($_SESSION['user']) && $_SESSION['user'] == $uid) {
		return TRUE;
	}

	return FALSE;
}

function printOptions(array $optionsArray) {
	if(!empty($optionsArray)) {
		foreach($optionsArray as $item) {
			echo "<option value='{$item}'>{$item}</option>";
		}
	}
}

function changeDateFormat(string $date) {
	$time = strtotime($date);
	return date("d M Y", $time);
}

function getPages() {
	global $pdo;

	$query = "SELECT id FROM pages";
	$colName = 'id';
	$order = 'ASC';

	$sortableComuns = getHeaderColumns();
	$sortableComuns = array_keys($sortableComuns);

	if(!empty($_GET['col']) && !empty($_GET['order'])) {
		if(in_array($_GET['col'], $sortableComuns)) {
			$colName = $_GET['col'];
		}

		if($_GET['order'] == "ASC" || $_GET['order'] == "DESC") {
			$order = $_GET['order'];
		}

		$query .= " ORDER BY {$colName} {$order}";
	}
	
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_COLUMN);

	return $result;
}

function displayPagesTable(array $pages) {
	tableHeader();
	
	$output = '';
	foreach($pages as $pageId) {
		$page = (new Page($pageId))->loadPage();
		$pageClass = "type-" . strtolower($page->type);

		$output .= "<span class='{$pageClass} first'>{$page->id}</span>";
		$output .= "<span class='{$pageClass}'>{$page->title}</span>";
		$output .= "<span class='{$pageClass}'>{$page->author->username}</span>";
		$output .= "<span class='{$pageClass}'>{$page->page_views}</span>";
		$output .= "<a class='{$pageClass}' href='view-page.php?id={$page->id}'>View</a>";
		//$output .= "<a href='view-page.php?id={$page->id}'>View</a>&nbsp;&nbsp;&nbsp;&nbsp;";
		if(isAuthor($page->author->id)) {
			//$output .= "<a href='edit-page.php?id={$page->id}'>Edit</a>";
			$output .= "<a class='{$pageClass}' href='edit-page.php?id={$page->id}'>Edit</a>";
		}
	}
	echo $output;
}

function tableHeader() {
	$columns = getHeaderColumns();

	foreach($columns as $colName => $colTitle) {
		if(isLoggedIn()) {
			$order = 'DESC';
			$sortCol = @$_GET['col'];
			if(!empty($_GET['order']) && !empty($sortCol) && $sortCol == $colName && $_GET['order'] == 'DESC') {
				$order = "ASC";
			}

			$colTitle = "<a href='?col={$colName}&order={$order}'>{$colTitle}</a>";
		}
		echo "<strong>{$colTitle}:</strong>";	
	}
}

function getHeaderColumns() {
	return [
		'id' => 'ID',
		'title' => 'Title',
		'user_id' => 'Author',
		'page_views' => 'Page views',
	];
}