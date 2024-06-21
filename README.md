### Stari-Helpdesk

## Overview

The Stari-Helpdesk Application is a simple ticket management system designed to facilitate customer support operations. It includes functionalities for user registration and login with OTP authentication, ticket creation, and management. The application also supports email notifications for ticket creation and replies, integrating with SMTP, Gmail, and Outlook (soon Shopify once I can read the docs ;), and making IOS, IpadOS, and MacOS apps for the Stari-Helpdesk. This will also have a WordPress version soon as well. Hosted versions are on [TicketPulse Software](https://ticketpulsesoftware.com).

## Features

- **User Management:**
  - User registration and login with OTP authentication (Twilio and ClickSend).
  - Roles: Customer and Admin.
- **Ticketing System:**
  - Ticket creation and management system.
  - Reply system for tickets.
- **Email Notifications:**
  - Integration with SMTP, Gmail, and Outlook for email notifications.
  - Email notifications for ticket creation and replies.
- **Integrations:**
  - Twilio and ClickSend for OTP and SMS notifications.
  - Gmail API for sending emails.
  - Outlook API for sending emails.
  - (Coming soon: Shopify support)
  - (Coming soon: WordPress support)
- **User Interface:**
  - Modern and responsive user interface using Bootstrap and FontAwesome.
  - (Coming soon: iOS, iPadOS, and macOS support)
- **Email Templates:** Predefined templates for email notifications.

## Requirements

- PHP 8.0 or higher
- Composer
- MySQL
- CDN server
- Node.js (for frontend dependencies)
- Web server (e.g., Apache or Nginx)
- Hosted Status Page

## Installation (installer not tested)

1. **Go to the Install Folder**
2. **Fill out the Database Form (REQUIRED)**
3. **Fill out the Mail Form**
4. **Fill out the SMS API Form**
5. **Register the Admin account (REQUIRED)**
6. **Register the Emailer Account**
7. **Fill out the IP Form (This is for your domain name and email domain REQUIRED)**
8. **You're All Done and ready to serve your customers**

By following these steps, you can set up and start using the Stari-Helpdesk application to manage your customer support tickets effectively.

Helpdesk Application Overview
Description
The Helpdesk application is a comprehensive support system designed to streamline the process of managing customer inquiries and support tickets. It provides a robust platform for both customers and administrators to handle and resolve issues efficiently. The application is equipped with features such as user registration, login, OTP verification, ticket creation, email notifications, and integrations with various third-party services like Twilio, ClickSend, Gmail, Outlook, and Shopify.

Features
- User Management: Registration: Users can register with their username, email, phone number, and password. The registration process includes validation and secure password hashing.
Login: Users can log in using their credentials. The system supports role-based access control to differentiate between customers and administrators.
OTP Verification: For enhanced security, users can verify their phone numbers via OTP sent through Twilio or ClickSend.
Ticketing System:

- Create Tickets: Customers can create new support tickets by providing details such as the subject and description of the issue.
View Tickets: Both customers and administrators can view a list of tickets. Customers see their own tickets, while administrators have access to all tickets.
Ticket Details: Users can view the details of individual tickets, including replies and status updates.
Email Notifications:

- PHPMailer Integration: Emails can be sent using PHPMailer with SMTP configuration for services like Gmail and Outlook.
Gmail API Integration: Emails can be sent via the Gmail API, leveraging OAuth 2.0 for secure authentication.
Outlook API Integration: Emails can be sent using the Outlook API, integrated with Microsoft Graph for secure access.
SMS Notifications:

- Twilio Integration: Send OTP and other notifications via SMS using Twilio's API.
ClickSend Integration: Alternative SMS service using ClickSend for sending OTP and other notifications.
Dashboard:

- Customer Dashboard: Customers have a dedicated dashboard to view and manage their tickets.
Admin Dashboard: Administrators have a comprehensive dashboard to oversee all tickets and manage user support.
Integrations:

**Gmail: Integration for sending emails and notifications through the Gmail API.**
**Outlook: Integration for sending emails and notifications through the Outlook API.**
**Twilio: Integration for sending SMS notifications and OTPs.**
**ClickSend: Integration for sending SMS notifications and OTPs.**
**Shopify: Integration with Shopify to pull relevant customer and order data, enhancing the support process.**

Security:

- Password Hashing: Secure password storage using bcrypt.
- Role-Based Access Control: Differentiates access between customers and administrators.
- Environment Variables: Secure management of configuration settings through .env files.
- Technical Stack
- Backend: PHP with MVC architecture.
- Database: MySQL for storing user and ticket information.
- Email: PHPMailer, Gmail API, and Outlook API for sending emails.
- SMS: Twilio and ClickSend for sending SMS notifications.
- Integrations: Gmail API, Outlook API, Twilio, ClickSend, and Shopify.
- Frontend: HTML, Bootstrap, and FontAwesome for a responsive and user-friendly interface.
- Environment Management: Dotenv for managing environment variables securely.
