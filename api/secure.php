<?php
session_start();

$_SESSION['is_authenticated'] = false;
// Check if the user is already authenticated
if (isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated'] === true) {
    header("Location: secureInfo.php"); // Redirect to the secure data page
    $_SESSION['is_authenticated'] = false;
    exit();
} else {
    $error = ''; // Initialize an error message variable

    // If the user submitted the login form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate the user (e.g., MAC authentication)
        $username = $_POST["username"];
        $mac = $_POST["mac"]; // MAC provided by the user

        // Replace 'admin' with the actual admin username
        if ($username === "admin") {
            $secretKey = 'newSecretKey'; // Replace with your secret key
            $validMAC = hash_hmac('sha256', $username, $secretKey); // Example MAC generation
            if ($mac === $validMAC) {
                // Authentication successful
                $_SESSION['is_authenticated'] = true;
                header("Location: secureInfo.php"); // Redirect to the secure data page
                exit();
            } else {
                // Authentication failed
                $error = "Authentication Failed";
            }
        } else {
            // Invalid username
            $error = "Invalid Username";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Section</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include your CSS file -->
</head>
<body>
    <header>
        <h1>Login as Administrator</h1>
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

    <?php if (!isset($_SESSION['is_authenticated']) || $_SESSION['is_authenticated'] !== true): ?>
    <form class="login-form" method="post" action="secure.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="mac">Password:</label>
        <input type="password" id="mac" name="mac" required>
        <br>
        <input type="submit" value="Login">
    </form>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="error-message">
            <p><?php echo $error; ?></p>
        </div>
    <?php endif; ?>


    <!-- Include additional styling or error handling as needed -->

    <footer>
        &copy; 2023 Wonderlust Adventures. All rights reserved.
    </footer>
</body>
</html>
