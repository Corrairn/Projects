<?php
/**
 * @file
 * View contnet page file.
 */
session_start();

include "./config/config.php";
include "./functions/common.php";
include "./src/User.class.php";
include "./src/Page.class.php";
include "./css/cssgrid.css";

if(empty($_GET['id'])) {
   header("Location: index.php"); 
}

$page = new Page($_GET['id']);
$page->loadPage();

$authorClass = '';

if(!isAuthor($page->author->id)) {
    $page->page_views++;
    $page->update('page_views');
}
else { // The user is the author of the content.
    $authorClass = "is-author";
}


?>
<!DOCTYPE html>
<html>
	<?php
		include "./partials/header.php";
	?>
	<body class="page page-content <?php echo $authorClass; ?>">
        <?php
			include "./partials/navigation.php";
		?>
		<div class="page-title">
            <h1 class="editable" data-name="title" data-type="text" data-id="<?php echo $page->id; ?>"><?php echo $page->getEditable("title"); ?></h1>
            <span>Author: <?php echo $page->author->username; ?><br/> Date: <?php echo changeDateFormat($page->date_created); ?></span>    
        </div>

        <section class="content">
            <div class="text">
                <div class="media">
                    <img src="<?php echo $page->file_path; ?>" />
                    <span>Author: <?php echo $page->author->username; ?></span>
                </div>
                <span class="editable"><?php echo $page->getEditable("text"); ?></span>
                <hr/>
                <span>Categories:</span>
                <ul>
                    <?php foreach($page->categories as $catName){ ?>
                    <li><?php echo $catName; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
	</body>
</html>