<?php
include 'includes/db_connection.php';

// Fetch blog entries from the database
$query = "SELECT id, title, last_update_date, content FROM blog_entries WHERE status = 'Active' AND publicity = 'Yes'";
$result = mysqli_query($connection, $query);

// Check if there are any blog entries
if (mysqli_num_rows($result) > 0) {
	$blogEntries = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
	$blogEntries = [];
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
    <title>Blog Entry List Page</title>

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
             <li><a href="" class="navbar-item">Blog</a></li>
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
                         <h1>Latest blog posts</h1>
                        <!-- Content of the blog entries displayed as a grid -->
                        <ul class="blog-grid">
                        <?php foreach ($blogEntries as $entry): ?>
                            <!-- Add the blog-entry class to each list item -->
                            <li class="blog-entry">
                                <h2><a href="/BLOGS/bloga_lapa2.php?id=<?php echo $entry['id']; ?>"><?php echo $entry['title']; ?></a></h2>
                                <p><?php echo $entry['last_update_date']; ?></p>
                                <p><?php echo substr($entry['content'], 0, 200); ?></p>
                            </li>
                        <?php endforeach;?>
                    </ul>
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
