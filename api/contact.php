<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Mobile Devices Inc.</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Contact Us</h1>
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

    <section class="contact-form">
        <h2>Contact Mobile Devices Inc.</h2>
        <p>
            Do you have any questions or need assistance? Feel free to reach out to us using the contact information below:
        </p>
        <?php
	if (file_exists(__DIR__ . '/../api/contacts.txt')) {
            $lines = file(__DIR__ . '/../api/contacts.txt');
            foreach ($lines as $line) {
                $info = explode(': ', $line);
                $label = $info[0];
                $value = $info[1];
                echo "<p><strong>$label:</strong> $value</p>";
            }
        } else {
            echo "<p>Contact information not available.</p>";
        }
        ?>
    </section>

    <footer>
        &copy; 2023 Mobile Devices Inc. All rights reserved.
    </footer>
</body>
</html>
