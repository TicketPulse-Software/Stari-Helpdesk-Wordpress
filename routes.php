<?php
require 'vendor/autoload.php';
require 'config/database.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$adminController = new AdminController(new User($pdo), new Ticket($pdo));
$customerController = new CustomerController(new User($pdo), new Ticket($pdo));
$integrationController = new IntegrationController();

// Define routes
if ($_SERVER['REQUEST_URI'] == '/admin/dashboard') {
    $adminController->dashboard();
} elseif ($_SERVER['REQUEST_URI'] == '/admin/tickets') {
    $adminController->tickets();
} elseif ($_SERVER['REQUEST_URI'] == '/customer/dashboard') {
    $customerController->dashboard();
} elseif ($_SERVER['REQUEST_URI'] == '/customer/tickets') {
    $customerController->tickets();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/gmail') {
    $integrationController->gmailIntegration();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/gmail-auth') {
    $integrationController->gmailAuth();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/outlook') {
    $integrationController->outlookIntegration();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/outlook-auth') {
    $integrationController->outlookAuth();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/shopify') {
    $integrationController->shopifyIntegration();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/shopify-auth') {
    $integrationController->shopifyAuth();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/clicksend') {
    $integrationController->clicksendIntegration();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/clicksend-auth') {
    $integrationController->clicksendAuth();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/twilio') {
    $integrationController->twilioIntegration();
} elseif ($_SERVER['REQUEST_URI'] == '/integrations/twilio-auth') {
    $integrationController->twilioAuth();
} elseif ($_SERVER['REQUEST_URI'] == '/auth/logout') {
    session_destroy();
    header('Location: /auth/login');
} else {
    http_response_code(404);
    echo 'Page not found';
}
?>
