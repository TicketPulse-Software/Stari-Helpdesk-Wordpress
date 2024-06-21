<?php
<?php
require 'vendor/autoload.php';
require 'src/controllers/TicketController.php';
require 'src/models/User.php';
require 'src/models/Ticket.php';

$ticketController = new TicketController();

// Example email handler function for incoming emails
function handleIncomingEmail($email, $ticketId, $message) {
    global $ticketController;
    $user = User::findByEmail($email);

    if ($user) {
        $userId = $user['id'];
        // Check if the ticket ID is provided
        if ($ticketId) {
            // Check if the ticket belongs to the user
            $ticket = Ticket::findById($ticketId);
            if ($ticket && $ticket['user_id'] == $userId && $ticket['status'] == 'open') {
                // Add a reply to the existing open ticket
                $ticketController->addReply($ticketId, $userId, $message);
            } else {
                error_log("Ticket not found, does not belong to the user, or is not open: $ticketId");
            }
        } else {
            // Create a new ticket if no ticket ID is provided
            $subject = "New Ticket from Email";
            $ticketController->createTicket($userId, $subject, $message);
        }
    } else {
        // Handle case where user is not found
        error_log("User not found for email: $email");
    }
}

// Handle the incoming email
handleIncomingEmail($email, $ticketId, $message);

