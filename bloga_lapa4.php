<?php
require_once 'includes/db_connection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables to hold form data
$title = '';
$subtitle = '';
$author = '';
$content = '';
$status = 'Active'; // Set a default status
$publicity = false; // Set a default publicity value

// Check if "id" parameter is present in the URL (for editing an existing entry)
if (isset($_GET['id'])) {
	$entry_id = $_GET['id'];
	// Retrieve the existing entry details from the database using $entry_id
	$query = "SELECT * FROM blog_entries WHERE id = $entry_id";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) > 0) {
		$entry = mysqli_fetch_assoc($result);
		$title = $entry['title'];
		$subtitle = $entry['subtitle'];
		$author = $entry['author'];
		$content = $entry['content'];
		$status = $entry['status'];
		$publicity = $entry['publicity'] === 'Yes';
	} else {
		// Handle error if entry with given id doesn't exist
		// You can redirect or display an error message here
	}
} else {
	// Set $entry_id to null or any default value when adding a new entry
	$entry_id = null;
}

// Add the PHP code here to handle form submission for both adding and editing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Retrieve form data
	$title = mysqli_real_escape_string($connection, $_POST["title"]);
	$subtitle = mysqli_real_escape_string($connection, $_POST["subtitle"]);
	$author = mysqli_real_escape_string($connection, $_POST["author"]);
	$content = mysqli_real_escape_string($connection, $_POST["content"]);
	$status = mysqli_real_escape_string($connection, $_POST["status"]);
	$publicity = isset($_POST["publicity"]) ? "Yes" : "No";

	if (isset($entry_id)) {
		// Update the existing entry in the database
		$query = "UPDATE blog_entries SET title='$title', subtitle='$subtitle', author='$author', content='$content', status='$status', publicity='$publicity' WHERE id=$entry_id";
	} else {
		// Insert the new entry into the database
		$query = "INSERT INTO blog_entries (title, subtitle, author, content, status, publicity) VALUES ('$title', '$subtitle', '$author', '$content', '$status', '$publicity')";
	}

	$result = mysqli_query($connection, $query);

	// Check if the insertion/update was successful
	if ($result) {
		echo "<p>Blog entry saved successfully!</p>";
	} else {
		echo "<p>Error saving blog entry: " . mysqli_error($connection) . "</p>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ingūna Preize">
    <meta name="description" content="Website Development">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <title>Blog Entry Form</title>

    <!-- Adjust the paths to the CSS files using the root-relative paths -->
    <link rel="stylesheet" href="/BLOGS/css/style.css">
    <link rel="stylesheet" href="/BLOGS/css/bloga_lapas.css">
</head>
<body>
    <nav>
        <img src="/BLOGS/img/logo-lat.jpg" alt="logo">
        <ul>
           <li>News</li>
             <li>About us</li>
             <li><a href="/BLOGS/bloga_lapa1.php" class="navbar-item">Blog</a></li>
             <li>Contacts</li>
         </ul>
    </nav>


    <div class="wraper">
        <div class="left">
           <h2>Options</h2>
            <div id="line"></div>
            <div>
               <p><img src="/BLOGS/img/add.jpg" alt="add"><a href="/BLOGS/bloga_lapa4.php">Add new</a></p>
                <p><img src="/BLOGS/img/edit.jpg" alt="edit"><a href="/BLOGS/bloga_lapa3.php">Review the record</a></p>

            </div>
        </div>
        <div class="right">
            <div class="step-section-container">
                 <div class="step-item">
                    <div class="step-item--title">
                        <h1>Blog post details</h1>
                        <form name="myform" method="post" action="bloga_lapa4.php<?php if (isset($_GET['id'])) {echo '?id=' . $_GET['id'];}?>">
                            <label for="title">Title</label><br>
                            <input type="text" name="title" placeholder="Enter the title" value="<?php echo htmlspecialchars($title); ?>" required><br><br>

                            <label for="subtitle">Subtitle</label><br>
                            <input type="text" name="subtitle" placeholder="Enter the subtitle" value="<?php echo htmlspecialchars($subtitle); ?>" required><br><br>

                            <label for="author">Author</label><br>
                            <input type="text" name="author" placeholder="Enter the author" value="<?php echo htmlspecialchars($author); ?>" required><br><br>

                            <label for="content">Content</label><br>
                            <textarea id="content" name="content" rows="10" cols="100" placeholder="Enter the content" required><?php echo htmlspecialchars($content); ?></textarea><br><br>

                            <label for="status">Status</label><br>
                            <select name="status" id="status">
                                <option value="Active" <?php if ($status === 'Active') {
	echo 'selected';
}
?>>Active</option>
                                <option value="Inactive" <?php if ($status === 'Inactive') {
	echo 'selected';
}
?>>Inactive</option>
                            </select><br><br>

                            <input type="checkbox" name="publicity" value="Box" <?php if ($publicity) {
	echo 'checked';
}
?>>
                            <label for="publicity">Public?</label><br>

                            <input class="submit" type="submit" value="Save">
                        </form>
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


    <!-- Check if the form submission was successful (you can modify this based on your actual implementation) -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($result) && $result): ?>
        <!-- Clear the form fields after a successful form submission -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var form = document.forms["myform"];
                form.reset();
            });
        </script>
    <?php endif;?>
</body>
</html>
