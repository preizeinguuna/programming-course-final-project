<?php
require_once 'includes/db_connection.php';

// Check if the blog entry ID is provided in the URL
if (isset($_GET['id'])) {
	// Retrieve the blog entry ID from the URL
	$blogEntryID = $_GET['id'];

	// Fetch the blog entry from the database based on the ID
	$query = "SELECT * FROM blog_entries WHERE id = $blogEntryID";
	$result = mysqli_query($connection, $query);

	// Check if the blog entry exists
	if (mysqli_num_rows($result) > 0) {
		// Fetch the blog entry details
		$blogEntry = mysqli_fetch_assoc($result);
		$title = $blogEntry['title'];
		$subtitle = $blogEntry['subtitle'];
		$author = $blogEntry['author'];
		$lastUpdate = $blogEntry['last_update_date'];
		$content = $blogEntry['content'];
	} else {
		// If the blog entry does not exist, display an error message or redirect to another page
		echo "<p>Error: Blog entry not found!</p>";
		// You can redirect to another page using header() function
		// For example: header("Location: error_page.php");
		exit;
	}
} else {
	// If the blog entry ID is not provided in the URL, display an error message or redirect to another page
	echo "<p>Error: Blog entry ID not provided!</p>";
	// You can redirect to another page using header() function
	// For example: header("Location: error_page.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ingūna Preize">
    <meta name="description" content="Web lapas izveide">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Blog entry page</title>

    <!-- Adjust the paths to the CSS files using the root-relative paths-->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bloga_lapas.css">
</head>
<body>
   <nav>
        <img src="img/logo-lat.jpg" alt="logo">
        <ul>
           <li>News</li>
             <li>About us</li>
             <li><a href="bloga_lapa1.php" class="navbar-item">Blog</a></li>
             <li>Contacts</li>
         </ul>
    </nav>


    <div class="wraper">
        <div class="left">
           <h2>Options</h2>
            <div id="line"></div>
            <div>
               <p><img src="img/add.jpg" alt="add"><a href="bloga_lapa4.php">Add new</a></p>
                <p><img src="img/edit.jpg" alt="edit"><a href="bloga_lapa3.php">Review the record</a></p>
            </div>
        </div>
        <div class="right">
            <div class="step-section-container">
                <div class="step-item">
                    <div class="step-item--title">
                        <!-- Display blog entry details -->
                        <h1><?php echo $title; ?></h1>
                        <h2><?php echo $subtitle; ?></h2>
                        <p>Last Updated: <?php echo $lastUpdate; ?></p>
                        <p>Author: <?php echo $author; ?></p>
                        <div>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <footer>
        <div class="footer">
            <p>Website Developer: <b>Ingūna Preize</b> © 2021 All rights reserved</p>
        </div>
    </footer>

    <!-- Adjust the path to the JavaScript file using the root-relative path -->
    <script src="/BLOGS/js/script.js"></script>
</body>
</html>
