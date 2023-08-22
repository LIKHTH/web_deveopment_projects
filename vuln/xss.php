<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cross-Site Scripting (XSS)</title>
</head>
<body>
    <div class="container">
        <h1>Cross-Site Scripting (XSS) Example</h1>
        <form method="get" action="">
            <label for="name">Enter your name:</label>
            <input type="text" name="name" id="name">
            <button type="submit">Submit</button>
        </form>
        <?php
            if (isset($_GET['name'])) {
                $name = $_GET['name'];
                echo "<p>Hello, $name!</p>";
            }
        ?>
    </div>
</body>
</html>
