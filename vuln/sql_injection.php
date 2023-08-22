<?php
    $conn = mysqli_connect("localhost", "root", "", "dvwa_sample");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SQL Injection</title>
</head>
<body>
    <div class="container">
        <h1>SQL Injection Example</h1>
        <form method="get" action="">
            <label for="id">Enter user ID:</label>
            <input type="text" name="id" id="id">
            <button type="submit">Submit</button>
        </form>
        <?php
            if (isset($result)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<p>ID: " . $row['id'] . " | Name: " . $row['name'] . "</p>";
                    }
                } else {
                    echo "No results found.";
                }
            }
        ?>
    </div>
</body>
</html>
