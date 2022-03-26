<?php
// DB variables set to required settings
$dsn = 'mysql:host=localhost;dbname=zippy';
$username = 'root';
$password = '';
// Try DBO connection
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    // Display error message
    $error_message = $e->getMessage();
    include('./view/nav.php');
    include('./errors/errors.php');
    echo database_error();
    include('./view/footer.php');
    exit();
}
