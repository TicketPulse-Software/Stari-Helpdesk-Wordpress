<?php
// Gather all the posted data
$db_host = $_POST['db_host'];
$db_name = $_POST['db_name'];
$db_user = $_POST['db_user'];
$db_pass = $_POST['db_pass'];

$mail_provider = $_POST['mail_provider'];
$mail_host = $_POST['mail_host'] ?? '';
$mail_port = $_POST['mail_port'] ?? '';
$mail_username = $_POST['mail_username'] ?? '';
$mail_password = $_POST['mail_password'] ?? '';
$mail_from = $_POST['mail_from'] ?? '';
$mail_from_name = $_POST['mail_from_name'] ?? '';

$gmail_client_id = $_POST['gmail_client_id'] ?? '';
$gmail_client_secret = $_POST['gmail_client_secret'] ?? '';
$gmail_redirect_uri = $_POST['gmail_redirect_uri'] ?? '';
$gmail_token_path = $_POST['gmail_token_path'] ?? '';
$gmail_from = $_POST['gmail_from'] ?? '';

$outlook_access_token = $_POST['outlook_access_token'] ?? '';
$outlook_from = $_POST['outlook_from'] ?? '';

$twilio_sid = $_POST['twilio_sid'];
$twilio_token = $_POST['twilio_token'];
$twilio_from = $_POST['twilio_from'];
$clicksend_username = $_POST['clicksend_username'];
$clicksend_api_key = $_POST['clicksend_api_key'];

$admin_username = $_POST['admin_username'];
$admin_email = $_POST['admin_email'];
$admin_password = password_hash($_POST['admin_password'], PASSWORD_BCRYPT);

$domain_name = $_POST['domain_name'];
$email_domain = $_POST['email_domain'];

// Save configuration to .env file
$env_content = "
DB_HOST=$db_host
DB_NAME=$db_name
DB_USER=$db_user
DB_PASS=$db_pass

MAIL_PROVIDER=$mail_provider
MAIL_HOST=$mail_host
MAIL_PORT=$mail_port
MAIL_USERNAME=$mail_username
MAIL_PASSWORD=$mail_password
MAIL_FROM_ADDRESS=$mail_from
MAIL_FROM_NAME=$mail_from_name

GMAIL_CLIENT_ID=$gmail_client_id
GMAIL_CLIENT_SECRET=$gmail_client_secret
GMAIL_REDIRECT_URI=$gmail_redirect_uri
GMAIL_TOKEN_PATH=$gmail_token_path
GMAIL_FROM=$gmail_from

OUTLOOK_ACCESS_TOKEN=$outlook_access_token
OUTLOOK_FROM=$outlook_from

TWILIO_SID=$twilio_sid
TWILIO_TOKEN=$twilio_token
TWILIO_FROM=$twilio_from

CLICKSEND_USERNAME=$clicksend_username
CLICKSEND_API_KEY=$clicksend_api_key

DOMAIN_NAME=$domain_name
EMAIL_DOMAIN=$email_domain
";

file_put_contents('../.env', $env_content);

// Create tables and save the admin account to the database
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables
    $createTablesSQL = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role ENUM('customer', 'admin') NOT NULL,
        otp VARCHAR(6),
        phone VARCHAR(15)
    );

    CREATE TABLE IF NOT EXISTS tickets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        subject VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        status ENUM('open', 'closed') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );

    CREATE TABLE IF NOT EXISTS replies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ticket_id INT NOT NULL,
        user_id INT NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (ticket_id) REFERENCES tickets(id),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );

    CREATE TABLE IF NOT EXISTS configuration (
        id INT AUTO_INCREMENT PRIMARY KEY,
        `key` VARCHAR(255) UNIQUE NOT NULL,
        value VARCHAR(255) NOT NULL
    );
    ";
    
    $pdo->exec($createTablesSQL);

    // Insert admin account
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')");
    $stmt->execute([$admin_username, $admin_email, $admin_password]);

    echo "<h2>Installation Complete</h2>";
    echo "<p>Stari-Helpdesk has been successfully installed.</p>";
    echo "<p><a href='../public/index.php'>Go to Application</a></p>";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
