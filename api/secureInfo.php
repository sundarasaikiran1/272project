<!DOCTYPE html>
<html>
<head>
    <title>Secure Data</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome Administrator</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="secure.php">Secure</a></li>
        </ul>
    </nav>
    <h1>Welcome, Administrator</h1>
    <p>Here is the list of current users:</p>
    <ul>
        <?php
        if (file_exists(__DIR__ . '/../api/currentUsers.txt')) {
            $lines = file(__DIR__ . '/../api/currentUsers.txt');
            
            foreach ($lines as $line) {
                echo "<p><strong>$line</strong></p>";
            }
        } else {
            echo "<p>Contact information not available.</p>";
        }
        ?>
    </ul>
</body>
</html>
