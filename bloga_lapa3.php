<?php
// include the database connection file
require_once 'includes/db_connection.php';

// Check if an entry is being deleted
if (isset($_GET['delete'])) {
	$entryId = $_GET['delete'];
	// Perform the delete operation here using the $entryId
	// Add your delete query here
	// Example: $deleteQuery = "DELETE FROM blog_entries WHERE id = $entryId";
	// $deleteResult = mysqli_query($connection, $deleteQuery);
	// Check if the deletion was successful and display a message
	// if ($deleteResult) {
	//     echo "<p>Entry deleted successfully!</p>";
	// } else {
	//     echo "<p>Error deleting entry: " . mysqli_error($connection) . "</p>";
	// }
}

// Fetch all blog entries from the database
$query = "SELECT * FROM blog_entries";
$result = mysqli_query($connection, $query);
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
    <title>Table page for blog entries</title>

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
                        <h1>Blog Entries</h1>
                        <table>
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Author</th>
                                <th>Creation Date</th>
                                <th>Last Update Date</th>
                                <th>Status</th>
                                <th>Publicity</th>
                                <th>Actions</th>
                            </tr>
                            <?php
// Loop through the blog entries and display them in the table
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>{$row['title']}</td>";
	echo "<td>{$row['subtitle']}</td>";
	echo "<td>{$row['author']}</td>";
	echo "<td>{$row['creation_date']}</td>";
	echo "<td>{$row['last_update_date']}</td>";
	echo "<td>{$row['status']}</td>";
	echo "<td>{$row['publicity']}</td>";
	echo "<td><a href=\"/BLOGS/bloga_lapa4.php?id={$row['id']}\">Edit</a></td>";

	echo "</tr>";
}
?>
                        </table>
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
