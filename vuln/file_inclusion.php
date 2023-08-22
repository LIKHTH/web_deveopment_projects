<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>File Inclusion</title>
</head>
<body>
    <div class="container">
        <h1>File Inclusion Example</h1>
        <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                include($page);
            } else {
                echo "<p>Welcome to the main page!</p>";
            }
        ?>
    </div>
</body>
</html>
