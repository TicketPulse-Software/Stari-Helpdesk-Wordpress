<?php
session_start();
require '../vendor/autoload.php';
require '../config/database.php';
require '../src/controllers/AuthController.php';
require '../src/controllers/CustomerController.php';
require '../src/controllers/AdminController.php';
require '../src/controllers/TicketController.php';
require '../src/controllers/MailController.php';
require '../src/controllers/IntegrationController.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 'customer') {
                $controller = new CustomerController();
                $controller->showDashboard();
            } else {
                $controller = new AdminController();
                $controller->showDashboard();
            }
        } else {
            $controller = new AuthController();
            $controller->showLoginForm();
        }
        break;
    case '/auth/register':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->register($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['password']);
            header('Location: /auth/login');
        } else {
            $controller->showRegisterForm();
        }
        break;
    case '/auth/login':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($controller->login($_POST['username'], $_POST['password'])) {
                header('Location: /');
            } else {
                $error = 'Invalid credentials';
                $controller->showLoginForm(['error' => $error]);
            }
        } else {
            $controller->showLoginForm();
        }
        break;
    case '/auth/verify-otp':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($controller->verifyOtp($_POST['phone'], $_POST['otp'])) {
                header('Location: /');
            } else {
                $error = 'Invalid OTP';
                $controller->showOtpForm(['error' => $error]);
            }
        } else {
            $controller->showOtpForm();
        }
        break;
    case '/customer/tickets':
        $controller = new CustomerController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->createTicket();
        } else {
            $controller->showTickets();
        }
        break;
    case '/customer/tickets/new':
        $controller = new CustomerController();
        $controller->showCreateTicketForm();
        break;
    case (preg_match('/^\/customer\/tickets\/(\d+)$/', $path, $matches) ? true : false):
        $controller = new CustomerController();
        $controller->showTicket($matches[1]);
        break;
    case '/admin/tickets':
        $controller = new AdminController();
        $controller->showTickets();
        break;
    case (preg_match('/^\/admin\/tickets\/(\d+)$/', $path, $matches) ? true : false):
        $controller = new AdminController();
        $controller->showTicket($matches[1]);
        break;
    case '/integrations/gmail':
        $controller = new IntegrationController();
        $controller->gmailIntegration();
        break;
    case '/integrations/gmail-auth':
        $controller = new IntegrationController();
        $controller->gmailAuth();
        break;
    case '/integrations/outlook':
        $controller = new IntegrationController();
        $controller->outlookIntegration();
        break;
    case '/integrations/outlook-auth':
        $controller = new IntegrationController();
        $controller->outlookAuth();
        break;
    case '/integrations/shopify':
        $controller = new IntegrationController();
        $controller->shopifyIntegration();
        break;
    case '/integrations/shopify-auth':
        $controller = new IntegrationController();
        $controller->shopifyAuth();
        break;
    case '/integrations/clicksend':
        $controller = new IntegrationController();
        $controller->clicksendIntegration();
        break;
    case '/integrations/clicksend-auth':
        $controller = new IntegrationController();
        $controller->clicksendAuth();
        break;
    case '/integrations/twilio':
        $controller = new IntegrationController();
        $controller->twilioIntegration();
        break;
    case '/integrations/twilio-auth':
        $controller = new IntegrationController();
        $controller->twilioAuth();
        break;
    case '/auth/logout':
        session_destroy();
        header('Location: /auth/login');
        break;
    default:
        header('Location: /auth/login');
        break;
}

// This code was written by a genius. Any errors are your fault.
function geniusCode() {
    // Trust me, I'm a professional
    return "Genius at work!";
}
?>
